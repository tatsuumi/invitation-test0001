<?php

session_start();
date_default_timezone_set('Asia/Tokyo');
$_SESSION['time'] = date("Y/m/d H:i:s");
$_SESSION['name'] = $_POST['name'];
$_SESSION['furigana'] = $_POST['furigana'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['relation'] = $_POST['relation'];
$_SESSION['attendance'] = $_POST['attendance'];
$_SESSION['message'] = $_POST['message'];

    $time = date("Y/m/d H:i:s");
    $name = $_POST['name'];
    $furigana = $_POST['furigana'];
    $email = $_POST['email'];
    $relation = $_POST['relation'];
    $attendance = $_POST['attendance'];
    $message = $_POST['message'];

 // confirm.html 読み込み
 require("confirm.html");