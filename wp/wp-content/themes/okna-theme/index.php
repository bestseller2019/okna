<?php
/**
 * The main template file.
 *
 * @package Bar Restaurant
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php $bar_restaurant_blog_page = esc_html(get_option('page_for_posts')); 
            if(!empty($bar_restaurant_blog_page)){ 
                echo sprintf('%s',get_the_title(get_option( 'page_for_posts' ))); 
            } else{ 
                esc_html_e( "Blog", 'bar-restaurant' );
            } ?></h2>
		</div>
	</div>
</section>
<section id="blogcontent">    
    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
</section>
<?php get_footer(); ?>