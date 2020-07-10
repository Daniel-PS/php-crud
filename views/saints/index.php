<?php 
    showView('partials/header.php');
?>
    <div class="center">
        <div class="sub-center">
            <table>
                <hr>
                <tr class="table-rows">
                    <td>Portrait</td>
                    <td>Name</td>
                    <td>Nation</td>
                    <td style="padding: 0 40px 0 40px;">Birthday</td>
                    <td>Information</td>
                </tr>
                <?php foreach ($saints as $saint): ?>
                    <tr class="table-rows-values">
                        <td>
                            <a href="">
                                <img class="portrait" src="https://www.a12.com/source/files/originals/santa_teresinha_reproducao.jpg" alt="">
                            </a>
                        </td>
                        <td><?= $saint['name'] ?></td>
                        <td><?= $saint['country'] ?></td>
                        <td style="padding: 0 20px 0 20px;"><?= $saint['birthday'] ?></td>
                        <td>
                            <hr>
                                <div class="info">
                                    <p><?= $saint['info'] ?>
                                </p>
                            </div>
                            <hr>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>