<?php
$username = $_POST['username'];
$password = $_POST['password'];
$flag=FALSE;

//pg_connect()に渡すパラメータの指定
$constr =  "host=ec2-35-171-31-33.compute-1.amazonaws.com port=5432 dbname=d9canmf389vsq5 user=ceoecrklypftbt password=f68e1b403c34f2de22faabb1090e1d13005192acd1edaa6b22ce243120c0cc32";
//DBに接続
$conn = pg_connect($constr);

$result = pg_query($conn, "SELECT username,password FROM userdata");

		while ($row = pg_fetch_row($result)) {
            if($row[0]==$username&&$row[1]==$password){$flag=TRUE;}
		}

if($flag){require("kanri.html");}else{require("join.html");}
