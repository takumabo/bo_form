<?php
//メソッドがGETの時はトップページにリダイレクト(このページに送りつける)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      header('Location: index.html');
}

//関数の呼び出し
require_once('function.php');
// スーパーグローバル関数
$nickname = h($_POST['nickname']);
$email = h($_POST['email']);
$content = h($_POST['content']);

if ($nickname == ''){
    $nickname_result = 'ニックネームが入力されていません。';
} else {
    $nickname_result = 'ようこそ' . $nickname . '様';
}

if($email == ''){
    $email_result = 'メールアドレスが入力されていません。';
} else {
    $email_result = 'メールアドレス:' . $email ;
}

if($content == ''){
    $content_result = 'お問い合わせ内容が入力されていません。';
} else {
    $content_result = 'お問い合わせ内容:' . $content ;
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>入力内容確認</title>
</head>

<body>
    <h1>入力内容確認</h1>
    <p><?php echo $nickname_result ?></p>
    <p><?php echo $email_result ?></p>
    <p><?php echo $content_result ?></p>
    <form method="POST" action="thanks.php">
        <input type="hidden" name="nickname" value="<?php echo $nickname ?>">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="content" value="<?php echo $content ?>">
        <input type="button" value="戻る" onclick="history.back()">
        <?php if($email != '' && $nickname != '' && $content != ''):?> 
        <input type="submit" value="OK">
        <?php endif; ?>
    </form>
</body>
</html>