<?php include 'connexion.php';
session_start();
if (isset($_SESSION["login"])) {
$login = $_SESSION["login"];
$full_name = $_SESSION["fullname"];
$service = $_SESSION["service"];

}
 ?>
 <!DOCTYPE html>
 <html>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
 	<title><?php echo "$service | $full_name "; ?> - Ma boîte de réception</title>
 </head>
 <link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<style>
body{
	background-color: #e0e0e0;
	margin: 0;
	padding: 0;
}

#card{
	margin :0 auto;
	width:80%;
	margin-top: 10%;
	text-align: center;
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
<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="card">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text" style="color:black;font-size:30px;font-weight:bold">Ma boîte de réception</h2>
  </div>
  <div style="margin: 0 auto;width: 70%;">
  <table   class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="text-align: center;margin: 4px;"><thead>
 <tr>
					<th>n_order</th>
					<th>date</th>
					<th>reference</th>
					<th>organisme</th>
					<th>objet</th>
					<th>description</th>
					<th>instruction</th>
					<th></th>
					</tr></thead><tbody>
					<?php 
			$get_fiche = mysql_query("SELECT * FROM `ficheorderas` WHERE `destination` like '%".$service."%'") ;
				if ($get_fiche) {
					while ($data = mysql_fetch_array($get_fiche)) {

							echo "
								<tr>
								<th>".$data[0]."</th>
								<th>".$data[4]."</th>
								<th>".$data[2]."</th>
								<th>".$data[3]."</th>
								<th>".$data[1]."</th>
								<th>".$data[6]."</th>
								<th>".$data[7]."</th>
								<th><a href='process_order.php?norder=".$data[0]."&&ref=".$data[2]."&&org=".$data[3]."&&obj=".$data[1]."'>process order</a></th>
								</tr>
							";
					}
				}else{
					echo mysql_error();
				}
			
	 ?></tbody>
	 </table>
	 
 </div>
<div class="mdl-card__menu">
    <?php echo "<a href='resp_concerne_space.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
    </button>
  </div>
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