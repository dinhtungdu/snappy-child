<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once 'class.Database.inc';
include "simple_html_dom.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cat = $_POST['cat'];
	$url = $_POST['url'];

$html = file_get_html($url);
$element = $html->find('#content-box', 0);
$title = $element->find('.d-title', 0)->innertext;
$content = $element->find('.gl-content', 0);
	// Register Post Data
	$post = array();
	$post['post_status']   = 'publish';
	$post['post_type']     = 'gioi_thieu'; // can be a CPT too
	$post['post_title']    = $title;
        $post['post_content']  = html_entity_decode(htmlentities($content));
        $post['post_parent'] = 7453;
        
        // Create Post
	$post_id = wp_insert_post( $post );
	echo ' - Done';
} // end check post request
