<?php
// フォームから商品を修正して更新ボタンを押したとき、
// POSTされた商品コード・商品名・商品説明・価格のエラーチェックを行い、
// 正常ならばUPDATE文でレコードを返します。
// 一覧ページから修正リンクが押されたときは、
// GETパラメータに商品コードが付与されてくるので、
// それを元に商品データを変数に格納し、フォームに表示する
  require 'common.php';
  $error = '';
  $pdo = connect();
  if (@$_POST['submit']) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];
    if (!$name) $error .= '商品名がありません。<br>';
    if (!$comment) $error .= '商品説明がありません。<br>';
    if (!$price) $error .= '価格がありません。<br>';
    if (preg_match('/\D/', $price)) $error .= '価格が不正です。<br>';
    if (!$error) {
      $pdo->query("UPDATE goods SET name='$name',comment='$comment',price=$price WHERE code=$code");
      header('Location: index.php');
      exit();
    }
  } else {
    $code = $_GET['code'];
    $st = $pdo->query("SELECT * FROM goods WHERE code=$code");
    $row = $st->fetch();
    $name = $row['name'];
    $comment = $row['comment'];
    $price = $row['price'];
  }
  require 't_edit.php';
?>