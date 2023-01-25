<?php
/* goodsテーブルから全ての商品レコードを読み出して、配列$goodsに格納し、デザイン部分である、
t_index.phpを読み込む*/
require 'common.php';
$pdo = connect();
$st = $pdo->query("SELECT * FROM goods");
//全ての行を取得する
$goods = $st->fetchAll();
require 't_index.php';
?>