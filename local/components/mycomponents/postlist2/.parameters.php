<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=array();
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
{
    $arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arSorts = Array("ASC"=>GetMessage("T_IBLOCK_DESC_ASC"), "DESC"=>GetMessage("T_IBLOCK_DESC_DESC"));
$arSortFields = Array(
    "ID"=>GetMessage("T_IBLOCK_DESC_FID"),
    "NAME"=>GetMessage("T_IBLOCK_DESC_FNAME"),
    "ACTIVE_FROM"=>GetMessage("T_IBLOCK_DESC_FACT"),
    "SORT"=>GetMessage("T_IBLOCK_DESC_FSORT"),
    "TIMESTAMP_X"=>GetMessage("T_IBLOCK_DESC_FTSAMP")
);

$arProperty_LNS = array();
$rsProp = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc",""), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"]));
while ($arr=$rsProp->Fetch())
{
    $arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
    if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S", "E")))
    {
        $arProperty_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
    }
}


$arComponentParameters = array(
    "GROUPS"=>array(
        "LIST_SETTINGS" => array(
            "NAME" => GetMessage("CN_P_LIST_SETTINGS"),
        ),
        "DETAIL_SETTINGS" => array(
            "NAME" => GetMessage("CN_P_DETAIL_SETTINGS"),
        ),
        "DETAIL_PAGER_SETTINGS" => array(
            "NAME" => GetMessage("CN_P_DETAIL_PAGER_SETTINGS"),
        ),
    ),
    "PARAMETERS" => array(
        "VARIABLE_ALIASES" => Array(
            "SECTION_ID" => Array("NAME" => GetMessage("BN_P_SECTION_ID_DESC")),
            "ELEMENT_ID" => Array("NAME" => GetMessage("NEWS_ELEMENT_ID_DESC")),
        ),
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("BN_P_IBLOCK_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlockType,
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("BN_P_IBLOCK"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlock,
            "REFRESH" => "Y",
            "ADDITIONAL_VALUES" => "Y",
        ),
        "NEWS_COUNT" => Array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_CONT"),
            "TYPE" => "STRING",
            "DEFAULT" => "20",
        ),
        "DETAIL_PAGER_TEMPLATE" => array(
            "PARENT" => "DETAIL_PAGER_SETTINGS",
            "NAME" => GetMessage("T_IBLOCK_DESC_PAGER_TEMPLATE"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "DETAIL_FIELD_CODE" => CIBlockParameters::GetFieldCode(GetMessage("IBLOCK_FIELD"), "DETAIL_SETTINGS"),
        "DETAIL_PROPERTY_CODE" => array(
            "PARENT" => "DETAIL_SETTINGS",
            "NAME" => GetMessage("T_IBLOCK_PROPERTY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arProperty_LNS,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "LIST_FIELD_CODE" => CIBlockParameters::GetFieldCode(GetMessage("IBLOCK_FIELD"), "LIST_SETTINGS"),
        "LIST_PROPERTY_CODE" => array(
            "PARENT" => "LIST_SETTINGS",
            "NAME" => GetMessage("T_IBLOCK_PROPERTY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arProperty_LNS,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "DETAIL_PAGER_TEMPLATE" => array(
            "PARENT" => "DETAIL_PAGER_SETTINGS",
            "NAME" => GetMessage("T_IBLOCK_DESC_PAGER_TEMPLATE"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
            "DETAIL",
            "DETAIL_URL",
            GetMessage("T_IBLOCK_DESC_DETAIL_PAGE_URL"),
            "",
            "URL_TEMPLATES"
        ),
        "IBLOCK_URL" => CIBlockParameters::GetPathTemplateParam(
            "LIST",
            "IBLOCK_URL",
            GetMessage("T_IBLOCK_DESC_LIST_PAGE_URL"),
            "",
            "URL_TEMPLATES"
        ),
    ),
);
CIBlockParameters::AddPagerSettings(
    $arComponentParameters,
    GetMessage("T_IBLOCK_DESC_PAGER_NEWS"), //$pager_title
    true, //$bDescNumbering
    false, //$bShowAllParam
    true, //$bBaseLink
    $arCurrentValues["PAGER_BASE_LINK_ENABLE"]==="Y" //$bBaseLinkEnabled
);
