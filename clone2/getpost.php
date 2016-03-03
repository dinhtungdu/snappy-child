<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include "simple_html_dom.php";
$html = file_get_html('response.html');
$arr = $html->find('li');
$arr = array_reverse($arr);
foreach ($arr as $element) {
    echo '<li class="item"><a href="' . $element->find('a', 0)->href.'">' . $element->find('a', 0)->innertext . '</a></li>';
}