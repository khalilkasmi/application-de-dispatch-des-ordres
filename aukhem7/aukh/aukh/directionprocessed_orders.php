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
	<title><?php echo "$department | $full_name "; ?> - ordres traitées </title>
</head>
<style type="text/css">
	body{
		background-color: #E0E0E0;
		margin: 0;
		padding: 0;
	}
	#card{
		margin :0 auto;
		width: 80%;
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

<div style="margin: 0 auto;width:80%;">
<h2 class="mdl-card__title-text" style="color:black;font-size:30px;font-weight:bold">ordres traitées </h2><br><br>
<table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="text-align: center;margin: 4px;">
<thead>
<tr>
					<th>n_order</th>
					<th>objet</th>
					<th>organisme</th>
					<th>Date</th>
					<th>description</th>
					<th>Reference</th>
					<th>deparement</th>
					<th>envoyer vers BO</th>
	</tr></thead><tbody>
					<?php 
	

					$getprocorder = mysql_query("SELECT * FROM `ficheorderss` WHERE `destination` = '$department'");
					while ($data = mysql_fetch_assoc($getprocorder)) {
						$num = $data["numordersort"];
						$obj = $data["objet"];
						$dest = $data["destination"];
						$date = $data["date"];
						$desc =  $data["description"];
						$ref =  $data["reference"];
						$from = $department;
						$src=$data["source"];
						echo "
						<tr>
							<th> " . $data["numordersort"] . "</th>
							<th>" . $data["objet"] . "</th>
							<th>" . $data["source"] . "</th>
							<th>" . $data["date"] . "</th>
							<th>" . $data["description"] . "</th>
							<th>" . $data["reference"] . "</th>
							<th>" . $data["from"] . "</th>
							<th><a href ='sec_to_bo.php?num=$num&&obj=$obj&&dest=$dest&&date=$date&&desc=$desc&&ref=$ref&&from=$from&&src=$src'>envoyer vers BO</a></th>
							</tr>
						";
					}
					 ?></tbody>
</table>
</div>
<div class="mdl-card__menu">
    <?php echo "<a href='directrice_space.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">back</button></a>
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