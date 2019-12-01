<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.6
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
	<header>
		<?php
		$display_categories = $bavotasan_theme_options['display_categories'];
		if ( ! empty( $display_categories ) && 'page' != get_post_type() ) { ?>
		<h3 class="post-category"><?php the_category( ', ' ); ?></h3>
		<?php } ?>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title taggedlink"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>

		<h2 class="entry-meta">
			<?php
			$display_author = $bavotasan_theme_options['display_author'];
			if ( $display_author )
				printf( __( 'by %s', 'tonic' ),
					'<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . esc_attr( sprintf( __( 'Posts by %s', 'tonic' ), get_the_author() ) ) . '" rel="author">' . get_the_author() . '</a>'
				);

			$display_date = $bavotasan_theme_options['display_date'];
			if( $display_date ) {
				if( $display_author )
					echo '&nbsp;&bull;&nbsp;';

			    echo '<a href="' . get_permalink() . '"><time class="published updated" datetime="' . get_the_date( 'Y-m-d' ) . '">' . get_the_date() . '</time></a>';
	        }

			$display_comments = $bavotasan_theme_options['display_comment_count'];
			if( $display_comments && comments_open() ) {
				if ( $display_author || $display_date )
					echo '&nbsp;&bull;&nbsp;';

				comments_popup_link( __( '0 Comments', 'tonic' ), __( '1 Comment', 'tonic' ), __( '% Comments', 'tonic' ) );
			}
			?>
		</h2>
	</header>
