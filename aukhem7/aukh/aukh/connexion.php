<?php 
$server = "localhost";
$user = "root";
$pwd = "";
$db = "aukh";
$connect_to_server = mysql_connect($server,$user,$pwd);
$connect_to_db = mysql_select_db($db);

if (!$connect_to_server && !$connect_to_db) echo mysql_error() ; 
?>
