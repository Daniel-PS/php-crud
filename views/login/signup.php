<?php
showView('partials/header.php');
?>

<div class="title">
    <p>Register a account</p>
</div>

<?php if (isset($message)): ?>
    <div id="hideMe" class="message">
        <p class="message-text"><?= $message ?></p>
    </div>
<?php endif; ?>

<div class="login-center">
    <div class="login-sub-center">
        <p class="phrase">“Omnes enim Christus, nihil sine Maria.”</p>
        <form action="" method="POST">
            <div class="login">
                <div class="email-password">
                    <label class="password-email-label">Name</label>
                    <input value="<?= old('name')?>"  name="name" class="input-field" type="text" placeholder="E-mail">
                    <?php if (isset($errors['name'])): ?>
                        <p class="errors">
                            <?= $errors['name']; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="email-password">
                    <label class="password-email-label">E-mail</label>
                    <input value="<?= old('email')?>" name="email" class="input-field" type="email" placeholder="E-mail">
                    <?php if (isset($errors['email'])): ?>
                        <p class="errors">
                            <?= $errors['email']; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="email-password">
                    <label class="password-email-label">Password</label>
                    <input  name="password" class="input-field" type="password" placeholder="Password">
                    <?php if (isset($errors['password'])): ?>
                        <p class="errors">
                            <?= $errors['password']; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="email-password">
                    <label class="password-email-label">Confirm Password</label>
                    <input name="confirm_password" class="input-field" type="password" placeholder="Password">
                    <?php if (isset($errors['confirm_password'])): ?>
                        <p class="errors">
                            <?= $errors['confirm_password']; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div>
                    <button class="login-button" type="submit">Sign-Up</button>
                </div>
            </div>
        </form>
    </div>
    <img src="<?= BASE_URL . '/images/background-signup.png'?>" alt="" class="background-signup">
</div>
</body>
</html>