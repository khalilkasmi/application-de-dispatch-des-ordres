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
	<title><?php  echo "$department | $full_name "; ?> | Nouveau order</title>
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
		text-align: center;
	}
.demo-card-wide.mdl-card {
  width: 512px;
}

.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
@media (max-width: 768px){
	#card{
		padding-top: 20% !important;
		width: 100% !important;
	}
}
</style>
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<body>
<div id="card" class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="mdl-card__menu">
    <?php echo "<a href='BO_space.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
    </button>
  </div>
<form id="myForm" method="POST">
 <h2 class="mdl-card__title-text" style="font-size:30px;font-weight:bold;text-align: center">Ajouter un order</h2>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	<label  class="mdl-textfield__label" for="obj">objet : </label>
	<input class="mdl-textfield__input"  type="text" name="objet" id="obj">
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

	<label  class="mdl-textfield__label" for="ref">reference : </label>
	<input class="mdl-textfield__input"  type="text" name="reference" id="ref">
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

	<label  class="mdl-textfield__label" for="source">source : </label>
	<input class="mdl-textfield__input"  type="text" name="source" id="source">
</div>
<div class="mdl-card__actions mdl-card--border">
	<input type="submit" name="" value="enregistrer" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	<input type="reset" name="" value="réinitialiser" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	</div>
	</div>

</form>
</div>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$objet = $_POST["objet"];
	$reference = $_POST["reference"];
	$source = $_POST["source"];
	

if(!isset($objet) || trim($objet) == '' &&  !isset($reference) || trim($reference) == '' && !isset($source) || trim($source) == '')
{
   echo "<script>alert('You did not fill out the required fields.')</script>";
}else{



	$query = "INSERT INTO `order`(`objet`, `reference`, `source`) VALUES ('$objet','$reference','$source')";
	if (mysql_query($query)) {
		echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=BO_space.php?login='.$login.'">';
	}else{
		echo mysql_error();
	}
}}
 ?>
 <script src='nprogress/nprogress.js'></script>
<link rel='stylesheet' href='nprogress/nprogress.css'/>
<script>
NProgress.configure({ showSpinner: false });
NProgress.start();
setInterval(function(){NProgress.done();},1000)
</script>
</body>
</html>