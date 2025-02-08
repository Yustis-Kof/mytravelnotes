<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Новая заметка</title>
</head>
<body>

<div class="container">

    <div class="add-new-note">
        <p>Добавить новую заметку: </p>
        <form method="post">
            <input placeholder="Заголовок" type="text" name="title" size="20" maxlength="20"/>
            <textarea placeholder="Текст заметки" name="article" cols="55" rows="10" maxlength="255"></textarea>
            <input type="hidden" name="created" value="<?php echo date("Y-m-d");?>"/>
            <input type="submit" name="submit" value="Отправить" class="button"/>
        </form>
    </div></div>

    <button class="button"><a href='index.php'>Назад на главную страницу</a></button>



</body>
</html>

<?php
//подключение к серверу

require_once ("MySiteDB.php");

//получение данных из формы
$title = $_POST['title'];
$created = $_POST['created'];
$article = $_POST['article'];

if (($title)&&($created)&&($article))
{

//формирование запроса
$query = "INSERT INTO notes (id, title, created, article)
VALUES (NULL, '$title', '$created', '$article')";
//реализация запроса
$result = mysqli_query ($link, $query);

}
?>
</body>
</html>