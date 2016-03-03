<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include "simple_html_dom.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $url = $_POST['url'];
  $thumb = $_POST['img'];
  $category = array( $_POST['cat'] );


$html = file_get_html( $url );
$title = $html->find('.d-title', 0)->plaintext;
$title = trim( $title, ' ' );
$excerpt = $html->find('.news-intro', 0)->plaintext;
$excerpt = trim( $excerpt, ' ' );
$content = $html->find('.gl-content', 0);

$datestr = $html->find('span.subtitle', 0)->plaintext;
$_date = preg_replace("/Đăng ngày:\s(.*);\s(.*)/", "$1", $datestr);
$date = str_replace('/', '-', $_date);
$date = date("Y-m-d H:i:s", strtotime($date) );

// Register Post Data
$post = array();
$post['post_status']   = 'publish';
$post['post_type']     = 'post'; // can be a CPT too
$post['post_title']    = $title;
$post['post_date']     = $date;
$post['post_content']  = html_entity_decode(htmlentities($content));
$post['post_author']   = 1;
$post['post_category'] = $category;
if( $excerpt ) {
  $post['post_excerpt'] = $excerpt;
}


// Create Post
  // require(ABSPATH . '/wp-include/post.php');
  // require('/wp-include/post.php');
  $post_id = wp_insert_post( $post );
  add_post_meta( $post_id, 'excerpt', $excerpt, $unique = false );
  // Add Featured Image to Post
  $image_url  = $thumb; // Define the image URL here
  $upload_dir = wp_upload_dir(); // Set upload folder
  $image_data = file_get_contents( str_replace(' ', '%20', $image_url) ); // Get image data
  $filename   = basename($image_url); // Create image file name

  // Check folder permission and define file location
  if( wp_mkdir_p( $upload_dir['path'] ) ) {
    $file = $upload_dir['path'] . '/' . $filename;
  }
  else {
    $file = $upload_dir['basedir'] . '/' . $filename;
  }

  // Create the image  file on the server
  file_put_contents( $file, $image_data );

  // Check image file type
  $wp_filetype = wp_check_filetype( $filename, null );

  // Set attachment data
  $attachment = array(
      'post_mime_type' => $wp_filetype['type'],
      'post_title'     => sanitize_file_name( $filename ),
      'post_content'   => '',
      'post_status'    => 'inherit'
  );

  // Create the attachment
  $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

  // Include image.php
  require_once(ABSPATH . 'wp-admin/includes/image.php');

  // Define attachment metadata
  $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

  // Assign metadata to attachment
  wp_update_attachment_metadata( $attach_id, $attach_data );

  // And finally assign featured image to post
  set_post_thumbnail( $post_id, $attach_id );

  echo '<span style="color: green;"> - Done!</span>';

}