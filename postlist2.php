<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("postlist2");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:postlist2", 
	".default", 
	array(
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "news",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "AUTOR",
			1 => "VOTE_RESULT",
			2 => "MINUSES_COUNT",
			3 => "PLUSES_COUNT",
			4 => "VOTED_USERS",
			5 => "",
		),
		"NEWS_COUNT" => "3",
		"COMPONENT_TEMPLATE" => ".default",
		"PAGER_TEMPLATE" => "navigation",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"DETAIL_URL" => "#SITE_DIR#post.php?ID=#ELEMENT_ID#",
		"IBLOCK_URL" => "",
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>