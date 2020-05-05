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
        $sql = "INSERT INTO people (time,name,furigana,email,relation,attendance,message) 
        VALUES ('$time','$name','$furigana','$email','$relation','$attendance','$message')";}
        Else{$sql = "UPDATE people SET time='$time' , furigana='$furigana' , email='$email' ,
         relation='$relation' , attendance ='$attendance' message='message' Where name = $name";}
        $result_flag = pg_query($sql);
        $close_flag = pg_close($link);

/* 
// If you are using Composer
require 'vendor/autoload.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "送信者A");
$email->setSubject("TestMail漢字");
$email->addTo($_SESSION['email'], "受信者B");
$email->addContent("text/plain", "日本語 English");
$sendgrid = new \SendGrid(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);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
*/

/*
$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "Example User");
$email->setSubject("11月22日結婚式[達海&七海]のご案内");
$email->addTo($_SESSION['email'], "Example User");
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

以上、みなさまのご参加を心よりお待ちしています。");
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
*/



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

 // confirm.html 読み込み
 require("complete.html");

    $_SESSION = array();
    session_destroy();