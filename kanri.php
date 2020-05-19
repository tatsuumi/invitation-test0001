<?php
$username = $_POST['username'];
$password = $_POST['password'];
$flag=FALSE;

//pg_connect()に渡すパラメータの指定
$constr =  "host=ec2-35-171-31-33.compute-1.amazonaws.com port=5432 dbname=d9canmf389vsq5 user=ceoecrklypftbt password=f68e1b403c34f2de22faabb1090e1d13005192acd1edaa6b22ce243120c0cc32";
//DBに接続
$conn = pg_connect($constr);

$result = pg_query($conn, "SELECT  FROM userdata");

for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
    $rows = pg_fetch_array($result, NULL, PGSQL_ASSOC);
    if($row['username']==$usrname&&$row['password']==$password){$flag=TRUE;}
    echo $row['username'].$username;
    echo row['password'].$password;
}

/*if($flag){require("kanri.html");}else{require("join.html");}*/
