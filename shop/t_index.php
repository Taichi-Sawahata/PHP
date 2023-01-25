<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noodle Shop</title>
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <h1>Noodle Shop</h1>
    <table>
        <!--index.phpで用意された全商品のレコードが入った配列$goodsを
        ループで回して商品画像・商品名・商品説明・価格を表示しています。
        商品画像はcommon.phpで定義された
        img_tag関数により商品コードからタグを生成している 

                このフォームが商品数分作られる。
        これはカートへ商品を送る部分で、
        プルダウンメニューにより商品数量がPOSTパラメータ
        「num」、隠しフィールドにより商品コードがPOST
        パラメータ「code」に入ってcart.phpに送られる
    
    -->
        <?php foreach ($goods as $g) {?>
            <tr>
                <td>
                    <p class="goods"><?php echo $g['name'] ?></p>
                    <p><?php echo nl2br($g['comment']) ?></p>
                </td>
                <td width="80">
                    <p><?php echo $g['price'] ?>円</p>
                    <form action="cart.php" method="post">
                        <select name="num">
                            <?php 
                            for($i=0;$i<=9;$i++){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="code" value="<?php echo $g['code'] ?>">
                        <input type="submit" name="submit" value="カートへ">
                    </form>
                </td>
            </tr>
            <?php } ?>
    </table>
</body>
</html>