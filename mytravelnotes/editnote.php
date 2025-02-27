<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Редактирование заметки</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<?php
require_once("MySiteDB.php");
session_start();
$note_id = $_GET['note'];

// получаем заметку по ID
$query = "SELECT created, title, article FROM notes WHERE id = $note_id";
$select_note = mysqli_query($link, $query);
$note = mysqli_fetch_array($select_note);
?>

<p>Редактировать заметку: </p>
<form method="post">
<input type="text" value = "<?php echo $note['title'] ?>"  name="title" size="20" maxlength="20"/>
<textarea name="article" cols="55" rows="10" maxlength="255"><?php echo $note['article'] ?></textarea>
<input type="hidden" name = "created"
 value ="<?php echo date("Y-m-d");?>"/>
<input type="submit" name="submit" value="Отправить"
/>
</form>

<?php
$title = $_POST['title'];
$created = $_POST['created'];
$article = $_POST['article'];

if (($title)&&($created)&&($article))
{
    //формирование запроса
    $query = "UPDATE notes SET title = '$title', article = '$article' WHERE id = $note_id";
    //реализация запроса
    $result = mysqli_query ($link, $query);
    header( "refresh:0;url=comments.php?note=$note_id" );
}
?>

<button class="button"><a href='index.php'>Назад на главную страницу</a></button>

</body>
</html>
</body>
</html>