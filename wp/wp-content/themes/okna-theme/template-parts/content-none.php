<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Bar Restaurant
 */
?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php esc_html_e( 'Nothing Found', 'bar-restaurant' ); ?></h2>
		    <div class="breadCumbs"><?php bar_restaurant_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blog-innerpage-content">
	<div class="container">
		<div class="row">            
	   		<div class="col-xs-12 col-sm-12 col-md-9">
	        	<div class="search-results">
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
					<h4><?php printf(/* translators: 1 is link , */ esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bar-restaurant' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h4>
					<?php elseif ( is_search() ) : ?>
					<h2 class="no-match-title"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php esc_html_e( 'Nothing Found', 'bar-restaurant' ); ?></h2>
					<h5 class="no-match-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bar-restaurant' ); ?></h5>
					<div class="bar-restaurant-search-form">
						<?php get_search_form(); ?>
					</div>
					<?php else : ?>
					<h4><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bar-restaurant' ); ?></h4>
					<?php get_search_form(); ?>
					<?php endif; ?>
	        	</div>
	        </div>
	        <?php get_sidebar(); ?>
	    </div>
	</div>
</section>