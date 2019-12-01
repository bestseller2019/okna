<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
$bavotasan_theme_options = bavotasan_theme_options();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page">

		<div id="header-wrap" class="grid wfull">
			<header id="header" class="grid <?php echo esc_attr( $bavotasan_theme_options['width'] ); ?> row" role="banner">
				<div id="mobile-menu" class="clearfix">
					<a href="#" class="left-menu fl"><i class="icon-reorder"></i></a>
					<a href="#" class="fr"><i class="icon-search"></i></a>
				</div>
				<div id="drop-down-search"><?php get_search_form(); ?></div>

				<?php
				$text_color = get_header_textcolor();
				$header_class = ( 'blank' == $text_color ) ? ' class="remove"' : ' class="left-header fl"';
				?>
				<div<?php echo $header_class; ?>>
					<?php $tag = ( is_front_page() && is_home() ) ? 'h1' : 'div'; ?>
					<<?php echo $tag; ?> id="site-title"><a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $tag; ?>>
					<?php if ( $bavotasan_theme_options['tagline'] ) { ?><div id="site-description"><?php bloginfo( 'description' ); ?></div><?php } ?>
				</div>

				<div class="right-header fr">
					<div id="nav-wrapper">
						<div class="nav-content">
							<nav id="site-navigation" class="navbar navbar-inverse" role="navigation">
								<h3 class="assistive-text"><?php _e( 'Main menu', 'tonic' ); ?></h3>
								<a class="assistive-text" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'tonic' ); ?>"><?php _e( 'Skip to content', 'tonic' ); ?></a>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'navbar-inner', 'menu_class' => 'nav', 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 2 ) ); ?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</header><!-- #header .row -->

			<?php
			if ( is_front_page() ) {
				bavotasan_jumbotron();
			}
			?>

		</div>

		<div id="main" class="grid <?php echo esc_attr( $bavotasan_theme_options['width'] ); ?> row">