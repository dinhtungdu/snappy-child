<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once 'class.Database.inc';
include "simple_html_dom.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cat = $_POST['cat'];
function get_donvi($cat)
{
  $sql = "SELECT * FROM `donvi` WHERE `newid`=" . $cat;
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $result = $mysqli->query( $sql );
  if( $row = $result->fetch_assoc() ) {
    return $row['oldid'];
  }
  else {
    return 0;
  }
}
$realcat =  get_donvi($cat);
$ch = curl_init();
$raw = '{"siteUrl":"http://sovhtt.hanoi.gov.vn","PortalAlias":"vie","DanhBaAlias":"Danh bạ","donvi":"'.$realcat.'","hoten":"","email":"","dienthoai":"","ItemsPerRow":"10","NoOfVisiblePage":"5","CurrentPage":"0","PrefixSpecial":"-qnpsite-","SiteID":"1"}';
curl_setopt($ch, CURLOPT_URL,            "http://sovhtt.hanoi.gov.vn/ajaxpro/SP2013Portal.Webpart.CmsContacts,SP2013Portal.Webpart.ashx" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $raw ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array(
	'POST: /ajaxpro/SP2013Portal.Webpart.CmsContacts,SP2013Portal.Webpart.ashx HTTP/1.1:',
	'Host: sovhtt.hanoi.gov.vn',
	'Connection: keep-alive',
	'Pragma: no-cache',
	'Cache-Control: no-cache',
	'X-AjaxPro-Method: ServerSideRenderServicePublic',
	'Origin: http://sovhtt.hanoi.gov.vn',
	'Content-Type: text/plain; charset=UTF-8',
	'Referer: http://sovhtt.hanoi.gov.vn/Pages/svhttdl-danhba-qnpsite-7.html',
)); 

$result=curl_exec ($ch);
$html = str_get_html($result);
$arr = $html->find('tr');
foreach ($arr as $element) {
	if($element->find('td')) {
		$name = $element->find('td', 1)->innertext;
		$chucvu = $element->find('td', 2)->innertext;
		$dt = $element->find('td', 3)->innertext;
		$email = $element->find('td', 4)->innertext;
    	echo '<li class="item" data-chucvu="'.$chucvu.'" data-dt="'.$dt.'" data-email="'.$email.'">'.$name.'</li>';
    	// Register Post Data
		$post = array();
		$post['post_status']   = 'publish';
		$post['post_type']     = 'danh_ba'; // can be a CPT too
		$post['post_title']    = $name;
		$post['tax_input'] = array('danh_ba_cat' => array($cat) );
		// Create Post
		$post_id = wp_insert_post( $post );
		update_field('field_568de19e08113', $chucvu, $post_id); //chuc danh
		update_field('field_568de1ac08114', $dt, $post_id); //dt
		update_field('field_568de1d608115', $email, $post_id); //email
		echo ' - Done';
	}
}

} // end check post request