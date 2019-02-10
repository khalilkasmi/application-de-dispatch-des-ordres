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
 	<title><?php echo "$department | $full_name "; ?> - dispatch vers les services</title>
 </head>
 <style type="text/css">
	body{
		margin : 0;
		padding: 0;
		background-color: #e0e0e0;
	}
	#card{
		margin :0 auto;
		width: 35%;
		margin-top: 8%;
		padding: 10px;
		
	}
.demo-card-wide.mdl-card {
  width: 512px;
}

.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
@media (max-width: 768px){
	

	
	#card{
		width: 100% !important;
		padding-top: 15% !important;
	}
}
</style>
 <body>
 <?php 
$reference = $_GET["ref"];
$objet = $_GET["obj"];
$source = $_GET["src"];
$num_order_a = $_GET["num"];
$date = $_GET["date"];
 ?>
 <div id="card" class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="mdl-card__menu"><br>
    <?php echo "<a href='my_inbox_fiche_a.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
    </button>
  </div>
 <form method="POST">
 <h2 class="mdl-card__title-text" style="font-size:30px;font-weight:bold;">Dispatch vers les services</h2><br><br><br>
 <ul class="demo-list-item mdl-list">
 	<li class="mdl-list__item"><label>objet : <?php echo $objet; ?></label></li>
 	<li class="mdl-list__item"><label>reference : <?php echo $reference; ?></label></li>
 	<li class="mdl-list__item"><label>source : <?php echo $source; ?></label></li>
 	<li class="mdl-list__item"><label>num order A : <?php echo $num_order_a; ?></label></li>
 	<li class="mdl-list__item"><label>date :  <?php echo $date; ?></label></li>
 	<li class="mdl-list__item"><label>destination : </label></li>
 		<li class="mdl-list__item">
 		<?php 
 		$get_serv = mysql_query("SELECT `designation` FROM `service` WHERE `departement` = '$department'");
 		while ($get_ser_data = mysql_fetch_array($get_serv)) {
 			echo ' <input class="mdl-checkbox__input" type="checkbox" name="serv[]" value="'.$get_ser_data["designation"].'"><label >'.$get_ser_data["designation"].'</label><br>';
 		}
 		 ?><br>
 		 </li>
 		<li class="mdl-list__item"> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label class="mdl-textfield__label" for="desc">description :</label>
 	<textarea  class="mdl-textfield__input" id="desc" name="description"></textarea><br>
 	</div></li>
 	<li class="mdl-list__item">
 	 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label class="mdl-textfield__label" for="inst">instruction : </label>
 	<textarea class="mdl-textfield__input" id="inst" name="instruction"></textarea><br>
 	</div></li>
 	<div class="mdl-card__actions mdl-card--border">
	<input type="submit" name="" value="renregistrer" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	<input type="reset" name="" value="réinitialiser" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	</div>
 	
 	</ul>
 </form>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $destination = implode(",", $_POST["serv"]);
 $description = $_POST["description"];
 $instruction = $_POST["instruction"];
 $insert =mysql_query("INSERT INTO `ficheorderas`(`numorder`, `objet`, `reference`, `source`, `date`, `destination`, `description`, `instruction`) VALUES ('$num_order_a','$objet','$reference','$source','$date','$destination','$description','$instruction')");
 if (!$insert) {
 	echo mysql_error();
 }
}
  ?>
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