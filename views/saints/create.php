<?php
showView('partials/header.php');
?>

    <div class="title">
        <p>Registering a Saint</p>
    </div>

    <div class="creation-center">
        <div class="sub-creation-center">
            <form class="form" method="POST" action="">
                <div class="form-portrait">
                    <label>
                        <img class="form-portrait" src="https://www.romancatholicman.com/wp-content/uploads/2019/04/StBernadette1.jpg" alt="">
                        <input type="file" name="photo" id="">
                    </label>
                    
                </div>

                <div class="form-inputs">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Type Saint's name">
                    <label>Nation</label>
                    <input type="text" name="country" placeholder="Type Nation">
                    <label>Birthday</label>

                    <input type="text" name="birthday" placeholder="Birthday">
                    <?php if (isset($errors['birthday'])): ?>
                        <p class="errors">
                            <?= $errors['birthday']; ?>
                        </p>
                    <?php endif; ?>

                    <label>Information</label>
                    <input type="text" name="info" placeholder="Information about the Saint">

                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>