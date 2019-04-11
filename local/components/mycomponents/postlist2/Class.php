<?php
use Bitrix\Main\Context,
    Bitrix\Main\Type\DateTime,
    Bitrix\Main\Loader,
    Bitrix\Iblock,
    Bitrix\Main\Localization;
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
class PostList extends CBitrixComponent
{

    protected function checkRequiredModules()
    {
        if (!Loader::includeModule('iblock')) {
            throw new Main\SystemException(Localization\Loc::getMessage("MODULE_NOT_INSTALLED"));
        }
    }

    private function voteModify(){

        global $USER;

        $arOrder=array(
            "SORT"=>"ASC"
        );

        $arFilter=array(
          "=ID"=> $_GET["ITEM_ID"]
        );

        $arSelectFields=array(
            "IBLOCK_ID",
            "ID",
            "PROPERTY_VOTED_USERS"
        );
        $arSelectFields1=array(
            "IBLOCK_ID",
            "ID",
            "PROPERTY_AUTOR"
        );

        $newVotedUsers = CIBlockElement::GetList($arOrder,$arFilter,false,false,$arSelectFields)->GetNextElement()->GetProperty("VOTED_USERS")["VALUE"];
        $postAutor=CIBlockElement::GetList($arOrder,$arFilter,false,false,$arSelectFields1)->GetNextElement()->GetProperty("AUTOR")["VALUE"];


        if (!in_array($USER->GetID(),$newVotedUsers)||($USER->GetID()!=$postAutor)) {
            array_push($newVotedUsers, $USER->GetID());
            if ($_GET['VOTE'] == 'PLUS') {
                $arLoadVoteResultArray = Array(
                    'PLUSES_COUNT' => $_GET["PLUSES_COUNT"] + 1,
                    'VOTE_RESULT' => $_GET["RANK_VALUE"] + 1,
                    "VOTED_USERS" => $newVotedUsers
                );
            } else {
                $arLoadVoteResultArray = Array(
                    'MINUSES_COUNT' => $_GET["MINUSES_COUNT"] + 1,
                    'VOTE_RESULT' => $_GET["RANK_VALUE"] - 1,
                    "VOTED_USERS" => $newVotedUsers
                );
            }

            CIBlockElement::SetPropertyValuesEx($_GET["ITEM_ID"], 5, $arLoadVoteResultArray);
        }


    }


    private function getElements($raitingFilter){
        $rsIBlock = CIBlock::GetList(array(), array(
            "ACTIVE" => "Y",
            "ID" => $this->arParams["IBLOCK_ID"],
        ));
        $this->arResult = $rsIBlock->GetNext();

        $arSelect = array_merge($this->arParams["FIELD_CODE"], array(
            "ID",
            "NAME",
            "ACTIVE_FROM",
            "DETAIL_PAGE_URL",
            "LIST_PAGE_URL",
            "DETAIL_TEXT",
            "DETAIL_TEXT_TYPE",
            "PREVIEW_TEXT",
            "PREVIEW_TEXT_TYPE",
            "PREVIEW_PICTURE",
        ));
        $bGetProperty = count($this->arParams["PROPERTY_CODE"])>0;
        if($bGetProperty)
            $arSelect[]="PROPERTY_*";

        $arSort=array(
            "ACTIVE_FROM"=>"ASC"
        );

        $arNavParams = array(
            "nPageSize" => $this->arParams["NEWS_COUNT"],
            "bDescPageNumbering" => $this->arParams["PAGER_DESC_NUMBERING"],
            "bShowAll" => $this->arParams["PAGER_SHOW_ALL"],
        );

        if ($raitingFilter!='INF'){
            $arFilter=array(
                ">=PROPERTY_VOTE_RESULT"=>$raitingFilter,
                "IBLOCK_ID"=>$this->arParams['IBLOCK_ID']
            );
        } else
            $arFilter=array(
                "IBLOCK_ID"=>$this->arParams['IBLOCK_ID']
            );

            $this->arResult["ITEMS"] = array();
        $this->arResult["ELEMENTS"] = array();

        $rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
        $rsElement->SetUrlTemplates($this->arParams["DETAIL_URL"], "", $this->arParams["IBLOCK_URL"]);

        while($obElement = $rsElement->GetNextElement())
        {
            $arItem = $obElement->GetFields();

            Iblock\InheritedProperty\ElementValues::queue($arItem["IBLOCK_ID"], $arItem["ID"]);

            $arItem["FIELDS"] = array();

            $arItem["PROPERTIES"] = $obElement->GetProperties();

            $rsUser = CUser::GetByID($arItem['PROPERTIES']['AUTOR']['VALUE']);
            $arItem["PROPERTIES"]["AUTOR"]=$rsUser->Fetch();
            $arItem["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]=CFile::GetPath($arItem["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]);


            $arItem["ACTIVE_FROM"]= MakeTimeStamp($arItem['ACTIVE_FROM']);
            if ($postDay=(dateNormalView($arItem["ACTIVE_FROM"]))){
                $arItem["ACTIVE_FROM"]= $postDay.' в '.date('H:i',$arItem["ACTIVE_FROM"]);
            } else
                $arItem["ACTIVE_FROM"]=date('d.m.Y',$arItem["ACTIVE_FROM"]).' в '.date('H:i',$arItem["ACTIVE_FROM"]);

            $this->arResult["ITEMS"][] = $arItem;
            $this->arResult["ELEMENTS"][] = $arItem["ID"];
        }

        $this->arResult["NAV_STRING"] = $rsElement->GetPageNavStringEx(
            $navComponentObject,
            $this->arParams["PAGER_TITLE"],
            $this->arParams["PAGER_TEMPLATE"],
            $this->arParams["PAGER_SHOW_ALWAYS"],
            $this,
            array()
        );

    }
    public function executeComponent()
    {
        try {
            $this->checkRequiredModules();
        } catch (Exception $e) {
            CModule::IncludeModule('iblock');
        }

        $this->voteModify();
        $this->getElements($_GET['THRESHOLD']);
        $this->includeComponentTemplate();
    }
}