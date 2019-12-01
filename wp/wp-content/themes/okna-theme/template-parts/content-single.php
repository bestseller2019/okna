<?php
/**
 * The template for displaying the content of single post.
 *
 * @package Bar Restaurant
 */ ?>
<div class="bloginner-content-part" id="post-<?php the_ID(); ?>">
    <div class="single-blog">
        <div class="title-data">
            <h2><?php the_title(); ?></h2>
            <ul>
                <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo esc_html__('By ', 'bar-restaurant').esc_html(ucfirst(get_the_author())); ?></a></li>
                <li><?php echo esc_html__('Posted on ','bar-restaurant').get_the_date(get_option('date_format')); ?></li>
            </ul>
        </div>
       <div class="single-blog-wrap">
         <?php if ( has_post_thumbnail() ) : ?> 
            <div class="blog-img">
                <?php the_post_thumbnail('bar-restaurant-feature-image'); ?>
            </div>
            <?php endif; ?>
            <div class="blog-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
 </div>   
<?php wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bar-restaurant' ) . '</span>',
        'after'       => '</div>',        
    ) );