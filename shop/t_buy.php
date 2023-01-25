<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入 | Noodle Shop</title>
    <link rel="stylesheet" href="shop.css">
</head>
<body>
<h1>購入</h1>
<div class="base">
    <?php 
    //入力エラーがある場合、この行で出力
    if($error) {echo '<span class=\"error\">$error</span>'; }?>
        <form action="buy.php" method="post">
            <p> お名前<br>
        <input type="text" name="name" value="<?php echo $name ?>"></p>
        <p>
        ご住所<br>
        <input type="text" name="address" size="60" value="<?php 
        echo $address ?>"></p>
        <p>
        電話番号<br>
        <input type="text" name="tel" value="<?php echo $tel ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="購入">
        </p>
        </form>    
</div>
<div class="base">
    <a href="index.php">お買い物に戻る</a>
    <a href="cart.php">カートに戻る</a>
</div>
</body>
</html>