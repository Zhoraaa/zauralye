<?php
include('pageBase.php');
?>
<div class="content">
    <div class="acc ctrl-r">
        <?php
        if (!isset($_COOKIE['user'])) :
        ?>
            <a class="mini-text" href="../user/signUp.php">Регистрация</a>
            <a class="mini-text" href="../user/signIn.php">Вход</a>
        <?php else : ?>
            <a class="mini-text" href="../user/logOut.php">Выход</a>
        <?php endif; ?>
    </div>
</div>