<?php 
    showView('partials/header.php');
?>

<?php if (isset($message)): ?>
    <div id="hideMe" class="message">
        <p class="message-text"><?= $message ?></p>
    </div>
<?php endif; ?>

    <div class="center">
        <div class="sub-center">
            <table>
                <hr>
                <tr class="table-rows">
                    <td>Portrait</td>
                    <td>Name</td>
                    <td>Nation</td>
                    <td>Birthday</td>
                    <td>Information</td>
                </tr>
                <br>
                <?php foreach ($saints as $saint): ?>
                    <tr class="table-rows-values">
                        <td>
                            <?php if ($saint['status'] == 'public') : ?>
                                <div class="tooltip">
                                    <span class="tooltiptext">Público</span>
                                </div>
                            <?php else : ?>
                                <div class="tooltip-private">
                                    <span class="tooltiptext">Private</span>
                                </div>
                            <?php endif; ?>
                            <a href="">
                                <img class="portrait-edit" src="<?= BASE_URL . '/images/user_uploads/' . $saint['photo'] ?>" alt="">
                            </a>
                        </td>
                        <td><?= h($saint['name']) ?></td>
                        <td><?= h($saint['country']) ?></td>
                        <td><?= h(dateFormat($saint['birthday'])) ?></td>
                        <td>
                            <hr>
                            <div class="info">
                                <p>
                                    <?= h($saint['info']) ?>
                                </p>
                            </div>
                        </td>
                        <?php if (App\Session::get('user')) : ?>
                            <td><a class="edit-delete" href="<?= BASE_URL . '/saints/edit?id=' . $saint['id'] ?>">Edit</a> <hr>
                            <a class="edit-delete" href="<?= BASE_URL . '/saints/delete?id=' . $saint['id'] ?>">Delete</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>