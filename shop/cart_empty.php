<?php 
require 'common.php';
$_SESSION['cart'] = null;
header('Location: cart.php');
//カート画面のカートを空にするリンクから呼ばれている
// $_SESSION['cart']にnullを入れる事によって、
// カートのセッションデータをすべて消しています
?>