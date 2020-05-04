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
        $flag=true;
        //postgresデータ追加
        $conn = "host=ec2-34-195-169-25.compute-1.amazonaws.com dbname=d7v30lqsd1nu6g user=vupprickmnebwc password=8497d96c15036bf8ce3d851645d7b75c84bb42d3590660d78a07f201792c4063";
        $link = pg_connect($conn);
        
        $sql = "SELECT COUNT AS cnt FROM people";
        $result_flag = pg_query($sql);

        if(cnt==0){
        $sql = "INSERT INTO people (time,name,furigana,email,relation,attendance,message) 
        VALUES ('$time','$name','$furigana','$email','$relation','$attendance','$message')";}
        Else{$sql = "UPDATE people SET time='$time' , furigana='$furigana' , email='$email' ,
         relation='$relation' , attendance ='$attendance' message='message' Where name = $name";}
        $result_flag = pg_query($sql);
        $close_flag = pg_close($link);
        
/*//ローカルDB入力
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
*/

 // confirm.html 読み込み
 require("complete.html");

    $_SESSION = array();
    session_destroy();