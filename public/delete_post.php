<?php
require_once(__DIR__ . "/reusables/header.php");

$delete_user_id = $_GET['delete_user_id'];
$delete_post_id = $_GET['delete_post_id'];
$user_filter = filter_var($delete_user_id, FILTER_SANITIZE_NUMBER_INT);
$post_filter = filter_var($delete_post_id, FILTER_SANITIZE_NUMBER_INT);
deleteSelectedBlogPost($post_filter, $user_filter);
header('Location: posts_dashboard.php');
exit;