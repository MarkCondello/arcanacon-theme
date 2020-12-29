<?php
//Get post archive page id
function get_archive_page_id($postType)
{
    $pageobj = get_page_by_path($postType);
    return $pageobj->ID;
}

//downpage banner markup
function downPageBanner($title = '', $bgImage = '', $date = null, $ctaText = null, $ctaLink = null)
{
    ?>
        <div class="banner" style="background-image: url('<?= $bgImage ?>');">
			<div class="banner-content">
				<div class="grid-container h-100">
					<div class="grid-x grid-padding-x h-100">
						<div class="small-12 medium-9 cell"> 
                            <h1 class="l-height-1"><?= $title ?></h1>
                            <?php if(isset($date)): ?>
							<p class="ff-super-reg">
								<i class="fal fa-calendar-alt"></i>
								<?= $date ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($ctaText) && !empty($ctaLink)): ?>
						<div class="small-12 cell align-self-bottom"> 
                            <a href="<?= $ctaLink ?>" target="_blank" class="cta">
                                <?= $ctaText ?>
                            </a>     
                            <!-- <h2 class="h3">Don't miss a turn!</h2>  -->
                         </div>
                        <?php endif; ?>
					</div>
				</div>
			</div>	
		</div>
    <?php
}
