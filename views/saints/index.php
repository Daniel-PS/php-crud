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
        <?php if ($saintsPaginator->getTotalCount() === 0): ?>
            <h2>Nothing to show.</h2>
        <?php else: ?>
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
                <?php foreach ($saintsPaginator->getItems() as $saint): ?>
                    <tr class="table-rows-values">
                        <td>
                        <div class="tooltip">
                            <span class="tooltiptext">Public</span>
                        </div>
                        <a href="">
                            <img class="portrait-edit" src="<?= BASE_URL ?>/images/user_uploads/<?= $saint['photo'] ?>" alt="">
                        </a>
                        </td>
                        <td>
                            <?= h($saint['name']) ?>
                        <?php if ($user_id == $saint['user_id']) : ?>
                            <p class="poster_name"><?= "• $user_name" ?></p>
                        <?php endif; ?>
                        </td>
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
                        <?php if ($user_id == $saint['user_id']) : ?>
                            <td><a class="edit-delete" href="<?= BASE_URL . '/saints/edit?id=' . $saint['id'] ?>">Edit</a> <hr>
                            <a class="edit-delete" href="<?= BASE_URL . '/saints/delete?id=' . $saint['id'] ?>">Delete</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <td><a class="page" href="<?= BASE_URL . '/saints' ?>"><?= h('<<') ?> First</a></td>
                    <td><a class="page" href="<?= BASE_URL . '/saints?page=' . ($page - 1) ?>"><?= h('<') ?> Previous</a></td>
                <?php endif ?>
                <?php if ($page < $saintsPaginator->getLastPage()): ?>
                    <td><a class="page" href="<?= BASE_URL . '/saints?page=' . ($page + 1) ?>">Next <?= h('>') ?></a></td>
                    <td><a class="page" href="<?= BASE_URL . '/saints?page=' . $saintsPaginator->getLastPage() ?>">Last <?= h('>>') ?></a></td>
                <?php endif ?>
            </div>
        
        <?php endif; ?>
    </div>
</div>

</body>
</html>