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
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<head>
	<title><?php echo "$department | $full_name "; ?> - nouvelle fiche</title>
</head>
<style type="text/css">
	body{
		background-color: #E0E0E0;
		margin: 0;
		padding: 0;
	}
	#card{
		margin :0 auto;
		width: 50%;
		margin-top: 8%;
		padding:5px;
		text-align: center;
	}
.demo-card-wide.mdl-card {
  width: 512px;
}

.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
@media (max-width: 768px){
	table{
		overflow-x: auto;
		display: block;

	}
	#card{
		width: 100% !important;
	}
}
</style>
<body>
<div id="card" class="demo-card-wide mdl-card mdl-shadow--2dp">

<form id="newF" method="POST">
<h2 class="mdl-card__title-text" style="color:black;font-size:30px;font-weight:bold">nouvelle fiche d'ordre</h2><br><br>
<div style="margin: 0 auto;width:50%;">
<table  class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="text-align: center;margin: 4px;">
<thead>
<tr><th>objet</th><th>reference</th><th>source</th><th></th></tr>
</thead>
<tbody>

<?php 
	$order_list = mysql_query("SELECT * FROM `order`");
	if ($order_list) {
			while ($orders = mysql_fetch_array($order_list)) {
					echo "<tr>
							<th>".$orders['objet']."</th>
							<th>".$orders['reference']."</th>
							<th>".$orders['source']."</th>
							<th><a 
							href='new_fiche_a.php?
							obj=".$orders['objet']."&
							ref=".$orders['reference']."&
							src=".$orders['source']."	
							'
							>
							nouvelle fiche</a></th>
							"	;
				}
			}
 ?>

 </tbody>
</table>
</div>
<div class="mdl-card__menu">
    <?php echo "<a href='directrice_space.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
    </button>
  </div>
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