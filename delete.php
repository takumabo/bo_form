<?php
require_once('function.php');
require_once('dbconnect.php');

$id = $_POST['id'];
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$content = $_POST['content'];

$stmt = $dbh->prepare('DELETE FROM `surveys` WHERE id=?');
$stmt->execute(["$id"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>削除確認画面</title>
    <link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>
    <div class="top">
        <h2>削除確認画面</h2>
    </div>

    <dir>
        <h3 style="color:red;">以下の項目を削除しました</h3>
    </dir>

    <table  width="800" >
            <tr>
                <th bgcolor="#EE0000"><font color="#FFFFFF">名前</font></th>
                <th bgcolor="#EE0000" width="400"><font color="#FFFFFF">メールアドレス</font></th>
                <th bgcolor="#EE0000" width="200"><font color="#FFFFFF">内容</font></th>
            </tr>
    </table>
    <table  width="800" border-collapse: collapse>
    <tr>
                <td bgcolor="#99CC00"><p><?php echo $nickname ?></p></td>
                <td bgcolor="#FFFFFF" width="400"><p><?php echo $email ?></p></td>
                <td bgcolor="#FFFFFF"  width="200"><p><?php echo $content ?></p></td>
    </tr>
    </table>

    <div style="margin-top:10px;">
        <input id="btn" type="submit" onclick="location.href='http://localhost/php_contact_form/search.php'" value="検索画面へ戻る">
        <input id="btn" type="submit" onclick="location.href='http://localhost/php_contact_form/index.html'" value="お問い合わせ画面へ戻る">
    </div>

</body>
</html>
