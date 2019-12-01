<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Bar Restaurant
 */
get_header(); 
$title = get_theme_mod('404_heading_text');
$description = get_theme_mod('404_desc'); ?>
<section id="blog-title-top">
    <div class="container">
        <div class="blog-title">
            <h2><?php esc_html_e( "Error - Page Not Found", 'bar-restaurant' ); ?></h2>
            <div class="breadCumbs"><?php bar_restaurant_breadcrumbs(); ?></div>
        </div>
    </div>
</section>
<section id="blogcontent">
    <div class="container">
        <div class="row"> 
            <div class="col-xs-12 not-found">
                <div class="bloginner-content-part">
                    <h1><i class="fa fa-exclamation-circle" aria-hidden="true"></i></h1>
                    <?php if($title != ''){ ?><h1><?php echo esc_html($title); ?></h1><?php }
                        if($description != ''){ ?><p><?php echo wp_kses_post($description); ?></p><?php }
                    get_search_form(); ?>
                </div>
        	</div>
        </div>
    </div>
</section>
<?php get_footer(); ?>