<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
require_once 'class.Database.inc';
ini_set('display_errors', 1); 
error_reporting(E_ALL);
function get_parent($id) {
  $sql = "SELECT * FROM `vm_comments_match` WHERE `oldid`=" . $id;
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $result = $mysqli->query( $sql );
  if( $row = $result->fetch_assoc() ) {
    return $row['newid'];
  }
  else {
    return 0;
  }
}
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
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pid = 64;
$id = get_real_post($pid);
if ($id == 0) {
  die();
}
echo $id;

$sql = "SELECT * FROM `vm_vi_news_comments` WHERE `id`=" . $pid . " ORDER BY `post_time` ASC";
$db = Database::getInstance();
$mysqli = $db->getConnection();
$result = $mysqli->query( $sql );
while( $row = $result->fetch_assoc() ) {
  $cid = $row['cid'];
  $level = $row['level'];
  $content = $row['content'];
  $post_time = $row['post_time'];
  $post_name = $row['post_name'];
  $post_email = $row['post_email'];
  $post_ip = $row['post_ip'];
  $time = date( 'Y-m-d H:i:s', $post_time );

  $levelarr = explode('.', $level);
  $levelsize = sizeof($levelarr);
  if($levelsize == 1 ) {
    $comment_parent = 0;
  }
  if( $levelsize > 1 ) {
    $realpos = $levelsize - 2;
    $realid = intval($levelarr[$realpos]);
    $comment_parent = get_parent($realid);
  }
  $data = array(
    'comment_post_ID' => $id,
    'comment_author' => $post_name,
    'comment_author_email' => $post_email,
    'comment_author_url' => '',
    'comment_content' => $content,
    'comment_type' => '',
    'comment_parent' => $comment_parent,
    'user_id' => 0,
    'comment_author_IP' => $post_ip,
    'comment_date' => $time,
    'comment_approved' => 1,
  );

  $newcid = wp_insert_comment($data);
  $sql2 = "INSERT INTO `vm_comments_match` (`oldid`, `newid`) VALUES ($cid, $newcid)";
  $mysqli->query( $sql2 );
}
  echo '<span style="color: green;"> - Done!</span>';
// }