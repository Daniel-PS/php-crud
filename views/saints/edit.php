<?php 
    showView('partials/header.php');
?>

<div class="title">
    <p>Updating a Saint</p>
</div>

<div class="edit-center">
    <div class="sub-edit-center">
    <form class="form" method="POST" action="" enctype="multipart/form-data">
        <div class="form-portrait">
            <label class="input-portrait-label">Portrait</label>
            <div class="portrait-preview">
                <img src="<?= BASE_URL . '/images/user_uploads/' . $saint[0]['photo'] ?>" id="img" src="#" alt="" class="portrait-preview-img">
            </div>
            <label for="imageFile" class="image-upload">Upload</label>
            <input type="file" name="edited_photo" id="imageFile">
            <?php if (isset($errors['photo'])): ?>
                <p class="errors">
                    <?= $errors['photo']; ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="form-inputs">
            <label class="input-label">Name</label>
            <input class="input-field" class="input-field" type="text" name="edited_name" value="<?= $saint[0]['name'] ?>">
            <?php if (isset($errors['name'])): ?>
                <p class="errors">
                    <?= $errors['name']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Nation</label>
            <input class="input-field" type="text" name="edited_country"value="<?= $saint[0]['country'] ?>">
            <?php if (isset($errors['country'])): ?>
                <p class="errors">
                    <?= $errors['country']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Birthday</label>
            <input class="input-field" type="text" name="edited_birthday" value="<?= $saint[0]['birthday'] ?>">
            <?php if (isset($errors['birthday'])): ?>
                <p class="errors">
                    <?= $errors['birthday']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Information</label>
            <textarea class="input-field" name="edited_info" rows="10" maxlength="500" cols="30">
                <?= $saint[0]['info'] ?>
            </textarea>
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