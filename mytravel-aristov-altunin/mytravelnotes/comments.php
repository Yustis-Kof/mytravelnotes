<?php session_start(); require_once("MySiteDB.php"); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Заметка</title>
</head>
<body>
<button class="button"><a href='index.php'>Назад на главную страницу</a></button>
<br>
<div class="notes-container">

<?php
require_once("MySiteDB.php");

$note_id = $_GET['note'];

// получаем заметку по ID
$query = "SELECT id, created, title, article FROM notes WHERE id = $note_id";
$select_note = mysqli_query($link, $query);

// проверяем, существует ли заметка
if ($note = mysqli_fetch_array($select_note)) {
    echo "<div class='note'>", "<p class='note-id'>#", $note['id'], "</p>";
    echo "<p class='note-date'>", $note ['created'], "</p>";

    ?>
    <p class="note-title">
    <?php
    if ($_SESSION['rights'] == 'a'){
        echo "<a href='editnote.php?note=$note_id'><button title='Редактировать' class='note-edit'><img src='images/pencil.svg' class='button-image'></button></a>";
        echo "<a href='deletenote.php?note=$note_id'><button title='Удалить' class='note-delete'><img src='images/paper.svg' class='button-image'></button></a>";
    }
    echo $note ['title'], "<br></p><span class='note-article'>";
    echo nl2br($note ['article']), "</div></span>";
    } else {
    echo "Заметка не найдена.";
}

// получаем комментарии по ID заметки
$query_comments = "SELECT comments.id, authors.id AS author_id, login, rights, created, comment FROM comments, authors WHERE art_id = $note_id AND author_id = authors.id";
$select_comment = mysqli_query($link, $query_comments);

// проверяем количество комментариев
if (mysqli_num_rows($select_comment) > 0) {
    // если есть комментарии, выводим их
    while ($comment = mysqli_fetch_array($select_comment)) {
        echo "<div class='comment-container'>";

        echo "<div class='comment'><div class='comment-header'><p class='comment-author-", $comment['rights'], "'>", $comment['login'], "</p>";

        echo "<div class='comment-date'>", $comment['created'], "</div></div>";
        // Раньше здесь был мат
        echo $comment['comment'], "</div>";
        if ($_SESSION['rights'] == 'a' || $_SESSION['user_id'] == $comment['author_id']){
		    echo "<a class='hidden-button' href='deletecomment.php?comment=", $comment['id'], "'><button class='note-delete outer-button'>Удалить</button></a>";
        }
        echo "</div>";
    }
} else {
    // если комментариев нет, выводим сообщение
    echo "<p>Эту запись еще никто не комментировал.</p>";
}
$text = $_POST['text'];
$created = $_POST['created'];
if ($text&&$created)
{

    //формирование запроса
    $user_id = $_SESSION["user_id"];
    $query = "INSERT INTO comments (id, created, comment, art_id, author_id, author, text)
    VALUES (NULL, '$created', '$text', $note_id, $user_id, 'Акакий Ленинович', '$text')";
    //реализация запроса
    $result = mysqli_query ($link, $query);
    header( "refresh:0" );

}
if($_SESSION['rights']){ ?>

<div class='comment'>
    Ваш комментарий...
    <form method="post">
        <textarea placeholder="Текст комментария" name="text" cols="50" rows="5" maxlength="255"></textarea>
        <input type="hidden" name="created" value="<?php echo date("Y-m-d");?>"/>
        <input type="submit" name="submit" value="Отправить" class="button"/>
    </form>
</div>

</body>
</html>
<?php } ?>