<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="page__footer">


	<?if ($arResult["NavPageNomer"] > 1 && $arResult["NavPageNomer"]!=$arResult['nEndPage']):?>


		<?if($arResult["bSavePage"]):?>


			<ul class="arrows-pagination">

				<li class="arrows-pagination__item">

					<a title="На страницу назад (Alt + &larr;)" class="arrows-pagination__item-link arrows-pagination__item-link_prev" id="previous_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" rel="">&larr;&nbsp;<span>сюда</span></a>

				</li>


				<li class="arrows-pagination__item">
					<a class="arrows-pagination__item-link arrows-pagination__item-link_next" id="next_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" rel=""><span>туда</span>&nbsp;&rarr;</a>
				</li>
			</ul>
			<ul class="toggle-menu toggle-menu_pagination" id="nav-pagess">
				<li class="toggle-menu__item toggle-menu__item_pagination">
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1" class="toggle-menu__item-link toggle-menu__item-link_pagination toggle-menu__item-link_bordered" title="Первая страница" rel="">
        	        <span class="icon-svg icon-svg_arrow-first"><svg class="icon-svg" width="28" height="24" viewBox="0 0 28 24"><path d="M8.452 5.455l2.93 3.192c.89.969 1.335 1.361 2.225 1.909h-13.608v2.773h13.634c-.838.5-1.492 1.102-2.252 1.913l-2.93 3.192 2.276 1.964 7.588-8.452-7.588-8.452-2.276 1.961zM24.297 0h3.087v23.891h-3.087v-23.891z"/></svg>
					</span>
					</a>
				</li>


			<?else:?>


			<ul class="arrows-pagination">

				<li class="arrows-pagination__item">

					<a title="На страницу назад (Alt + &larr;)" class="arrows-pagination__item-link arrows-pagination__item-link_prev" id="previous_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" rel="">&larr;&nbsp;<span>сюда</span></a>

				</li>


				<li class="arrows-pagination__item">
					<a class="arrows-pagination__item-link arrows-pagination__item-link_next" id="next_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" rel=""><span>туда</span>&nbsp;&rarr;</a>
				</li>
			</ul>
			<ul class="toggle-menu toggle-menu_pagination" id="nav-pagess">
				<li class="toggle-menu__item toggle-menu__item_pagination">
					<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="toggle-menu__item-link toggle-menu__item-link_pagination toggle-menu__item-link_bordered" title="Первая страница" rel="">
				<span class="icon-svg icon-svg_arrow-first"><svg class="icon-svg" width="28" height="24" viewBox="0 0 28 24"><path d="M8.452 5.455l2.93 3.192c.89.969 1.335 1.361 2.225 1.909h-13.608v2.773h13.634c-.838.5-1.492 1.102-2.252 1.913l-2.93 3.192 2.276 1.964 7.588-8.452-7.588-8.452-2.276 1.961zM24.297 0h3.087v23.891h-3.087v-23.891z"/></svg>
				</span>
					</a>
				</li>


		<?endif?>
				<?elseif ($arResult["NavPageNomer"]==$arResult['nEndPage']):?>
				<ul class="arrows-pagination">

					<li class="arrows-pagination__item">

						<a title="На страницу назад (Alt + &larr;)" class="arrows-pagination__item-link arrows-pagination__item-link_prev" id="previous_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" rel="">&larr;&nbsp;<span>сюда</span></a>

					</li>

					<li class="arrows-pagination__item">
						<span class="arrows-pagination__item-link arrows-pagination__item-link_next" id="next_page"><span>туда</span>&nbsp;&rarr;</span>
					</li>
				</ul>
				<ul class="toggle-menu toggle-menu_pagination">
				<li class="toggle-menu__item toggle-menu__item_pagination">
					<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="toggle-menu__item-link toggle-menu__item-link_pagination toggle-menu__item-link_bordered" title="Первая страница" rel="">
						<span class="icon-svg icon-svg_arrow-first"><svg class="icon-svg" width="28" height="24" viewBox="0 0 28 24"><path d="M8.452 5.455l2.93 3.192c.89.969 1.335 1.361 2.225 1.909h-13.608v2.773h13.634c-.838.5-1.492 1.102-2.252 1.913l-2.93 3.192 2.276 1.964 7.588-8.452-7.588-8.452-2.276 1.961zM24.297 0h3.087v23.891h-3.087v-23.891z"/></svg>
						</span>
					</a>
				</li>
	<?else:?>
		<ul class="arrows-pagination">

			<li class="arrows-pagination__item">

				<span class="arrows-pagination__item-link arrows-pagination__item-link_next" id="previous_page">&larr;&nbsp;<span>сюда</span></span>

			</li>


			<li class="arrows-pagination__item">
				<a class="arrows-pagination__item-link arrows-pagination__item-link_next" id="next_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" rel=""><span>туда</span>&nbsp;&rarr;</a>
			</li>
		</ul>
		<ul class="toggle-menu toggle-menu_pagination">
	<?endif?>

	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="toggle-menu__item toggle-menu__item_pagination">
				<span class="toggle-menu__item-link toggle-menu__item-link_pagination toggle-menu__item-link_active"><?=$arResult["nStartPage"]?></span>
			</li>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<li class="toggle-menu__item toggle-menu__item_pagination">
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="toggle-menu__item-link toggle-menu__item-link_pagination" ><?=$arResult["nStartPage"]?></a>
			</li>
		<?else:?>
			<li class="toggle-menu__item toggle-menu__item_pagination">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" class="toggle-menu__item-link toggle-menu__item-link_pagination" ><?=$arResult["nStartPage"]?></a>
			</li>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<li class="toggle-menu__item toggle-menu__item_pagination">

			<a title="Последняя страница" class="toggle-menu__item-link toggle-menu__item-link_pagination toggle-menu__item-link_bordered" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>" rel="">
              <span class="icon-svg icon-svg_arrow-last"><svg class="icon-svg" width="28" height="24" viewBox="0 0 28 24"><path d="M8.452 5.455l2.93 3.192c.89.969 1.335 1.361 2.225 1.909h-13.608v2.773h13.634c-.838.5-1.492 1.102-2.252 1.913l-2.93 3.192 2.276 1.964 7.588-8.452-7.588-8.452-2.276 1.961zM24.297 0h3.087v23.891h-3.087v-23.891z"/></svg>
			  </span>
			</a>
		</li>
		</ul>
	<?else:?>
		</ul>
	<?endif?>
</div>
