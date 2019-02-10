<?php include 'connexion.php';
session_start();
if (isset($_SESSION["login"])) {
$login = $_SESSION["login"];
$full_name = $_SESSION["fullname"];
$department = $_SESSION["department"];
}
 ?>
 <?php 
						$num = $_GET["num"];
						$obj = $_GET["obj"];
						$dest = $_GET["dest"];
						$date =$_GET["date"];
						$desc =  $_GET["desc"];
						$ref =  $_GET["ref"];
						$from = $_GET["from"];
						$src= $_GET["src"];
$query =mysql_query("INSERT INTO `ficheorderss`(`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`) VALUES ('$num','$obj','BO','$src','$date','$desc','$ref','$from')");
echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=directionprocessed_orders.php">';

  ?>