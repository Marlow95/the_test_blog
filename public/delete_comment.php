<?php
require_once(__DIR__ . "/reusables/header.php");

$delete_comment_user_id = $_GET['delete_comment_user_id'];
$delete_comment_id= $_GET['delete_comment_id'];
$comment_user_filter = filter_var($delete_comment_user_id, FILTER_SANITIZE_NUMBER_INT);
$comment_filter = filter_var($delete_comment_id, FILTER_SANITIZE_NUMBER_INT);
deleteSelectedComment($comment_filter, $comment_user_filter);
header('Location: comments_dashboard.php');
exit;