<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package PaperApp
 */

/**
 *  Get wp_nav_menu() fallback, wp_page_menu() to show a home link
 */
function paperapp_page_menu_args($args) {
    $args['show home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', 'paperapp_page_menu_args');

/**
 * Filter in a link to a contnet ID attribute for the
 * next/prev image links on image attachment pages
 *
 */
function paperapp_enhanced_image_navigation($url, $id) {
    if (!is_attachment() && !wp_attachment_is_image($id))
        return $url;

    $image = get_post($id);
    if (!empty($image->post_parent) && ($image->post_parent) && $image->post_parent != $id)
        $url .= '#main';

    return $url;
}
add_filter('attachment_link', 'paperapp_enhanced_image_navigation', 10, 2);
