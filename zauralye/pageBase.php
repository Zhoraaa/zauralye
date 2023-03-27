<?php
$con = mysqli_connect("localhost", "root", "", "zauralye");
session_start();

if (isset($_COOKIE['user'])) {
    $query = "SELECT * FROM users WHERE id=" . $_COOKIE['user'];
    $res = $con->query($query);
    $user = mysqli_fetch_assoc($res);
    // print_r($user);
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туры зауралья</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/fonts.css">
    <link rel="shortcut icon" href="../img/img0.png">
</head>

<body>
    <header>
        <div class="name">
            <img src="../img/img0.png" alt="Герб Башкортостана" class="h-img">
            <span class="h-txt ctrl-e bold">Туроператор ЗАУРАЛЬЯ</span>
            <?php
            if ($user['role'] == 2 || $user['role'] == 3) {
                echo "Админ-панель";
            }
            ?>
        </div>
        <nav class="h-btns">
            <a href="/"><button class="h-btn">Главная</button></a>
            <?php
            $res = $con->query("SELECT * FROM `navigation`");
            while ($nav = mysqli_fetch_assoc($res)) {
            ?>
                <a href="../<?= $nav['link'] ?>"><button class="h-btn"><?= $nav['name'] ?></button></a>
            <?php
            }
            ?>
        </nav>
    </header>