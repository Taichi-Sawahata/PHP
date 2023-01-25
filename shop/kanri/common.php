<?php 
function connect(){
    return new PDO('mysql:host=localhost;dbname=shop;chrset=utf8','root','');
}

function img_tag($code){
    if(file_exists("../images/$code.jpg")){
        $name = $code;
    }else{
        $name = 'noimage';
        return '<img src="../images/' .$name. '.jpg" alt="">';
    }
}
//ECサイト本体のshop/common.phpと似ていますが、違いが2つあります。
// ひとつは管理ページではセッションを使わないのでsession_start関数は
// 呼び出していないこと、
// もうひとつは、img_tag関数の指定している画像のパスが違うことです。
?>