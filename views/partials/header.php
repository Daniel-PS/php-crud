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
            <a href="<?= BASE_URL ?>/saints">List Saints |</a>
            <a href="<?= BASE_URL ?>/saints/register">Add a Saint |</a>
            <a href="<?= BASE_URL ?>/saints/edit?id=1">Update Saint</a>

            <div class="links-login">
                <a class="login-register" href="<?= BASE_URL ?>/saints/register"> Register </a>
                <a style="cursor: context-menu;"> | </a>
                <a class="login-register" href="<?= BASE_URL ?>/saints/login"> Login </a>
            </div>
        </div>
    </div>