<?php
require_once("MySiteDB.php");
$note_id = $_GET['note'];
$query = "DELETE FROM notes WHERE id = $note_id";
mysqli_query($link, $query);
header( "refresh:0;url = index.php" );
?>