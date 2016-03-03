<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
require_once 'class.Database.inc';
ini_set('display_errors', 1); 
error_reporting(E_ALL);

function get_real_post($id) {
  $sql = "SELECT * FROM `vm_blogs_match` WHERE `old_blog`=" . $id;
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $result = $mysqli->query( $sql );
  if( $row = $result->fetch_assoc() ) {
    return $row['new_blog'];
  }
  else {
    return 0;
  }
}
function clone_get_cat_name($catid) {
  $sql = "SELECT catid, alias FROM `vm_vi_news_cat` WHERE `catid`=" . $catid;
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $result = $mysqli->query( $sql );
  if( $row = $result->fetch_assoc() ) {
    return $row['alias'];
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$oldid = $_POST['id'];
$alias = $_POST['alias'];
$catid = $_POST['catid'];
$newid = get_real_post($oldid);
if ($newid == 0) {
  die();
}
$slug = '';
// $slug .= clone_get_cat_name($catid);
// $slug .= '/';
$slug .= $alias;
$slug .= '-';
$slug .= $oldid;

wp_update_post( array(
  'ID' => $newid,
  'post_name' => $slug,
) );
  echo '<span style="color: green;"> - Done URL!</span>';
}