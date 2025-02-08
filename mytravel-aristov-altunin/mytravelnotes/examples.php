<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Примеры</title>
</head>
<body>

<h1>Задания:</h1>

<div class="container">
    <?php
    echo "Первое задание:";
    ?>

    <div class="example">
        <br>
        <?php
        $a = 10;
        $b = 20;
        $c = $a + $b;
        $l = " ";
        echo $a, $l, $b, $l, $c;
        ?>
        <br>
    </div>

    <?php
    echo "Второе задание:";
    ?>

    <div class="example">
        <br>
        <?php
        $a = 10;
        $b = 20;
        $c = ($a + $b) * 3;
        echo $c;
        ?>
        <br>
    </div>

    <?php
    echo "Третье задание:";
    ?>

    <div class="example">
        <br>
        <?php
        $a = 10;
        $b = 20;
        $c = $a + $b;
        $h = $c / ($b - $a);
        echo $h;
        ?>
        <br>
    </div>

    <?php
    echo "Четвёртое задание:";
    ?>

    <div class="example">
        <br>
        <?php
        $b = " работает";
        $p = "Программа";
        echo $p, $b;
        ?>
        <br>
    </div>

    <?php
    echo "Пятое задание:";
    ?>

    <div class="example">
        <br>
        <?php
        $b = " работает";
        $p = "Программа";
        $result = "$p $b";
        echo $result;
        ?>
        <br>
    </div>

    <?php
    echo "Шестое задание:";
    ?>

    <div class="example">
        <br>
        <?php
        $result .= " хорошо.";
        echo $result;
        ?>
        <br>
    </div>
</div>

<button class="button"><a href='index.php'>Назад на главную страницу</a></button>

<footer class="footer">
            <p>&copy; 2024 MY TRAVEL. Все права защищены.</p>
        </footer>

</body>
</html>
