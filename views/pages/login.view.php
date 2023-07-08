<?php
use App\Application\Config\Config;
use App\Application\Views\View;
?>

<!doctype html>
<html lang="<?=Config::get('app.css.lang')?>">
<head>
    <?php View::component('head');?>
    <title><?=$title?></title>
</head>
<body>
<main class="main">
    <?php View::component('nav');?>
    <h2 class="mb-3">Авторизация</h2>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <p>Нет аккаунта? <a href="/register" class="text-decoration-none">Регистрируйся!</a></p>
        </div>
        <a href="/login" class="btn btn-success">Войти</a>
    </form>
</main>

</body>
</html>