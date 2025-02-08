<?php session_start(); require_once("MySiteDB.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Главная страница сайта</title>
</head>

<body>
        <nav>
            <button class="button"><a href='login.php'>Вход</a></button>
            <button class="button"><a href='newnote.php'>Новая заметка</a></button>
            <button class="button"><a href='email.php'>Отправить сообщение</a></button>
            <button class="button">Добавить фото</button>
            <button class="button"><a href='inform.php'>Статистика</a></button>
            <button class="button">Администратору</button>
            <button class="button"><a href='examples.php'>Примеры</a></button>
            <button class="button"><a href='logout.php'>Выход</a></button>
        </nav>

    <main>
        <?php
        echo $_SESSION['login'];
        if ($_SESSION['login'])
            echo "<h2>Рад приветствовать вас, ", $_SESSION['login'], ", на страницах моего сайта, посвященного путешествиям. </h2>";
        else
            echo "<h2>Рад приветствовать вас на страницах моего сайта, посвященного путешествиям. </h2>";

        $query = "SELECT * FROM notes ORDER BY id DESC";
        $select_note = mysqli_query($link, $query);

        while ($note = mysqli_fetch_array($select_note)){
        echo "<div class='note slide'>", "<p class='note-id'>#", $note['id'], "</p>";
        echo "<p class='note-date'>", $note ['created'], "</p>";?>
        <p class="note-title"><a href="comments.php?note=<?php echo $note['id']; ?>">
        <?php
        echo $note ['title'], "<br>";
        ?></a></p><span class="note-article">
        <?php
        echo $note ['article'], "</div>";
        }
        ?></span>
    </main>
</body>
</html>




