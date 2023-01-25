<!DOCTYPE html>
<!-- cart.phpでセットされた$rows配列をループで取り出して、
表示している-->
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート | Noodle Shop</title>
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <h1>カート</h1>
    <table>
    <tr><th>商品名</th><th>単価</th><th>数量</th><th>小計</th></tr>
    <?php foreach ($rows as $r) {?>
        <tr>
            <td><?php echo $r['name'] ?></td>
            <td><?php echo $r['price'] ?></td>
            <td><?php echo $r['num'] ?></td>
            <td><?php echo $r['price'] * $r['num']?>円</td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan='2'></td><td><strong>合計</strong></td>
            <td><?php echo $sum ?>円</td>
        </tr>
    </table>
    <div class="base">
        <a href="index.php">お買い物に戻る</a>
        <a href="cart_empty.php">カートを空にする</a>
        <a href="buy.php">購入する</a>
    </div>
</body>
</html>