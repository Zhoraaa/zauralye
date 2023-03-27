<?php
include("../pageBase.php");
?>

<div class="content">
    <form action="signInDB.php" method="post" class="ctrl-e" id="reg-form">
        <div class="inp-box"><input class="inp-auth" type="text" name="login" placeholder="Логин / Телефон / Email"></div>
        <div class="inp-box"><input class="inp-auth" type="password" name="pass" placeholder="Пароль"></div>
        <button type="submit" class="sign-btn">Вход</button>
        <div><a class="mini-text" href="signUp.php">Регистрация</a></div>
        <div id="err-mes" class="bold"><?= $_SESSION['result'] ?></div>
    </form>
</div>

<?php
$_SESSION['result'] = null;
?>