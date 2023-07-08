<?php

use App\Application\Alerts\Alert;
use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Error;
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
    <h2 class="mb-3">Регистрация</h2>
    <form action="/register" method="post">
        <?php if(Alert::danger()):?>
        <div class="alert alert-danger" role="alert">
            <?= Alert::danger(true)?>
        </div>
        <?php endif;?>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control <?=Error::has('name') ? 'is-invalid' : ''?>" id="name" aria-describedby="emailHelp">
            <div class="invalid-feedback">
                <?= Error::get('name')?>
            </div>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Фамилия</label>
            <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control <?=Error::has('email') ? 'is-invalid' : ''?>" id="email" aria-describedby="emailHelp">
            <div class="invalid-feedback">
                <?= Error::get('email')?>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control <?=Error::has('password') ? 'is-invalid' : ''?>" id="password">
            <div class="invalid-feedback">
                <?= Error::get('password')?>
            </div>
        </div>
        <div class="mb-3">
            <label for="passwordConfirm" class="form-label">Подтверждение пароля</label>
            <input type="password" name="passwordConfirm" class="form-control  <?=Error::has('password') ? 'is-invalid' : ''?>" id="passwordConfirm">
        </div>
        <div class="mb-3">
            <p>Уже есть аккаунта? <a href="/login" class="text-decoration-none">Авторизуйся!</a></p>
        </div>
        <button href="/register" class="btn btn-success" type="submit">Далее</button>
    </form>
</main>

</body>
</html>