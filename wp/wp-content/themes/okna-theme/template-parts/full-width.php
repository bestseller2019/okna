<?php
/**
 * Template Name: Full Width
 **/
get_header(); ?>
<section id="blog-innerpage-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="blog-single-inner-page">
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
        </div>
    </div>
</section>
<?php get_footer();