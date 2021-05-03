<?php
include 'includes/logincheck.php';
$con;
$user;

$user['id'];

$_POST['post_title'];
$_POST['post_content'];

$results = $con->query("insert into `posts` (user_id, post_title, post_content) values ()");

if($results) {
    // posts.php
}
?>