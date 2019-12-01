<?php
/**
 * The template for displaying search results pages.
 *
 * @package Bar Restaurant
 */
get_header(); ?>
<?php if ( have_posts() ) : ?>
	<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php printf(/* translators: %s is search query .*/ esc_html__( 'Search Results for: %s', 'bar-restaurant'), get_search_query(false)); ?></h2>
		    <div class="breadCumbs"><?php bar_restaurant_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blogcontent">
	<?php get_template_part( 'template-parts/content', 'search' ); 
	else: 
		get_template_part( 'template-parts/content', 'none' );  ?>
</section>
<?php endif;
get_footer(); ?>