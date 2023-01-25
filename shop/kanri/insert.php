<?php
//商品を追加するページ,
//一覧ページから新規追加リンクを押されたときにinsert.phpが呼ばれる
  require 'common.php';
  //フォームで使う変数を初期化
// $errorはエラー文字列、$nameは商品名、$commentは商品説明、
// $priceは商品価格になります。
$error = $name = $comment = $price = '';
  $pdo = connect();
  if (@$_POST['submit']) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];
    if (!$name) $error .= '商品名がありません。<br>';
    if (!$comment) $error .= '商品説明がありません。<br>';
    if (!$price) $error .= '価格がありません。<br>';
    //正規表現の\Dは数値以外の文字にマッチ
    if (preg_match('/\D/', $price)) $error .= '価格が不正です。<br>';
    if (!$error) {
        //POST文字列をそのままセットするのは危険だが、
// 店用の管理画面のためそのまま使用
      $pdo->query("INSERT INTO goods(name,comment,price) VALUES('$name','$comment',$price)");
      header('Location: index.php');
      exit();
    }
  }
  require 't_insert.php';
?>