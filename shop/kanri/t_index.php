<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" href="kanri.css">
</head>
<body>
    <table>
        <!--$goodsに格納された商品データを
        ループで取り出してテーブルに表示-->

        <?php foreach ($goods as $g) {?>
            <tr>
                <td>
                    <?php echo img_tag($g['code']) ?>
                </td>
                <td>
                    <p class="goods"><?php echo $g['name'] ?></p>
                    <p><?php echo nl2br($g['connect']) ?></p>
            </td>
            <td width="80">
               <p><?php echo $g['price'] ?>円</p>
               <!--商品修正ページのリンク、
               GETパラメータとして商品コードを渡している,-->
               <p><a href="edit.php?code=<?php echo $g['code']?>">修正</a></p>
               <!--商品画像アップロードページヘのリンク
               GETパラメータとして商品コードを渡している-->
               <p><a href="upload.php?code=<?php echo $g['code']?>">画像</a></p>
               <!--商品削除ページへのリンク
                GETパラメータで商品コードを渡している-->
               <p><a href="delete.php?code=<?php echo $g['code']?>"
            onclick="return confirm('削除してよろしいですか？')">削除</a></p>
            </td>
            </tr>
            <?php }?>
    </table>
    <div class="base">
        <a href="insert.php"></a>
        <!--jsで確認メッセージを出し、okの場合のみ削除リンクへ　飛ぶ
別ウィンドウでECサイトのトップページを開く-->
        <a href="../index.php" target="_blank">サイト確認</a>
    </div>
</body>
</html>