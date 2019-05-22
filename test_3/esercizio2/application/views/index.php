<?php
/**
 * Created by PhpStorm.
 * User: giulio.bosco
 * Date: 15.05.2019
 * Time: 09:43
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>esercizio 2</title>
</head>
<body>
<div>
    <?php var_dump($pd); ?>
    <table>
        <?php for ($i = -1; $i < count($matrix); $i++): ?>
            <tr>
            <?php if ($i == -1): ?>

                <?php for ($j = 0; $j < count($alpha); $j++): ?>
                    <th><?php echo $alpha[$j]; ?></th>
                <?php endfor; ?>

            <?php else: ?>

                <?php for ($j = 0; $j <= count($matrix[$i]); $j++) : ?>
                    <?php if ($j == count($matrix[$i])): ?>
                        <td><?php echo $i; ?></td>
                    <?php else: ?>
                        <td><?php echo $matrix[$i][$j]; ?></td>
                    <?php endif; ?>
                <?php endfor; ?>

            <?php endif; ?>
            </tr>
        <?php endfor; ?>
    </table>
</div>

<div>
    <form action="<?php echo URL . "home/index";?>" method="post">
        <h4>Generazione di numeri</h4>
        <p>Cella</p>
        <input type="text" name="cella" required>
        <p>Valore</p>
        <input type="number" name="valore" required>
        <p>&nbsp;</p>
        <input type="submit">
    </form>
</div>
</body>
</html>
