<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PaperApp
 */

?>
<!--</div><!-- #content -->

<footer id="colophon" class="site-footer cf">
    <div id = "left_foot">
        <i class="fa fa-gear fa-lg fa-fw faa-spin animated"></i>Engine: <span id="coll1"></span>
    </div>
    <div id="right_foot">
        <i class="fa fa-copyright fa-fw"></i>
        <? //echo wp_get_theme(); ?>
        <span id="colr1"></span>
        <i class="fa fa-compass fa-fw"></i>
        <a href="https://github.com/somefunagba"><span id="colr2"></span></a>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>