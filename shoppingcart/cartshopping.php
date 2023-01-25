<?php 
session_start();
$cart = array();
$price_sum = array();
$price_hiku = array();

    try{
        $db = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8','root','');
         $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
         $statement = $db->query("
        SELECT SUM(price) FROM product
         ");
     $result = $statement->fetch();
        
        $statement->execute();
    
    }catch(PDOException $e){
        // echo 'ddd';ok
       exit('エラー:'.$e->getMessage());
       
    }

    if(isset($_SESSION['price_sum'])){
        $price_sum = $_SESSION['price_sum'];
        // var_dump($price_sum);
       
      $price_sum = array_sum($price_sum);
    }


      //セッションを通して得た$numと今回変化させたnumを比較させたい
    //   var_dump($_SESSION['cart']);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $kind = $_POST['kind'];
        $cart = $_SESSION['cart'][$name];
        var_dump($cart);
        if($kind === 'change'){
        //キーの値はここで入れられる
            $num = $_POST['num'];
          $_SESSION['cart'][$name] = $num;

         $price_hiku = $_SESSION['price_sum'];
    
        if(($cart)<$_SESSION['cart'][$name] = $num){
            echo 'aaa';
             $price_sum = intval($price_sum) + intval($price_hiku[$name]);
         }elseif($cart>$_SESSION['cart'][$name] = $num){
            echo 'bbb';
             var_dump(intval($price_sum));
             var_dump(intval($price_hiku[$name]));
             //$nameが持っている値の合計が出てきてしまう、単体で引いてほしいところ
             //shopのvalue自体を引っ張ってこれないか確認
             $price_sum = intval($price_sum) - intval($price_hiku[$name]);
         }
         
        }elseif($kind === 'delete'){
          unset($_SESSION['cart'][$name]);
          unset($_SESSION['price_sum'][$name]);
        }
    
    }


    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }

//price_sumが個数1のときに反応しない






?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショッピングカート</title>
    <style>
        header{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li {
            list-style: none;
            padding: 0 8px 0;
        }
        a{
            text-decoration: none;
        }
        
        nav ul {
            display: flex;
        }

        .wrapper{
            max-width: 90%;
            margin: 0 auto;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        
        <header>
        <p>ショッピングカート</p>
            <nav>
                <ul>
                    <li><a href="shop.php">商品一覧へ</a></li>
                    <li><a href="deleting.php">カートを全て空に</a></li>
                    <li><a href="purchase.php">商品購入へ</a></li>
                </ul>
            </nav>
        </header>
        <table style="text-align:center">
            <tr>
                <th>商品</th>
                <th>個数</th>
                <th>数量</th>
                <th>変更ボタン</th>
                <th>削除ボタン</th>
        </tr>
        <?php foreach($cart as $key => $val):?>
        <tr>         
           <td>
        <?php
        if($key == 'Horizon'){
            echo 'Horizon';
        }elseif($key == 'anchar'){
            echo 'アンチャーテッド';
        }elseif($key == 'wicher'){
            echo 'ウィッチャー';
        }
        
        ?>
           </td>
           <td><?php echo $val ?>個</td>
           <form action="" method="post">
                <td>
                <select name="num">
                <?php for($i=1;$i<10;$i++) :?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php endfor; ?>
          </select>
                </td>
        
                <td>
                <input type="hidden" name="kind" value="change">
                <input type="hidden" name="name" value="<?php echo $key ?>">
                <input type="submit" value="変更">
            </td>
        </form>
        <form action="" method="post">
           <td>
            <input type="hidden" name="kind" value="delete">
            <input type="hidden" name="name" value="<?php echo $key ?>">
            <input type="submit" value="削除">
           </td>
           </form>
        </tr>
        <?php 
   
        ?>
        <?php endforeach; ?>
    </table>
    <h3>
    <?php echo '合計金額'. $price_sum . '円'; ?>
    </h3>
    </div>

</body>
</html>