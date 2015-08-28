<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Snappy
 */
global $snappy;
?>

	<?php if( ! is_page_template( 'page-full-width.php' ) ) {
		echo '</div> <!-- .container -->';
	}
	?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer snappy-row" role="contentinfo">
	<div class="container">
		<div class="logo">
			<img src="<?php echo get_stylesheet_directory_uri();?>/img/footer-logo.png" data-retina-true>
		</div>
		<div class="ft-1 ftwg">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="ft-2 ftwg">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php echo ( isset($snappy['opt_general_beforebody']) ? $snappy['opt_general_beforebody'] : '' ); ?>

<?php wp_footer(); ?>

</body>
</html>
