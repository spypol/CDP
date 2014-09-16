<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cdp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<aside id="search" class="widget widget_search">
				<img src="<?php echo get_template_directory_uri() . '/img/search.png' ?>" title="Rechercher" id="search-img"/> 
                <?php get_search_form(); ?>
            </aside>
            <aside id="social" class="widget widget_social">
				<a href="<?php echo get_bloginfo( 'siteurl' ); ?>/feed"><img src="<?php echo get_template_directory_uri() . '/img/rss.png' ?>" title="RSS" id="social-img"/></a>
				<a href="https://www.facebook.com/pages/Compote-de-Prod/130947013631437"><img src="<?php echo get_template_directory_uri() . '/img/facebook.png' ?>" title="Facebook" id="social-img"/></a>
				<a href="http://compotedeprod.com"><img src="<?php echo get_template_directory_uri() . '/img/compotedeprod.png' ?>" title="Compote de Prod" id="social-img"/></a>
            </aside>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
        
        