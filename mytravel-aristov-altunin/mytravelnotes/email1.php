<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из форм
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Проверка заполнения всех полей
    if (empty($subject) || empty($message)) {
        echo "<p>Пожалуйста, заполните все поля.</p>";
    } else {
        // Устанавливаем адрес получателя
        $to = "test@localhost"; // Локальный адрес для тестирования

        // Устанавливаем заголовки письма
        $headers = "From: webmaster@example.com\r\n";
        $headers .= "Reply-To: webmaster@example.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Отправляем email
        if (mail($to, $subject, $message, $headers)) {
            echo "<p>Сообщение успешно отправлено</p>";
        } else {
            echo "<p>Ошибка при отправке сообщения!</p>";
        }
    }
} else {
    echo "<p>Неверный метод запроса!</p>";
}
if (empty($subject) || empty($message)) {
    echo "<p>Пожалуйста, заполните все поля!</p>";
} else {
    // Отправка email
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отправка Email</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <p class="status-message"><?php echo isset($status) ? $status : ''; ?></p>
        <button><a href="email.php">Вернуться на страницу отправки</a></button>
        <button><a href="index.php">Вернуться на главную страницу</a></button>
    </div>

</body>
</html>
