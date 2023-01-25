<?php 
require 'common.php';
$pdo = connect();
$st = $pdo->query("SELECT * FROM goods");
$goods = $st->fetchAll();
require 't_index.php';
//商品レコードを全て取得して配列$goodsに格納
?>