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

<article class="post post_full" id="post_445140">
	<div class="post__wrapper">
		<header class="post__meta">
			<a href="https://habr.com/ru/users/pronskiy/" class="post__user-info user-info" title="<?=GetMessage("POST_AUTOR")?>">
				<?if (isset($arResult["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"])):?>
				<img src="<?=$arResult["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]?>" width="24" height="24" class="user-info__image-pic user-info__image-pic_small">
				<?endif;?>
				<span class="user-info__nickname user-info__nickname_small"><?=$arResult["PROPERTIES"]["AUTOR"]['LOGIN'];?></span>
			</a>

			<span class="post__time">
						<?=$arResult['ACTIVE_FROM'];?>
			</span>


		</header>

		<h1 class="post__title post__title_full">
			<span class="post__title-text"><?=$arResult['NAME']?></span>
		</h1>


		<ul class="post__marks inline-list"></ul>

		<div class="post__body post__body_full">
			<div class="post__text post__text-html js-mediator-article"><a href="https://habr.com/ru/post/445140/">
					<?if(is_array($arResult['DETAIL_PICTURE'])):?>
						<div style="text-align:center;"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" width="600"></div>
					<?endif;?>
				</a><br>
			<?=$arResult['DETAIL_TEXT'];?>
			</div>


		</div>

        <?$tags=explode(', ',$arResult['TAGS']);?>

        <?if (is_array($arResult['TAGS'])):?>
		<dl class="post__tags">
			<dt class="post__tags-label">Теги:</dt>
			<dd class="post__tags-list">    <ul class="inline-list inline-list_fav-tags js-post-tags">
                    <?foreach ($tags as $tag):?>
					<li class="inline-list__item inline-list__item_tag"><a href="" rel="tag" class="inline-list__item-link post__tag  "><?=$tag?></a></li>
				    <?endforeach;?>
                </ul>
				<button type="button" class="btn btn_outline_grey btn_mini hidden js-fav-edit-link" data-type="2" data-id="445140" onclick="show_edit_tags(this)">Добавить метки</button>
			</dd>
		</dl>
        <?endif;?>

        <div class="author-panel author-panel_user">
			<div class="user-info">
				<div class="user-info__stats">
					<div class="media-obj media-obj_user-info">
						<a href="https://habr.com/ru/users/pronskiy/" class="media-obj__image">
							<img src="<?=$arResult["PROPERTIES"]["AUTOR"]["PERSONAL_PHOTO"]?>" width="48" height="48" class="media-obj__image-pic media-obj__image-pic_user"/>
						</a>

						<div class="media-obj__body media-obj__body_user-info">

                            <a href="https://habr.com/ru/info/help/karma/" class="user-info__stats-item stacked-counter" title="Количество голосов">
								<div class="stacked-counter__value stacked-counter__value_green "><?=$arResult["PROPERTIES"]["AUTOR"]["UF_CARMA"];?></div>
								<div class="stacked-counter__label"><?=GetMessage('AUTHOR_BLOCK_CARMA')?></div>
							</a>

							<a href="https://habr.com/ru/info/help/karma/#rating" class="user-info__stats-item stacked-counter stacked-counter_rating" title="Рейтинг пользователя">
								<div class="stacked-counter__value stacked-counter__value_magenta"><?=$arResult["PROPERTIES"]["AUTOR"]['UF_RAITING']?></div>
								<div class="stacked-counter__label"><?=GetMessage('AUTHOR_BLOCK_RAITING')?></div>
							</a>

							<a href="https://habr.com/ru/users/pronskiy/subscription/followers/" class="user-info__stats-item stacked-counter stacked-counter_subscribers" title="Количество подписчиков">
								<div class="stacked-counter__value stacked-counter__value_blue"><?=$arResult["PROPERTIES"]["AUTOR"]['UF_FOLLOWERS']?></div>
								<div class="stacked-counter__label"><?=GetMessage('AUTHOR_BLOCK_FOLLOWERS')?></div>
							</a>
						</div>
					</div>

				</div>
				<div class="user-info__about">
					<div class="user-info__links">
						<a href="" class="user-info__fullname"><?=$arResult["PROPERTIES"]["AUTOR"]['NAME'].' '.$arResult["PROPERTIES"]["AUTOR"]['LAST_NAME']?></a>&nbsp;<a href="" class="user-info__nickname user-info__nickname_doggy"><?=$arResult["PROPERTIES"]["AUTOR"]['LOGIN']?></a>

					</div>
                    <?if (isset($arResult["PROPERTIES"]["AUTOR"]['UF_SPECILIZATION'])):?>
				    	<div class="user-info__specialization"><?=$arResult["PROPERTIES"]["AUTOR"]['UF_SPECILIZATION']?></div>
                    <?endif;?>
				</div>
			</div>
		</div>
	</div>
	<a href="<?=$arResult["LIST_PAGE_URL"]?>"><?=GetMessage("BACK_TO_THE_POSTLIST")?></a>
</article>
