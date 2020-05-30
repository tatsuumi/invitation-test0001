<?php
session_start();
$user = 'aspaxqsxuivosj';
$host = 'ec2-52-0-155-79.compute-1.amazonaws.com';
$dbname= 'dfsgi85ac0e0ld'; 
$password = 'd2f1cb0ed93f85059fe391019101a9904934907825fb19cc06fdc8261acddf6e';
$constr = "
host=".$host.
" port=5432 
dbname=".$dbname.
" user=".$user.
" password=".$user."";

$_SESSION['constr']=$constr; 

require("join.html");