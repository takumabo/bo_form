<?php

//DBに接続
$host = "localhost";  //MySQLがインストールされているコンピュータ。住所みたいなもん。
$dbname = "contact_form" ;//使用するDB名
$charset = "utf8mb4";
$user = "root"; //MySQLにログインするユーザー名
$password = ""; //ユーザーのパスワード

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //SQLでエラーが表示された場合、画面にエラーが出力される
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //DBから取得したデータを連想配列の形式で取得する
    PDO::ATTR_EMULATE_PREPARES   => false,
    //SQLインジェクション対策(送信ボタンをおすと同時にウイルスなど不正を防ぐもの)
];

//DBへの接続設定
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try {
    //DBへ接続
    $dbh = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
