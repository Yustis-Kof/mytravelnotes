<?php require_once("MySiteDB.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Вход</title>
</head>
<body>

<div class="container">

    <div class="add-new-note">
        <form method="post">
            <input placeholder="Имя пользователя" type="text" name="name" size="10" maxlength="10"/>
            <input placeholder="Пароль" type="password" name="password" size="10" maxlength="10"/>  
            <input type="submit" name="submit" value="Войти" class="button"/>
        </form>
    </div></div>

    <button class="button"><a href='index.php'>Назад на главную страницу</a></button>
<?php

//получение данных из формы
$name = $_POST['name'];
$password = $_POST['password'];

if (($name)&&($password))
{
    $query = "SELECT * FROM authors WHERE login = '$name' AND password = '$password'";
    $send_query = mysqli_query($link, $query);
    $user_array = mysqli_fetch_array($send_query);
    $name = $user_array['login'];
    $rights = $user_array['rights'];
    $user_id = $user_array['id'];
    $count = mysqli_num_rows($send_query);
    if ($count > 0)
    {
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['login'] = $name;
        $_SESSION['rights'] = $rights;
        header( "refresh:0;url = index.php" );
    }
    else
    {
        echo "Вы не зарегистрированы.";
    }

}
?>
</body>
</html>