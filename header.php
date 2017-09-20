<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PaperApp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site cf">
    <header id="masthead" class="site-header cf">
        <div class="site-branding">
            <?php
            if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><i class="fa fa-rss fa-fw faa-pulse animated"></i>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <p class="site-title">
                    <i class="fa fa-street-view fa-fw"></i>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;?>
        </div><!-- .site-branding -->

    </header><!-- #masthead -->

    <!--	<div id="content" class="site-content">-->
