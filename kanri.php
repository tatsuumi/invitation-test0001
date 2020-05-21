<?php
$username = $_POST['username'];
$password = $_POST['password'];
$flag=FALSE;

//pg_connect()に渡すパラメータの指定
$constr =  "
host=ec2-52-0-155-79.compute-1.amazonaws.com 
port=5432 
dbname=dfsgi85ac0e0ld 
user=aspaxqsxuivosj
password=d2f1cb0ed93f85059fe391019101a9904934907825fb19cc06fdc8261acddf6e";
//DBに接続
$conn = pg_connect($constr);

$result = pg_query($conn,"SELECT username,password FROM userdata");

		while ($row = pg_fetch_row($result)) {
            if($row[0]==$username&&$row[1]==$password){$flag=TRUE;}
		}

if($flag){require("kanri.html");}else{require("join.html");}
