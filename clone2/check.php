<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
require_once 'class.Database.inc';
ini_set('display_errors', 1); 
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if( !empty( $_POST['cat_list'] ) ) {
		$cat = $_POST['cat_list'];
	}
	else {
		die;
	}
}
$real_cat = cat_routing_r($cat);
$sql = "SELECT SQL_CALC_FOUND_ROWS `id`, `catid`, `publtime`, `title`, `alias`, `hometext`, `homeimgfile` FROM `vm_vi_news_" . $real_cat . "` WHERE `status`=1 AND `catid`=" .$real_cat . " ORDER BY `publtime` ASC";
$db = Database::getInstance();
$mysqli = $db->getConnection();
$result = $mysqli->query( $sql );
while( $row = $result->fetch_assoc() ) {
	$homeimgfile = $row['homeimgfile'];
	if( filter_var($homeimgfile, FILTER_VALIDATE_URL) ) {
		$image_url  = $homeimgfile; // Define the image URL here
	}
	else {
		$image_url = 'http://vietmoz.net/uploads/news/' . $homeimgfile;
	}
	echo '<li data-catid="'.$row['catid'].'" data-publtime="'.$row['publtime'].'" data-alias="'.$row['alias'].'" data-hometext="'.$row['hometext'].'" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-homeimgfile="'.$image_url.'">';
	echo $row['id'];
	echo ' - ';
	echo $row['title'];
	echo "</li>";
}