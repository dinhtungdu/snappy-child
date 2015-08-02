<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Snappy
 */
global $snappy;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php echo $snappy['opt_general_tracking']; ?>
<?php wp_head(); ?>
<?php echo $snappy['opt_general_beforehead']; ?>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

  <header id="masthead" class="site-header header-v<?php echo $snappy['opt_header_layout']; ?>" role="banner">
    <?php
      $hversion = 'v'.$snappy['opt_header_layout'];
      if( locate_template( 'framework/templates/header/header-' . $hversion . '.php' ) != '' ) {
        get_template_part( 'framework/templates/header/header', $hversion );
      }
    ?>
  </header><!-- #masthead -->


	<div id="content" class="site-content snappy-row">

	<?php if( ! is_page_template( 'page-100-width.php' ) ) {
		echo '<div class="container">';
    echo '<img class="global-banner" src="'.get_stylesheet_directory_uri().'/img/Banner-Category.png">';
	}
	?>