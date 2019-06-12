<?php
    $name = htmlspecialchars($_POST['name']);
    $reward = htmlspecialchars($_POST['reward']);


    // データベースに接続
    $dsn = 'mysql:dbname=onepiece;host=127.0.0.1';
    $user = 'root';
    $password='';
    // データベース接続
    $dbh = new PDO($dsn, $user, $password);
    // エラーを画面に出す設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // DBを操作するときの文字コードを設定
    $dbh->query('SET NAMES utf8');
    
    // 1.register.phpから送信されたきた画像をmySQLに保存する
    //送信されてきた画像データを取得する
    $image = file_get_contents($_FILES['image']['tmp_name']);
    // 画像データをmySQLに登録する
    $sql = 'INSERT INTO wanted(image, name, reward) VALUES(:image, :name, :reward)';
    //sqlの準備
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':reward', $reward, PDO::PARAM_INT);
    //実行
    $stmt->execute();
  
    // 2.mySQLに保存したデータを画面に表示
    //テーブルのデータ取得
    $sql = 'SELECT * FROM wanted ORDER BY id DESC LIMIT 1';
    //SQL準備
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);

    //実行
    $stmt->execute();

    //取得した結果を配列に入れる
    $records = array();

    while (true) {
        //1レコード取得
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($record == false) {
            //レコードが存在しない場合、ループ終了
            break;
        } 
        // 配列にレコード追加
        $records[] = $record;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>complete</title>
</head>
<body class="body">
    <img class="wanted" src="img/aaa.png" alt="">
    <?php foreach($records as $record): ?>
        <img class="photo" src="data:image/png;base64,<?= base64_encode($record['image']); ?>">
    <?php endforeach; ?>
    <p class="name"><?= $name ?></p>
    <p class="reward"><?= $reward ?></p>
</body>
</html>