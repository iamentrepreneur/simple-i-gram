<?php

use App\Application\Config\Config;
use App\Application\Views\View;
?>
<!doctype html>
<html lang="<?= Config::get('app.css.lang')?>">
<head>
    <?php View::component('head'); ?>
    <title>Server Error</title>
</head>
<body>

<main class="main">
    <?php View::component('nav'); ?>
    <div class="container">
        <div class="row mt-5 mb-5">
            <h2 class="text-center">Server error <span class="badge bg-secondary">500</span></h2>
        </div>
    </div>
</main>

</body>
</html>