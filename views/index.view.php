<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/saints/public/style.css">
    <title>Saints</title>
</head>
<body>
    <div class="top-center">
    </div>
    
    <div class="line">
        <div class="links-line">
            <a href="">List Saints |</a>
            <a href="">Remove a Saint |</a>
            <a href="">Add a Saint |</a>
            <a href="">Update Saint |</a>
        </div>
    </div>

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
                        <div>
                            <td>
                                <img class="portrait"src="https://www.a12.com/source/files/originals/santa_teresinha_reproducao.jpg" alt="">
                            </td>
                        </div>
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