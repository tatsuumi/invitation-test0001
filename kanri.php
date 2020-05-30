<?php
$username = $_POST['username'];
$password = $_POST['password'];
$flag=FALSE;

//pg_connect()に渡すパラメータの指定
session_start();
$constr=$_SESSION['constr']; 
//DBに接続
$conn = pg_connect($constr);

$result = pg_query($conn,"SELECT username,password FROM userdata");

		while ($row = pg_fetch_row($result)) {
            if($row[0]==$username&&$row[1]==$password){$flag=TRUE;}
		}

if($flag){require("kanri.html");}else{require("join.html");}
