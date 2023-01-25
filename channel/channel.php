<?php
$message_array = array();
$escaped = array();
//データベース接続 
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=channel;charset=UTF8','root','');
    //SQL作成
    //My SQLのnow関数、現在日時を取得
    $statement = $pdo->prepare("INSERT INTO channel_table (username,comment,postdate) VALUES (:username,:comment,now()) ");
   
    //送信して受け取ったデータは$_POSTの中に自動的に入る
    //投稿データがある時だけ、ログを表示
    if(isset($_POST['submitButton'])){
//表示名の入力チェック
//連想配列、キーusernameを初期化して、要素の追加
//エスケープ処理
if(isset($_POST['username'])){
    $escaped['username'] = htmlspecialchars($_POST['username'],ENT_QUOTES,"UTF-8");
}
//コメントの入力チェック
if(isset($_POST['comment'])){
    $escaped['comment'] = htmlspecialchars($_POST['comment'],ENT_QUOTES,"UTF-8");
}
    }
 
//bindParamメソッドでプレースホルダにエスケープ処理した値を代入
    //値をセット
    $statement->bindParam(':username',$escaped["username"],PDO::PARAM_STR);
    $statement->bindParam(':comment',$escaped["comment"],PDO::PARAM_STR);

    //SQLクエリの実行
    $statement->execute();
 }catch (PDOException $e){
    $e->getMessage();
 }

 //DBからコメントデータを取得する
 //プレースホルダの指定せずに、SQLを実行
 $sql = "SELECT username,comment,postdate FROM channel_table ORDER BY postdate ASC";
  $message_array = $pdo->query($sql);
// var_dump($message_array);
//   //DB接続を閉じる
// $pdo = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="channel.css">
</head>
<body>
    <h1 class="title">掲示板</h1>
    <hr>
    <div class="boardWrapper">
        <section>
            <?php  foreach ($message_array as $value): ?>
            <article>
                <div class="wrapper">
                    <div class="nameArea">
                        <span>名前:</span>
            <p class="username"><?php  echo $value['username'];?></p>
            <time>:<?php  echo $value['postdate'];?></time>
                    </div>
            <p class="comment"><?php  echo $value['comment']; ?></p>
                </div>
            </article>
            <?php  endforeach; ?>
        </section>
        <form action="" method="post" class="formwrapper">
            <div>
                <input type="submit" value="書き込む" name="submitButton">
                <label for="usernameLabel">名前:</label>
                <input type="text" name="username">
            </div>
            <div>
                <textarea name="comment" class="commentTextArea"></textarea>
            </div>
        </form>

    </div>

</body>
</html>