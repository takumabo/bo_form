<?php

    //関数の呼び出し
    require_once('function.php');
    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>送信完了</title>
</head>

<body>
    <h1>お問い合わせありがとうございました。</h1>
    <p><?php echo $nickname ?></p>
    <p><?php echo $email ?></p>
    <p><?php echo $content ?></p>
</body>
</html>