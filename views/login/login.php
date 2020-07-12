<?php
showView('partials/header.php');
?>

<div class="title">
    <p>Login into your account</p>
</div>

<div class="login-center">
    <div class="login-sub-center">
        <p class="phrase">“Omnes enim Christus, nihil sine Maria.”</p>
        <form action="" method="POST">
            <div class="login">
                <div class="email-password">
                    <label class="password-email-label">E-mail</label>
                    <input name="email" class="input-field" type="email" placeholder="E-mail">
                    <?php if (isset($errors['login'])): ?>
                        <p class="errors">
                            <?= $errors['login']; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="email-password">
                    <label class="password-email-label">Password</label>
                    <input name="password" class="input-field" type="password" placeholder="Password">
                    <?php if (isset($errors['login'])): ?>
                        <p class="errors">
                            <?= $errors['login']; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div>
                    <button class="login-button" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
    <img src="<?= BASE_URL . '/images/background-login.png'?>" alt="" class="background-login">
</div>
</body>
</html>