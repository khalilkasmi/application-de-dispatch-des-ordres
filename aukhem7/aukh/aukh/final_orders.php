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
	<title><?php echo "$department | $full_name "; ?> - Ma boîte de réception</title>
</head>
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<body>

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

<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="card">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text" style="color:black;font-size:30px;font-weight:bold">Ma boîte de réception</h2>
  </div>
  <div style="margin: 0 auto;width: 70%;">
  <table   class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="text-align: center;margin: 4px"><thead>
<tr>
					<th>n_order</th>
					<th>objet</th>
					<th>organisme</th>
					<th>Date</th>
					<th>description</th>
					<th>Reference</th>
					<th>deparement</th>
					
	</tr></thead><tbody>
					<?php 
	

					$getprocorder = mysql_query("SELECT * FROM `ficheorderss` WHERE `destination` = '$department'");
					while ($data = mysql_fetch_assoc($getprocorder)) {
						$num = $data["numordersort"];
						$obj = $data["objet"];
						$dest = $data["source"];
						$date = $data["date"];
						$desc =  $data["description"];
						$ref =  $data["reference"];
						$from = $department;
						echo "
						<tr>
							<th> " . $data["numordersort"] . "</th>
							<th>" . $data["objet"] . "</th>
							<th>" . $data["source"] . "</th>
							<th>" . $data["date"] . "</th>
							<th>" . $data["description"] . "</th>
							<th>" . $data["reference"] . "</th>
							<th>" . $data["from"] . "</th>
							
							</tr>
						";
					}
					 ?>
					 </tbody>
</table>
</div>
<div class="mdl-card__menu">
    <?php echo "<a href='BO_space.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
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