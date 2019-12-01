<?php
/**
 * The template for displaying all pages.
 *
 * @package Bar Restaurant
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php the_title(); ?></h2>
		    <div class="breadCumbs"><?php bar_restaurant_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blog-innerpage-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="blog-single-inner-page default-page">
                	<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>
							<div class="bloginner-content-part" id="post-<?php the_ID(); ?>">
								<?php if ( has_post_thumbnail() ) : ?> 
									<div class="blog-img">
										<?php the_post_thumbnail('bar-restaurant-feature-image'); ?>
									</div>
								<?php endif;
								the_content(); ?>
							</div>
							<?php wp_link_pages( array(
						        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bar-restaurant' ) . '</span>',
						        'after'       => '</div>',
						        'link_before' => '<span>',
						        'link_after'  => '</span>',
						        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bar-restaurant' ) . ' </span>%',
						        'separator'   => '<span class="screen-reader-text">, </span>',
						    ) );
							the_posts_pagination( array(
								'type'	=> 'list',
			                    'screen_reader_text' => ' ',
			                    'prev_text'          => esc_html__( 'Previous', 'bar-restaurant' ),
			                    'next_text'          => esc_html__( 'Next', 'bar-restaurant' ),
		                	) );
						endwhile;
					endif; ?>         
				</div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer();