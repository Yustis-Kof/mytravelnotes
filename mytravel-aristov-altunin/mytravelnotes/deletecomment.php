<?php
session_start();
require_once("MySiteDB.php");
$comment_id = $_GET['comment'];
$query = "DELETE FROM comments WHERE id = $comment_id";
mysqli_query($link, $query);
header("Location: ".$_SERVER['HTTP_REFERER']);
?>