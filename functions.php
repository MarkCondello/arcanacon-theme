<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
//ToDo: remove this
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 



// Use this as a template for custom post types
require_once(get_template_directory().'/functions/custom-post-type.php');


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
						<div class="small-9 cell"> 
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
                            <h2>Don't miss a turn!</h2> 
                         </div>
                        <?php endif; ?>
					</div>
				</div>
			</div>	
		</div>
    <?php
}

 

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 


/**
 * Custom Queries
 */
// function event_main_query($query){
//     if(!is_admin() && is_post_type_archive('event') && $query->is_main_query()):
//         $today = date('Ymd');
//         $query->set('meta_key', 'event_date');
//         $query->set('order_by', 'meta_value_num');
//         $query->set('order', 'DEC');
//         $query->set('meta_query', [
//             'key' => 'event_date',
//             'compare' => '>=',
//             'value' => $today,
//            // 'type' => 'numeric',
//         ]);

 

//     endif;
// }

// add_filter('pre_get_posts', 'event_main_query');



