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
$element = $html->find('.little-detail', 0);
	$title = $element->find('tr', 0)->find('td', 1)->innertext;
	$trinh_tu_thuc_hien = $element->find('tr', 1)->find('td', 1)->innertext;

	$linh_vu = $element->find('tr', 2)->find('td', 1)->innertext;

	$co_quan_thuc_hien = $element->find('tr', 3)->find('td', 1)->innertext;

	$doi_thuong_thuc_hien = $element->find('tr', 4)->find('td', 1)->innertext;

	$bieu_mau = $element->find('tr', 5)->find('td', 1)->innertext;

	$cach_thuc_thuc_hien = $element->find('tr', 6)->find('td', 1)->innertext;

	$thoi_han_giai_quyet = $element->find('tr', 7)->find('td', 1)->innertext;

	$le_phi = $element->find('tr', 8)->find('td', 1)->innertext;

	$ket_qua = $element->find('tr', 9)->find('td', 1)->innertext;

	$can_cu_phap_ly = $element->find('tr', 10)->find('td', 1)->innertext;

	$yeu_cau_dieu_kien = $element->find('tr', 11)->find('td', 1)->innertext;

	// Register Post Data
	$post = array();
	$post['post_status']   = 'publish';
	$post['post_type']     = 'quan_ly'; // can be a CPT too
	$post['post_title']    = $title;
	$post['tax_input'] = array('quan_ly_cat' => array($cat) );
	// Create Post
	$post_id = wp_insert_post( $post );
	update_field('field_5690daf2af58f', $trinh_tu_thuc_hien, $post_id);

	update_field('field_5690db02af590', $linh_vu, $post_id);

	update_field('field_5690db15af591', $co_quan_thuc_hien, $post_id);

	update_field('field_5690db7eaf593', $doi_thuong_thuc_hien, $post_id);

	update_field('field_5690db27af592', $bieu_mau, $post_id);

	update_field('field_5690db98af594', $cach_thuc_thuc_hien, $post_id);

	update_field('field_5690dbacaf595', $thoi_han_giai_quyet, $post_id);

	update_field('field_5690dbbfaf596', $le_phi, $post_id);

	update_field('field_5690dbc7af597', $ket_qua, $post_id);

	update_field('field_5690dbdbaf598', $can_cu_phap_ly, $post_id);

	update_field('field_5690dbf0af599', $yeu_cau_dieu_kien, $post_id);
	echo ' - Done';

} // end check post request