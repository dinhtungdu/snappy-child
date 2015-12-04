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
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php echo ( isset($snappy['opt_general_beforebody']) ? $snappy['opt_general_beforebody'] : '' ); ?>

<?php wp_footer(); ?>

</body>
</html>
