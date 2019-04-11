<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$rsUser = CUser::GetByID($arResult['PROPERTIES']['AUTOR']['VALUE']);
$arResult["PROPERTIES"]["AUTOR"]=$rsUser->Fetch();
$arResult["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]=CFile::GetPath($arResult["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]);


$timeStmp=MakeTimeStamp($arResult['ACTIVE_FROM']);
if (($postDay=dateNormalView($timeStmp))){
    $arResult['ACTIVE_FROM'] = $postDay.' в '.date('H:i',$timeStmp);
} else $arResult['ACTIVE_FROM'] = date('d.m.Y',$timeStmp).' в '.date('H:i',$timeStmp);


?>
