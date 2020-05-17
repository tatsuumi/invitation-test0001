<?php

// ユーザによる中断を無視する
ignore_user_abort(true);
// タイムアウトしないようにする
set_time_limit(500);


session_start();

        $time =$_SESSION['time'];
        $name =$_SESSION['name'];
        $furigana =$_SESSION['furigana'];
        $email =$_SESSION['email'];
        $relation =$_SESSION['relation'];
        $attendance =$_SESSION['attendance'];
        $message =$_SESSION['message'];
        $nijikai =$_SESSION['nijikai'];
        $canteat =$_SESSION['canteat'];

        // confirm.html 読み込み
         require("complete.html");


	$dsn = 'mysql:dbname=join;host=localhost';
	$user = 'testuser1';
        $password = 'tatsu227'; //パスワードはダブルコーテーション
        $flag=true;
        //postgresデータ追加
        $conn="host=ec2-35-171-31-33.compute-1.amazonaws.com port=5432 dbname=d9canmf389vsq5 user=ceoecrklypftbt password=f68e1b403c34f2de22faabb1090e1d13005192acd1edaa6b22ce243120c0cc32";
        $link = pg_connect($conn);
/*
        $sql = "SELECT * FROM people";
        $result = pg_query($link, "SELECT * FROM people");

        for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
                $rows = pg_fetch_array($result, NULL, PGSQL_ASSOC);
                          if($rows['name']==$name){$flag=false;
                        }
        }
        $close_flag = pg_close($link);
*/
        if($flag){
        $sql = "INSERT INTO people (time,name,furigana,email,relation,attendance,message,nijikai,canteat) 
        VALUES ('$time','$name','$furigana','$email','$relation','$attendance','$message','$nijikai','$canteat')";}
        Else{$sql = "UPDATE people SET time='$time' , furigana='$furigana' , email='$email' ,
         relation='$relation' , attendance ='$attendance' message='message' Where name = $name";}
        $result_flag = pg_query($sql);
        $close_flag = pg_close($link);

if($attendance=="出席"&&!empty($email)){
// If you are using Composer
require 'vendor/autoload.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("wedding_info@example.com", "wedding_info");
$email->setSubject("11月22日結婚式[達海&七海]のご案内");
$email->addTo($_SESSION['email'], "出席者様");
$email->addContent("text/plain", $name." さま

11月22日結婚式[達海&七海]のご案内

この度はご参加いただきありがとうございます。
詳細は下記の通りとなります。

日時
2020年11月 22日（日曜日）
受　付　午後2時
挙　式　午後3時
披露宴　午後4時

場所
葛西臨海公園（展望広場）
https://goo.gl/maps/GRCMBcBdiqrLBUWi7
江戸川区臨海町六丁目２
TEL 0120-981-5678

以上、みなさまのご参加を心よりお待ちしております。");
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}  


require 'vendor/autoload.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("wedding_info@example.com", "wedding_info");
$email->setSubject($name."さま　出席");
$email->addTo("tatsuumi227@gmail.com", "出席者様");
$email->addContent("text/plain",$message);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}  
}


/* //ローカルDB入力
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


    $_SESSION = array();
    session_destroy();