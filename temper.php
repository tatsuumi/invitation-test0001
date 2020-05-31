<?php
//pg_connect()に渡すパラメータの指定
session_start();
$constr=$_SESSION['constr']; 
//DBに接続
$conn = pg_connect($constr);

$result = pg_query($conn,"SELECT time,temper FROM temper");

		while ($row = pg_fetch_row($result)) {
            $time_data=$row[0];
            $temper_data=$row[1];
		}
$str1 = explode(" ", $time_data); 
$str2 = explode(":", $str1[1]); 
$time=$str2[0].':'.$str2[1];
require('temper1.html');