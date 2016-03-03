<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once 'class.Database.inc';
include "simple_html_dom.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cat = $_POST['cat'];

$ch = curl_init();
$raw = '{"siteUrl":"http://sovhtt.hanoi.gov.vn","PortalAlias":"vie","DocumentDataAlias":"Văn bản pháp quy","linhvuc":"","cqbanhanh":"","theloai":"","nam":"'.$cat.'","keyword":"","ItemsPerRow":"100","NoOfVisiblePage":"5","CurrentPage":"0","PrefixSpecial":"-qnpsite-","SiteID":"1"}';
curl_setopt($ch, CURLOPT_URL,            "http://sovhtt.hanoi.gov.vn/ajaxpro/SP2013Portal.Webpart.CmsDocument,SP2013Portal.Webpart.ashx" );
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
	'Referer: http://sovhtt.hanoi.gov.vn/Pages/home.aspx?s=vanbanphapquy',
)); 

$result=curl_exec ($ch);
$html = str_get_html($result);
$arr = $html->find('tr');
foreach ($arr as $element) {
	if($element->find('td')) {
		$url = $element->find('td', 1)->find('a', 0)->href;
		$url = str_replace('\"', '', $url);
		$name = $element->find('td', 1)->find('a', 0)->innertext;
    	echo '<li class="item"><a href="'.$url.'">'.$name.'</li>';
	}
}

} // end check post request