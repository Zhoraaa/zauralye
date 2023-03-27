<?php
include("../pageBase.php");
?>

<div class="content">
    <form action="signUpDB.php" method="post" class="ctrl-e" id="reg-form">
        <h2>Регистрация</h2>
        <div class="inp-box"><input class="inp-auth" type="text" name="surname" id="surname" placeholder="Фамилия" wrequired></div>
        <div class="inp-box"><input class="inp-auth" type="text" name="name" id="name" placeholder="Имя" wrequired></div>
        <div class="inp-box"><input class="inp-auth" type="text" name="patronymic" id="patronymic" placeholder="Отчество (если есть)"></div>
        <div class="inp-box"><input class="inp-auth" type="text" name="login" id="login" placeholder="Логин" wrequired></div>
        <div class="inp-box"><input class="inp-auth" type="text" name="email" id="email" placeholder="Почта" wrequired></div>
        <div class="inp-box"><input class="inp-auth" type="number" name="phone" id="phone" placeholder="Телефон"></div>
        <div class="inp-box"><input class="inp-auth" type="password" name="pass" id="pass" placeholder="Пароль" wrequired></div>
        <div class="inp-box"><input class="inp-auth" type="password" name="passRep" id="passRep" placeholder="Повтор пароля" wrequired></div>
        <button type="submit" class="sign-btn">Зарегистрироваться</button>
        <div><a class="mini-text" href="signIn.php">Вход</a></div>
        <div id="err-mes" class="bold"><?= $_SESSION['result'] ?></div>
    </form>
</div>

<script>
    let pass = document.getElementById("pass");
    let passRep = document.getElementById("passRep");
    let form = document.getElementById("reg-form");
    let echoError = document.getElementById("err-mes");


    form.addEventListener("submit", function(event) {
        if (pass.value != passRep.value) {
            event.preventDefault();
            echoError.innerText = "Пароли не совпадают";
        }
    })
</script>

<?php
$_SESSION['result'] = null;
?>