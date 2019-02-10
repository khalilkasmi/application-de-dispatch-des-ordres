<?php include 'connexion.php';
session_start();
if (isset($_SESSION["login"])) {
$login = $_SESSION["login"];
$full_name = $_SESSION["fullname"];
$department = $_SESSION["department"];

}
 ?>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET') {
						$num = $_GET["num"];
						$obj = $_GET["obj"];
						$dest = $_GET["dest"];
						$date =$_GET["date"];
						$desc =  $_GET["desc"];
						$ref =  $_GET["ref"];
						$from = $_GET["from"];
						$src= $_GET["src"];
$query =mysql_query("INSERT INTO `ficheorderss`(`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`) VALUES ('$num','$obj','SECT.D','$src','$date','$desc','$ref','$department')");
$body_of_mail = "L'ordre numero $num avec la reference : $ref \n a été bien traité est validé";
$receivers_email_id="khalilkasmi1997@gmail.com";
$subject="ordre traité";
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <aukh-server@local.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($receivers_email_id, $subject, $body_of_mail,$headers);
//echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=processed_orders_dep.php">';
}
  ?>