<?php
showView('partials/header.php');
?>

    <div class="title">
        <p>Registering a Saint</p>
    </div>

    <div class="creation-center">
        <div class="sub-creation-center">
            <form class="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-portrait">
                    <label class="input-portrait-label">Portrait</label>
                    <div class="portrait-preview">
                        <img id="img" src="#" alt="" class="portrait-preview-img">
                    </div>
                    <label for="imageFile" class="image-upload">Upload</label>
                    <input type="file" name="photo" id="imageFile">
                    <?php if (isset($errors['photo'])): ?>
                        <p class="errors">
                            <?= $errors['photo']; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-inputs">
                    <label class="input-label">Name</label>
                    <input class="input-field" class="input-field" type="text" name="name" placeholder="Type Saint's name">
                    <?php if (isset($errors['name'])): ?>
                        <p class="errors">
                            <?= $errors['name']; ?>
                        </p>
                    <?php endif; ?>

                    <label class="input-label">Nation</label>
                    <input class="input-field" type="text" name="country" placeholder="Type Nation">
                    <?php if (isset($errors['country'])): ?>
                        <p class="errors">
                            <?= $errors['country']; ?>
                        </p>
                    <?php endif; ?>

                    <label class="input-label">Birthday</label>
                    <input class="input-field" type="text" name="birthday" placeholder="Birthday">
                    <?php if (isset($errors['birthday'])): ?>
                        <p class="errors">
                            <?= $errors['birthday']; ?>
                        </p>
                    <?php endif; ?>

                    <label class="input-label">Information</label>
                    <textarea class="input-field" name="info" rows="10" maxlength="500" cols="30" placeholder="Information about the Saint"></textarea>
                    <?php if (isset($errors['info'])): ?>
                        <p class="errors">
                            <?= $errors['info']; ?>
                        </p>
                    <?php endif; ?>

                    <button class="input-button" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>