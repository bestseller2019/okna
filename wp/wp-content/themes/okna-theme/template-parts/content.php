<?php
/**
 * Template part for displaying posts.
 * @package Bar Restaurant
 */ ?>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-8">
            <div class="grid">
            <?php
                if ( have_posts() ) : $i=1;
                    while ( have_posts() ) : the_post();?>                
                        <div class="grid-sizer"></div>
                        <div class="blog-content-left grid-item <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="blog-image-link">
                                    <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
                                    <div class="blog-image-overlay">
                                        <div class="blog-info-text">
                                            <h4><a href="<?php the_permalink(); ?>" class="blog-title"><?php the_title(); ?></a></h4>
                                            <div class="blog-summary"><?php the_excerpt(); ?></div>
                                            <p><a href="<?php the_permalink(); ?>" class="blog-read-more"><i class="fa fa-link"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } else{ ?>
                                <div class="blog-image-link">
                                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/default.png'); ?>" alt="<?php the_title(); ?>" class="default-feature-image" />
                                    <div class="blog-image-overlay">
                                        <div class="blog-info-text">
                                            <h4><a href="<?php the_permalink(); ?>" class="blog-title"><?php the_title(); ?></a></h4>
                                            <div class="blog-summary"><?php the_excerpt(); ?></div>
                                            <p><a href="<?php the_permalink(); ?>" class="blog-read-more"><i class="fa fa-link"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php
    				if($i % 2 == 0):
    					echo '<div class="clearfix"></div>'; 
    				endif;
    				$i++;
                    endwhile; ?>
                    </div>
                    <?php the_posts_pagination( array(
                        'type'  => 'list',
                        'screen_reader_text' => ' ',
                        'prev_text'          => esc_html__( 'Previous', 'bar-restaurant' ),
                        'next_text'          => esc_html__( 'Next', 'bar-restaurant' ),
                    ) );
                endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>