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
                <img src="<?= BASE_URL . '/images/user_uploads/' . h($saint->getPhoto()) ?? old('photo') ?>" id="img" src="#" alt="" class="portrait-preview-img">
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
            <input class="input-field" class="input-field" type="text" name="name" value="<?= old('name') ?? h($saint->getName()) ?>">
            <?php if (isset($errors['name'])): ?>
                <p class="errors">
                    <?= $errors['name']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Nation</label>
            <input class="input-field" type="text" name="country"value="<?= old('nation') ?? h($saint->getCountry()) ?>">
            <?php if (isset($errors['country'])): ?>
                <p class="errors">
                    <?= $errors['country']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Birthday</label>
            <input data-mask="00/00/0000" class="input-field" type="text" name="birthday" value="<?= old('birthday') ?? dateFormat(h($saint->getBirthday())) ?>">
            <?php if (isset($errors['birthday'])): ?>
                <p class="errors">
                    <?= $errors['birthday']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Information</label>
            <textarea class="input-field" name="info" rows="10" maxlength="500" cols="30">
                <?= old('info') ?? h($saint->getInfo()) ?>
            </textarea>
            <?php if (isset($errors['info'])): ?>
                <p class="errors">
                    <?= $errors['info']; ?>
                </p>
            <?php endif; ?>

            <label class="input-label">Status</label>
                    <select class="input-field" name="status">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                    <?php if (isset($errors['status'])): ?>
                        <p class="errors">
                            <?= $errors['status']; ?>
                        </p>
                    <?php endif; ?>

            <button class="input-button" type="submit">Submit</button>
        </div>
    </form>
    </div>
</div>
</body>
</html>