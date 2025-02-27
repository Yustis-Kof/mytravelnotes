<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отправить Email</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Отправить Email</h1>
        <p>Заполните форму ниже, чтобы отправить сообщение</p>
        <form action="email1.php" method="post">
            <div class="form-group">
                <label for="subject">Тема сообщения:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Текст сообщения:</label><br>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
            <button type="submit">Отправить</button>
            </div>
        </form>
        <button><a href="index.php">Вернуться на главную страницу</a></button>
    </div>
</body>
</html>