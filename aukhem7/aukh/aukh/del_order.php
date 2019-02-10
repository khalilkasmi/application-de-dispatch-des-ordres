<?php include 'connexion.php'; 

session_start();
if (isset($_SESSION["login"])) {
$login = $_SESSION["login"];
$full_name = $_SESSION["fullname"];
$department = $_SESSION["department"];
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title><?php  echo "$department | $full_name "; ?> | supprimer order</title>
</head>
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
		background-color: #e0e0e0;
	}
	#card{
		margin: 0 auto;
		width: 35%;
		margin-top : 8%;
		text-align: center;
padding: 5%;
			}
			@media (max-width: 768px){
	table{
		overflow-x: auto;
		display: block;

	}
	#card{
width: 100% !important;	}
}
</style>
<body>
<div id="card" class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="mdl-card__menu">
    <?php echo "<a href='BO_space.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
    </button>
  </div>
<form method="POST">
 <h2 class="mdl-card__title-text" style="font-size:30px;font-weight:bold;text-align: center">Spprimer order</h2><br>
	<label >reference : </label>
	<select name="ref" class="mdl-textfield__input"  readonly >
	<?php 
	$get_order_list = mysql_query("SELECT `reference` FROM `order`");
	if ($get_order_list) {
		while ($order_list = mysql_fetch_assoc($get_order_list)) {
			foreach ($order_list as $order) {
				echo '<option value="'.$order.'">'.$order.'</option>';
			}
		}			
	}
	$reference = $_POST["ref"];
	$delete_query = "DELETE FROM `order`  WHERE `reference` = '$reference'";
	if (!mysql_query($delete_query)) {
			echo mysql_error();	
		}	else{
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=BO_space.php?login='.$login.'">';
		}
	 ?>
	 </select><br>
 <input type="submit" value="supprimer" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
 </form>
 </div>
 <script src='nprogress/nprogress.js'></script>
<link rel='stylesheet' href='nprogress/nprogress.css'/>
<script>
NProgress.configure({ showSpinner: false });
NProgress.start();
setInterval(function(){NProgress.done();},1000)
</script>
</body>
</html>