<?php

use App\Application\Alerts\Alert;
use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Error;

?>

<!doctype html>
<html class="h-100" lang="<?= Config::get('app.css.lang') ?>">
<head>
    <?php View::component('head'); ?>
    <title><?= $title ?></title>
</head>
<body class="d-flex flex-column h-100">
<?php View::component('nav'); ?>
<main class="main">
    <h2 class="mb-3">Авторизация</h2>
    <form action="/login" method="post">
        <?php if (Alert::success()): ?>
            <div class="alert alert-success" role="alert">
                <?= Alert::success(true) ?>
            </div>
        <?php endif; ?>
        <?php if (Alert::danger()): ?>
            <div class="alert alert-danger" role="alert">
                <?= Alert::danger(true) ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control <?= Error::has('email') ? 'is-invalid' : '' ?>"
                   id="email" aria-describedby="emailHelp">
            <div class="invalid-feedback">
                <?= Error::get('email') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password"
                   class="form-control <?= Error::has('password') ? 'is-invalid' : '' ?>" id="password">
            <div class="invalid-feedback">
                <?= Error::get('password') ?>
            </div>
        </div>
        <div class="mb-3">
            <p>Нет аккаунта? <a href="/register" class="text-decoration-none">Регистрируйся!</a></p>
        </div>
        <button type="submit" class="btn btn-success">Войти</button>
    </form>
</main>

<?php View::component('footer'); ?>
</body>
</html>