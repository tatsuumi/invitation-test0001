<?php
session_start();

        $time =$_SESSION['time'];
        $name =$_SESSION['name'];
        $furigana =$_SESSION['furigana'];
        $email =$_SESSION['email'];
        $relation =$_SESSION['relation'];
        $attendance =$_SESSION['attendance'];
        $message =$_SESSION['message'];

	$dsn = 'mysql:dbname=join;host=localhost';
	$user = 'testuser1';
	$password = 'tatsu227'; //パスワードはダブルコーテーション

try{
$dbh = new PDO($dsn, $user, $password);
if (!$dbh) {
die('接続失敗です。'.mysql_error());
}

// (1)SQLを作成
$sql = "INSERT INTO people (time,name,furigana,email,relation,attendance,message) 
VALUES ('$time','$name','$furigana','$email','$relation','$attendance','$message')";

// (2)SQL実行（データ登録）
$res = $dbh->query($sql);
// $dbhにはデータベースのハンドラ(PDOインスタンス)が入っている

} catch(PDOException $e) {
	echo $e->getMessage();
	die();
}

// 接続を閉じる
$dbh = null;

 // confirm.html 読み込み
 require("complete.html");

    $_SESSION = array();
    session_destroy();