<?php

$id = $_POST['id'];

//pg_connect()に渡すパラメータの指定
$constr = "
host=ec2-52-0-155-79.compute-1.amazonaws.com 
port=5432 
dbname=dfsgi85ac0e0ld 
user=aspaxqsxuivosj
password=d2f1cb0ed93f85059fe391019101a9904934907825fb19cc06fdc8261acddf6e";
//DBに接続//DBに接続
$conn = pg_connect($constr);
//SQLの実行
//削除idを削除
$result = pg_query($conn, "DELETE  FROM people where id=$id");
pg_close($conn); 

require("kanri_all.php");