<?php

$id = $_POST['id'];

//pg_connect()に渡すパラメータの指定
session_start();
$constr=$_SESSION['constr']; 
//DBに接続//DBに接続
$conn = pg_connect($constr);
//SQLの実行
//削除idを削除
$result = pg_query($conn, "DELETE  FROM people where id=$id");
pg_close($conn); 

require("kanri_all.php");