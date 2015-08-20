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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="snappy-row">
			<div class="container">
				<div class="ftwg ft-1">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div class="ftwg ft-2">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<div class="ftwg ft-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php echo ( isset($snappy['opt_general_beforebody']) ? $snappy['opt_general_beforebody'] : '' ); ?>

<?php wp_footer(); ?>

</body>
</html>