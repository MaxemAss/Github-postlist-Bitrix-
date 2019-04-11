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
?>
<?//dump($_GET);
//dump($arResult);?>
<div class="tabs__level tabs__level_bottom">
    <ul class="toggle-menu ">
        <li class="toggle-menu__item">
            <a href="<?= $APPLICATION->GetCurPageParam("THRESHOLD=INF", ["THRESHOLD"], false); ?>" class="toggle-menu__item-link
             <? echo ($_GET['THRESHOLD']=='INF')?"toggle-menu__item-link_active":""?>
             " rel="nofollow" title="Все публикации в хронологическом порядке">
                <?=GetMessage("THRESHOLD_LESS")?>

            </a>
        </li>
        <li class="toggle-menu__item">
            <a href="<?= $APPLICATION->GetCurPageParam("THRESHOLD=10", ["THRESHOLD"], false); ?>"
               class="toggle-menu__item-link <? echo ($_GET['THRESHOLD']=='10')?"toggle-menu__item-link_active":""?>"
               rel="nofollow" title="Все публикации с рейтингом 10 и выше">
                <?=GetMessage("THRESHOLD_10")?>

            </a>
        </li>
        <li class="toggle-menu__item">
            <a href="<?= $APPLICATION->GetCurPageParam("THRESHOLD=25", ["THRESHOLD"], false); ?>"
               class="toggle-menu__item-link <? echo ($_GET['THRESHOLD']=='25')?"toggle-menu__item-link_active":""?>"
               rel="nofollow" title="Все публикации с рейтингом 25 и выше">
                <?=GetMessage("THRESHOLD_25")?>

            </a>
        </li>
        <li class="toggle-menu__item">
            <a href="<?= $APPLICATION->GetCurPageParam("THRESHOLD=50", ["THRESHOLD"], false); ?>"
               class="toggle-menu__item-link <? echo ($_GET['THRESHOLD']=='50')?"toggle-menu__item-link_active":""?>"
               rel="nofollow" title="Все публикации с рейтингом 50 и выше">
                <?=GetMessage("THRESHOLD_50")?>

            </a>
        </li>
        <li class="toggle-menu__item">
            <a href="<?= $APPLICATION->GetCurPageParam("THRESHOLD=100", ["THRESHOLD"], false); ?>"
               class="toggle-menu__item-link <? echo ($_GET['THRESHOLD']=='100')?"toggle-menu__item-link_active":""?>"
               rel="nofollow" title="Все публикации с рейтингом 100 и выше">
                <?=GetMessage("THRESHOLD_100")?>

            </a>
        </li>
    </ul>
</div>


<div class="posts_list">
	<ul class="content-list shortcuts_items">


		<?foreach($arResult["ITEMS"] as $arItem):?>

		<li class="content-list__item content-list__item_post shortcuts_item" id="post_445140">
			<article class="post post_preview">
				<header class="post__meta">
					<a class="post__user-info user-info" title="Автор публикации">
						<img src="<?=$arItem["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]?>" width="24" height="24" class="user-info__image-pic user-info__image-pic_small">
						<span class="user-info__nickname user-info__nickname_small"><?=$arItem["PROPERTIES"]["AUTOR"]['LOGIN']?></span>
					</a>
					<span class="post__time">
                        <?=$arItem["ACTIVE_FROM"];?>
					</span>


				</header>

				<h2 class="post__title">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="post__title_link"><?echo $arItem["NAME"]?></a>
				</h2>


				<ul class="post__marks inline-list"></ul>

				<div class="post__body post__body_crop ">
					<div class="post__text post__text-html js-mediator-article">
						<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
									<div style="text-align:center;"><img src="<?echo $arItem['PREVIEW_PICTURE']['SRC']?>" width="600"></div>
							</a><br>
						<?endif;?>
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>

					<a class="btn btn_x-large btn_outline_blue post__habracut-btn" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=GetMessage("DETAIL_POST_READ")?></a>
				</div>

                <div>
                    <ul class="post-stats post-stats_post js-user_" data-post-type="publish_ugc" id="infopanel_post_431480">
                        <li class="post-stats__item post-stats__item_voting-wjt">
                            <div class="voting-wjt voting-wjt_post js-post-vote" >
                                <button type="button" class="btn voting-wjt__button " >
                                    <a class="btn voting-wjt__button" id="link_vote_plus<?= $arItem["ID"] ?>"
                                       href="<?= $APPLICATION->GetCurPageParam("VOTE=PLUS&ITEM_ID=" . $arItem["ID"] . "&RANK_VALUE=".$arItem['PROPERTIES']['VOTE_RESULT']['VALUE']."&PLUSES_COUNT=".$arItem['PROPERTIES']['PLUSES_COUNT']['VALUE'], ["VOTE", "ITEM_ID","RANK_VALUE","PLUSES_COUNT","MINUSES_COUNT"], false); ?>"
                                       title="<?echo "Плюс";?>" aria-disabled="true">
                                        <svg class="icon-svg_arrow-up" width="10" height="16">
                                            <path d="M6.802.129l-6.709 7.637c-.211.241-.037.615.289.615h3.629c.21 0 .38.167.38.372v14.875c0 .205.169.372.379.372h4.64c.21 0 .379-.167.379-.372v-14.876c0-.205.17-.372.38-.372h3.63c.325 0 .5-.373.289-.615l-6.709-7.637c-.153-.171-.427-.171-.578.001z"
                                            </path>
                                        </svg>
                                    </a>
                                </button>

                                <span class="voting-wjt__counter_<?echo ($arItem['PROPERTIES']['VOTE_RESULT']['VALUE']<0)?'negative':'positive';?>  voting-wjt__counter_js-score" title="Общий рейтинг <?=$arItem['PROPERTIES']['VOTE_RESULT']['VALUE'];?>: &uarr;<?=$arItem['PROPERTIES']['PLUSES_COUNT']['VALUE'];?> и &darr;<?=$arItem['PROPERTIES']['MINUSES_COUNT']['VALUE'];?>">
							<?=$arItem['PROPERTIES']['VOTE_RESULT']['VALUE'];?>
						</span>

                                <button type="button" class="btn voting-wjt__button ">
                                    <a class="btn voting-wjt__button" id="link_vote_minus<?= $arItem["ID"] ?>"
                                       href="<?= $APPLICATION->GetCurPageParam("VOTE=MINUS&ITEM_ID=" . $arItem["ID"]. "&RANK_VALUE=".$arItem['PROPERTIES']['VOTE_RESULT']['VALUE']."&MINUSES_COUNT=".$arItem['PROPERTIES']['MINUSES_COUNT']['VALUE'], ["VOTE", "ITEM_ID","RANK_VALUE","MINUSES_COUNT","PLUSES_COUNT"], false); ?>"
                                       title="<?echo "Минус";?>">
                                        <svg class="icon-svg_arrow-down" width="10" height="16">
                                            <path d="M6.802.129l-6.709 7.637c-.211.241-.037.615.289.615h3.629c.21 0 .38.167.38.372v14.875c0 .205.169.372.379.372h4.64c.21 0 .379-.167.379-.372v-14.876c0-.205.17-.372.38-.372h3.63c.325 0 .5-.373.289-.615l-6.709-7.637c-.153-.171-.427-.171-.578.001z">
                                            </path>
                                        </svg>
                                    </a>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>

				<footer class="post__footer">
				</footer>
			</article>


		</li>
		<?endforeach;?>

			<br /><?=$arResult["NAV_STRING"]?>
		</ul>
</div>
