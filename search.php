<?php

    require_once('function.php');
    require_once('dbconnect.php');

// ニックネーム検索ができるようにする
$all = '';
if (isset($_GET['all'])) {
    $all = $_GET['all'];
}
    $stmt = $dbh->prepare('SELECT * FROM surveys WHERE CONCAT(nickname,email,content) LIKE ?');
    $stmt->execute(["%$all%"]);
    $results = $stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>
    <div class="top">
        <h2>検索画面</h2>
    </div>

    <div class="kensaku">
    <form action="search.php" method="GET">
        <input id="aaa" type="text" name="all">
        <input id="btn" type="submit" value="検索">
        <p>※キーワードを入力してください</p>
        <input id="btn" type="submit" onclick="location.href='http://localhost/php_contact_form/search.php'" value="再検索する">
    </form>
    </div>

        <table  width="800" >
            <tr>
                <th bgcolor="#EE0000"><font color="#FFFFFF">名前</font></th>
                <th bgcolor="#EE0000" width="400"><font color="#FFFFFF">メールアドレス</font></th>
                <th bgcolor="#EE0000" width="200"><font color="#FFFFFF">内容</font></th>
                <th bgcolor="#EE0000" width="50"><font color="#FFFFFF">削除項目</font></th>
            </tr>
        </table>
    <?php foreach ($results as $result):?>
        <table  width="800" border-collapse: collapse>
            <tr>
                <td bgcolor="#99CC00"><p ><?php echo h($result['nickname']) ?></p></td>
                <td bgcolor="#FFFFFF" width="400"><p><?php echo h($result['email']) ?></p></td>
                <td bgcolor="#FFFFFF"  width="200"><p><?php echo h($result['content']) ?></p></td>
              <form action="delete.php" method="POST">
                <td bgcolor="#FFFFFF"  width="50"><p><input type="submit" name="dltbtn" value="削除"></p></td>
                <input type="hidden" name="id" value="<?php echo $result['id']?>">
                <input type="hidden" name="nickname" value="<?php echo $result['nickname']?>">
                <input type="hidden" name="email" value="<?php echo $result['email']?>">
                <input type="hidden" name="content" value="<?php echo $result['content']?>">
              </form>
            </tr>
        </table>

        <?php endforeach; ?>
        <div style="margin-top:30px;">
        <input id="btn" type="submit" onclick="location.href='http://localhost/php_contact_form/index.html'" value="お問い合わせ画面へ戻る">
        </div>
        <!-- なぜこの画面で,最初から全ての値がHTML上に現れているか？
        理由は、HTML上で$results分のわかる範囲まで出力されているから
        そして、検索ボタンを押すと、if文からネームが一致した分だけ情報が出力されることになる。
        つまり、検索ではなく「選択」である。 -->
</body>
</html>
