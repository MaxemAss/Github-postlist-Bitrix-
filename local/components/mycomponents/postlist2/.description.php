<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription=array(
    "NAME" => GetMessage("COMPONENT_NAME"),
    "DESCRIPTION" => GetMessage("COMPONENT_DESCRIPTION"),
    "PATH" => array(
        "ID" => "posts_content",
        "CHILD" => array(
            "ID" => "post",
            "NAME" => GetMessage("T_IBLOCK_DESC_POSTS"),
            "SORT" => 10,
            "CHILD" => array(
                "ID" => "postlist_cmpx",
            ),
        ),
    ),
);
?>