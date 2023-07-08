<?php

use App\Application\Config\Config;
use App\Application\Views\View;
?>
<!doctype html>
<html lang="<?= Config::get('app.css.lang')?>">
<head>
    <?php View::component('head'); ?>
    <title>404 Error</title>
</head>
<body>

<main class="main">
    <?php View::component('nav'); ?>
    <div class="container">
        <div class="row mt-5 mb-5">
            <h2 class="text-center">Error code <span class="badge bg-secondary">404</span></h2>
        </div>
    </div>
</main>

</body>
</html>