<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Snappy
 */
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
get_header(); ?>

	<div id="primary" class="content-area">
		<?php if ( z_taxonomy_image_url() ) {
			z_taxonomy_image(); 
		} else {
			echo '<img src="'.get_stylesheet_directory_uri().'/img/default-catimg.jpg" />';
		} ?>
	</div><!-- #primary -->

<?php get_sidebar('district'); ?>
<div class="clearfix"></div>
	<main id="main" class="site-main" role="main">
		<ul class="list-cats clearfix">
			<li><a href="<?php echo get_permalink( 69 ); ?>">Văn phòng Hà Nội</a></li>
			<?php
			$args2 = array(
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => 0,
				);
			$taxonomies = get_terms( 'district', $args2);
			// print_r($taxonomies);
				foreach($taxonomies as $taxonomy) { ?>
				<li <?php echo ( ($actual_link == get_term_link( $taxonomy ) ) ? 'class="current"' : '' ); ?>><a href="<?php echo get_term_link( $taxonomy ); ?>" title="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></a></li>
				<?php }
			?>
		</ul>
		<div class="office-list">
			<?php
			$args = array(
				'post_type'=> 'office',
				'posts_per_page' => 12,
				'tax_query' => array(
					array(
						'taxonomy' => 'district',
						'terms'    => get_queried_object()->term_id,
					),
				),
			);
			$loop = array(
				'args' => $args,
				'custom_template' => 'content-office.php',
				'excerpt' => 0,
				'wrapper' => ''
			);
			snappy_loop($loop);
			?>
		</div>
		<div class="clearfix"></div>
		<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
	</main>
<?php get_footer(); ?>
