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

	<footer id="colophon" class="site-footer">

		<div class="site-info">

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'paperapp' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'paperapp' ), 'WordPress and OpenUI5' );
			?></a>

			<span class="sep"> | </span>

			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'paperapp' ), 'paperapp', '<a href="https://github.com/somefunAgba">Oluwasegun Somefun</a>' );
			?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
