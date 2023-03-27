<?php

// Подключение БД и сессии
include('../pageBase.php');
$_SESSION['result'] = "Регистрация прошла успешно";

// Запись в переменные для последующего SQL-запроса
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'] ? "'" . $_POST['patronymic'] . "'" : "NULL";
$login = $_POST['login'];
$email = $_POST['email'];
$phone = $_POST['phone'] ? "'" . $_POST['phone'] . "'" : "NULL";
$pass = ($_POST['pass'] == $_POST['passRep']) ? $_POST['pass'] : false;


// Защита от дурака, отключившего JS
if (!$surname) {
    $_SESSION['result'] = "Введите фамилию (только кириллица)";
} elseif (!$name) {
    $_SESSION['result'] = "Введите имя (только кириллица)";
} elseif (!$login) {
    $_SESSION['result'] = "Введите логин (от 6 до 32 символов, латиница и цифры)";
} elseif (!$email) {
    $_SESSION['result'] = "Введите почту";
} elseif (!$pass) {
    $_SESSION['result'] = "Пароли не совпадают";
} elseif ($login && $email && $phone) {

    // Проверка длинны логина, пароля 
    if (strlen($login) < 6 && strlen($login) > 32) {
        $_SESSION['result'] = "Некорректный логин (от 6 до 32 символов)";
    } elseif (strlen($pass) < 6 && strlen($pass) > 32) {
        $_SESSION['result'] = "Некорректный пароль (от 6 до 32 символов)";
    } else {

        // Проверка логина, почты и телефона на уникальность
        $res = $con->query("SELECT * FROM users");
        $check = mysqli_fetch_assoc($res);

        if ($check['login'] == $login) {
            $_SESSION['result'] = "Логин уже используется";
        } elseif ($check['email'] == $email) {
            $_SESSION['result'] = "Почта уже используется";
        } elseif (strlen($phone) < 13 && $phone != "NULL") {
            $_SESSION['result'] = "Телефон введён не    корректно (11 цифр)";
        } elseif ($check['phone'] == substr($phone, 1, 11) && $phone != "NULL") {
            $_SESSION['result'] = "Телефон уже используется";
        } else {
            // Добавление пользователя. Всегда есть хотябы один админ.
            $query = "SELECT * FROM `users` WHERE role = 1";
            $res = $con->query($query);

            $role = (!empty($check == mysqli_fetch_all($res))) ? 3 : 1;

            $query = "INSERT INTO `users` 
        (`id`, `surname`, `name`, `patronymic`, `login`, `email`, `phone`, `password`, `about`, `role`) 
        VALUES 
        (NULL, '$surname', '$name', $patronymic, '$login', '$email', $phone, '$pass', NULL, '$role')";
            echo $query."<br>";
            $res = $con->query(($query));

            // Автоматический вход в аккаунт после регистрации
            $query = "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$pass';";
            echo $query;
            $res = $con->query($query);
            $user = mysqli_fetch_assoc($res);

            setcookie("user", $account['id'], time() + 3600 * 24, "/");

            $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $user['name'] . "!";
            header("Location: ../index.php");
        }
    }
}
header("location: signUp.php");
?>

<div class="content">
    <p><?= $_SESSION['result'] ?></p>
    <p><?= $query ?></p>
    <p><?= strlen($phone) ?></p>
</div>