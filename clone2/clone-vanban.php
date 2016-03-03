<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include "simple_html_dom.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $url = $_POST['url'];
  $year = $_POST['year'];
$yearid = get_term_by( 'slug', $year, 'nam_ban_hanh' );
$year_id = $yearid->term_id;
$html = file_get_html( $url );
$table = $html->find('.little-detail tbody', 0);
$title = $table->find('tr', 0)->find('td', 1)->plaintext;
$ngay_van_ban = $table->find('tr', 1)->find('td', 1)->plaintext;
$ngay_van_ban = preg_replace("/(\d+)\/(\d+)\/(\d+)/", "$3$2$1", $ngay_van_ban);
$ngay_ban_hanh = $table->find('tr', 2)->find('td', 1)->plaintext;
$ngay_ban_hanh = preg_replace("/(\d+)\/(\d+)\/(\d+)/", "$3$2$1", $ngay_ban_hanh);
$co_quan_ban_hanh = $table->find('tr', 3)->find('td', 1)->plaintext;
$nguoi_ky_duyet = $table->find('tr', 4)->find('td', 1)->plaintext;
$trich_yeu_noi_dung = $table->find('tr', 6)->find('td', 1)->plaintext;
$tep_dinh_kem = $table->find('tr', 5)->find('a', 0)->href;
$van_ban_cat = null;
$co_quan_cat = null;
if( $co_quan_ban_hanh == 'UBND thành phố Hà Nội') {
  $van_ban_cat = 48;
  $co_quan_cat = 265;
} elseif ($co_quan_ban_hanh == 'Sở Văn hóa và Thể thao Hà Nội') {
  $van_ban_cat = 49;
  $co_quan_cat = 264;
} else {
  $van_ban_cat = 47;
  $co_quan_cat = 266;
}

// Register Post Data
$post = array();
$post['post_status']   = 'publish';
$post['post_type']     = 'van_ban'; // can be a CPT too
$post['post_title']    = $title;
$post['tax_input'] = array(
  'van_ban_cat' => array($van_ban_cat),
  'linh_vuc_van_ban' => array(259),
  'co_quan_ban_hanh' => array($co_quan_cat),
  'loai_van_ban' => array(267),
  'nam_ban_hanh' => array($year_id),
  );

// Create Post
  // require(ABSPATH . '/wp-include/post.php');
  // require('/wp-include/post.php');
  $post_id = wp_insert_post( $post );
  update_field('field_56933bbd55e00', $ngay_van_ban, $post_id);

  update_field('field_56933be255e01', $ngay_ban_hanh, $post_id);

  update_field('field_56933bee55e02', $nguoi_ky_duyet, $post_id);

  update_field('field_56933c1755e03', $trich_yeu_noi_dung, $post_id);

  // Add Featured Image to Post
  $image_url  = $tep_dinh_kem; // Define the image URL here
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
  // set_post_thumbnail( $post_id, $attach_id );
  update_field('field_56933c3155e04', $attach_id, $post_id);

  echo '<span style="color: green;"> - Done!</span>';

}