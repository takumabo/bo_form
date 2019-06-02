<?php

    //関数の呼び出し
    require_once('function.php');
    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
    //DB(dbconnect.php)との接続
    require_once('dbconnect.php');
    $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUES(?, ?, ?)');
    $stmt->execute([$nickname , $email , $content]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>送信完了</title>
    <link rel="stylesheet" type="text/css" href="search.css">
</head>

<body>
    <div class="top">
        <h2>お問い合わせ内容完了顔面</h2>
    </div>
    <h3>お問い合わせありがとうございました。</h3>
    <p><?php echo $nickname ?></p>
    <p><?php echo $email ?></p>
    <p><?php echo $content ?></p>


    <div style="margin-top:10px;">
        <input id="btn" type="submit" onclick="location.href='http://localhost/php_contact_form/index.html'" value="お問い合わせ画面へ戻る">
        <input id="btn" type="submit" onclick="location.href='http://localhost/php_contact_form/search.php'" value="検索画面へ戻る">
    </div>
</body>
</html>