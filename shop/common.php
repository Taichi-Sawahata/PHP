<?php 
/*connect関数はデータベースshopに接続する。
接続部分を関数にしておくと、接続方式が変わっても、この部分のみ変更すればいいので便利


img_tag関数は商品画像を表示するタグの文字列を生成して返す。
商品画像をimagesフォルダに<商品コード>.jpg、
商品コードが2ならば、2.jpgの名前で置く仕様にする。
$codeで商品コードを受け取る。*/
session_start();

function connect() {
    return new PDO("mysql:host=localhost;dbname=shop;charset=utf8", "root","");
}

function img_tag($code){
    if(file_exists("images/$code.jpg")){
        $name = $code;
    }else{
        $name = 'noimage';
    }
    return '<img src="images/'. $name . '.jpg" alt="">';
}

?>