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
	
	<?php do_action('snappy_after_main_content'); ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="snappy-row">
			<div class="container">
				<div class="footer-area footer-1">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div class="footer-area footer-2">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			</div><!-- /.container -->
		</div><!-- /.snappy-row -->
		<div class="snappy-row site-info">
			<div class="container">
				<?php dynamic_sidebar( 'footer-4' ); ?>
			</div><!-- /.container -->
		</div><!-- /.snappy-row -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php echo ( isset($snappy['opt_general_beforebody']) ? $snappy['opt_general_beforebody'] : '' ); ?>

<?php wp_footer(); ?>

</body>
</html>
