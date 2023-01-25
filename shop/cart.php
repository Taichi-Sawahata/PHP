<?php 

require 'common.php';
$row = array();
$sum = 0;
$pdo = connect();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    if($_POST['submit']){
        $_SESSION['cart'][$_POST['code']] += $_POST['num'];
    }
    foreach($_SESSION['cart'] as $code => $num){
        $st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
        $st->execute(array($code));
        $row = $st->fetch();
        $st->closeCursor();
        $row['num'] = strip_tags($sum);
        $sum += $num * $row['price'];
        $rows[] = $row;
        }
        require 't_cart.php';
}

/*
$row = array();
カートに入れた商品データを格納する。
商品レコードの各カラムの値と数量が入る

$sum = 0;
$sumにカートの合計金額が入る

if(!isset($_SESSION['cart'])){
$_SESSION['cart'] = array();}
カート用のセッションを用意しています。$_SESSION['cart]要素に配列として、キーが商品コードで値が数量のカート情報が入ります。例えば、商品コード2の商品を4個カートに入れた場合は、$_SESSION['cart'][2]に4が入ります。



$_SESSION['cart'][$_POST['code']] += $_POST['num'];
戦闘に@は動かなかった場合のみ、つける。
$_SESSION['cart'][商品コード]に、その商品の数量を入れています。+=を使っているので、すでに商品の数量が入っていれば、それに足されます。


foreach($_SESSION['cart'] as $code => $num){
}

カートに入っている商品の数だけループを行います。
その際に現在ループ中の商品コードが$code、商品数量が$numに入ります

$st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
$st->execute(array($code));
対象の商品レコードに対応する、商品レコードを取得しています。POSTパラメータは改竄される可能性があるので、prepare文とexecute文を使って安全にSQL文を発行している。

$st->closeCursor();
closeCursor文は、再びSQL文を発行できるように
サーバーへの接続を解放します。これを行わないと環境によってはエラーが起きる場合がある。

$sum += $num * $row['price'];
商品の価格と数量を掛けたものを合計に加えている

$rows[] = $row;
商品データの入った配列を$rows配列に追加している
*/


?>
