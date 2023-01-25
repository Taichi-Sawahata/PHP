<?php
//画像リンクが押されたときに、upload.phpが呼ばれる
//フォームから画像を選択してアップロードしたときに実行される。
//隠しフィールドからレコードを取得し、move_upload_file関数で
//$imagesフォルダにアップロードされた画像をコピーします。

//一覧ページから画像リンクを押されたときに実行される部分,
//GETパラメータに付加された商品コード変数に入れています。
  require 'common.php';
  $error = '';
  if (@$_POST['submit']) {
    $code = $_POST['code'];
    if (move_uploaded_file($_FILES['pic']['tmp_name'], "../images/$code.jpg")) {
      header('Location: index.php');
      exit();
    } else {
      $error .= 'ファイルを選択してください。<br>';
    }
  } else {
    //
    $code = $_GET['code'];
  }
  require 't_upload.php';
?>