<?php
/**
 * The template for displaying archive pages.
 *
 * @package Bar Restaurant
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php the_archive_title(); ?></h2>
		    <div class="breadCumbs"><?php bar_restaurant_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blogcontent">
    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
</section>
<?php get_footer(); ?>