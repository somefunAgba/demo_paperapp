<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PaperApp
 */

get_header();
?>

<article class="api-post-container cf">

    <h1 class="api-post-title"></h1>
    <div class="api-post-meta">
        <i class="fa fa-newspaper-o fa-fw"></i> by
        <span class="api-post-meta-author"></span> <i class="fa fa-calendar fa-fw"></i>
        <span class="api-post-meta-date"></span>
        <span class="post-likes"><i class="fa fa-thumbs-up fa-fw fa-lg faa-vertical animated"></i>
        <span id="pl" val="0"></span></span>
        <span class="post-dislikes"><i class="fa fa-thumbs-down fa-fw fa-lg faa-vertical animated"></i>
        <span id="pd" val="0"></span></span>
    </div>
    <div class="api-post-content"></div>

    <div id="page_nav">
    <span><button id ="prev"><i class="fa fa-chevron-left fa-fw"></i>
            <span class ="api-btn-prev"></span></button></span>
    <span><button id = "next"><span class ="api-btn-next"></span>
            <i class="fa fa-chevron-right fa-fw"></i></button></span>
    </div>
</article>

<?php
get_footer();