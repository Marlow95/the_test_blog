<?php
require_once(__DIR__ . "/reusables/header.php");

$delete_user_id = $_GET['delete_user_id'];
$delete_comment_id = $_GET['delete_comment_id'];
$user_filter = filter_var($delete_user_id, FILTER_SANITIZE_NUMBER_INT);
$comment_filter = filter_var($delete_comment_id, FILTER_SANITIZE_NUMBER_INT);
deleteSelectedBlogPost($comment_filter, $user_filter);
header('Location: posts_dashboard.php');
exit;