<?php

use App\Application\Alerts\Alert;
use App\Application\Auth\Auth;
use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Error;

$user = Auth::user();
?>

<!doctype html>
<html class="h-100" lang="<?= Config::get('app.css.lang') ?>">
<head>
    <?php View::component('head'); ?>
    <title><?= $title ?> - <?= $label ?></title>
</head>
<body class="d-flex flex-column h-100">
<?php View::component('nav'); ?>
<main class="main">
    <h2 class="mb-3"><?= $title ?></h2>
    <div class="row">
        <div class="col-auto">
            <img class="profile__avatar" src="/assets/img/avatar_default.png" alt="Аватарка">
        </div>
        <div class="col-auto">
            <div class="profile__info">
                <h5 class="profile__info--name"><?=$user->getLastname();?>&nbsp;<?=$user->getName();?></h5>
                <p class="profile__info--email"><?=$user->getEmail();?></p>
                <p class="profile__info--registered">Дата регисрации:&nbsp;<?=$user->getCreatedAt();?></p>
            </div>
        </div>
    </div>
    <hr>
    <h5>Опубликовать</h5>
    <form action="/publish" method="post" enctype="multipart/form-data">
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
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">Изображенте</label>
            <input class="form-control <?= Error::has('image') ? 'is-invalid' : '' ?>" type="file" name="image" id="image">
            <div class="invalid-feedback">
                <?= Error::get('image') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control <?= Error::has('description') ? 'is-invalid' : '' ?>" id="description" name="description" rows="3"></textarea>
            <div class="invalid-feedback">
                <?= Error::get('description') ?>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success mb-3">Опубликовать</button>
        </div>
    </form>
    <hr>
    <h5>Мои публикации</h5>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
        <div class="col">
            <div class="card">
                <img src="/assets/img/empty.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some description...</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="/assets/img/empty.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some description...</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="/assets/img/empty.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some description...</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="/assets/img/empty.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some description...</p>
                </div>
            </div>
        </div>
    </div>

</main>

<?php View::component('footer'); ?>
</body>
</html>