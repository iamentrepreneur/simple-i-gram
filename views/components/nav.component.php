<?php
use App\Application\Auth\Auth;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">iGram</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Лента</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Профиль</a>
                </li>
            </ul>
            <?php if(!Auth::check()):?>
                <form class="d-flex" action="/login" method="post">
                    <a href="/login" class="btn btn-outline-success" >Войти</a>
                </form>
            <?php else:?>
                <form class="d-flex" action="/logout" method="post">
                    <button type="submit" class="btn btn-outline-danger" >Выйти</button>
                </form>
            <?php endif;?>
        </div>
    </div>
</nav>