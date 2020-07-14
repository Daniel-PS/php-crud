<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="<?= BASE_URL ?>/js/main.js"></script>
    <script defer src="<?= BASE_URL ?>/js/jquery.mask.min.js"></script>
    <title>Saints</title>
</head>
<body>
    <div class="top-center">
    </div>
    
    <div class="line">
        <div class="links-line">
        <a href="<?= BASE_URL ?>/saints">Public Saints</a>
        <?php if (App\Session::get('user')) : ?>
            <a href="<?= BASE_URL ?>/saints/show">| List Your Saints</a>
            <a href="<?= BASE_URL ?>/saints/register"> | Add a Saint</a>
        <?php endif; ?>

            <div class="links-login">
                <?php if (! App\Session::get('user')) : ?>
                    <a class="login-register" href="<?= BASE_URL ?>/saints/signup"> Register </a>
                    <a style="cursor: context-menu;"> | </a>
                    <a class="login-register" href="<?= BASE_URL ?>/saints/login"> Login </a>
                <?php else : ?>
                    <a class="login-register" href="<?= BASE_URL ?>/saints/logout"> Deslogar </a>
                <?php endif; ?>
            </div>
        </div>
    </div>