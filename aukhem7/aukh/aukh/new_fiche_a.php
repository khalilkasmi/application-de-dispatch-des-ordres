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
	<title><?php echo "$department | $full_name "; ?> - nouvelle fiche arrivé</title>
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
<?php 
$reference = $_GET["ref"];
$objet = $_GET["obj"];
$source = $_GET["src"];
 ?>
 <div id="card" class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="mdl-card__menu">
    <?php echo "<a href='new_fiche.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">retour</button></a>
    </button>
  </div>
 <form method="POST">
  <h2 class="mdl-card__title-text" style="font-size:30px;font-weight:bold;">nouvelle fiche</h2><br><br><br>
  <ul class="demo-list-item mdl-list">
 	<li class="mdl-list__item"><label  >objet : <?php echo $objet; ?></label></li>
 	<li class="mdl-list__item"><label>reference : <?php echo $reference; ?></label></li>
 	<li class="mdl-list__item"><label>source : <?php echo $source; ?></label></li>
<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label class="mdl-textfield__label" for="nord">num order A</label>
 	<input class="mdl-textfield__input" type="text" name="norder" id="nord">
</div>
</li>

<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
<label class="mdl-textfield__label" for="date" >date : </label>
 	<input  class="mdl-textfield__input" type="date" name="date" id="date">
</div>
</li>
<li class="mdl-list__item">
 	
 	<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
  <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" name="dest[]" value="dgur" >
  <span class="mdl-checkbox__label">DGUR</span>
</label>


<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
  <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input" name="dest[]" value="det" >
  <span class="mdl-checkbox__label">DET</span>
</label>


<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-3">
  <input type="checkbox" id="checkbox-3" class="mdl-checkbox__input" name="dest[]" value="daf" >
  <span class="mdl-checkbox__label">DAF</span>
</label>


<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-4">
  <input type="checkbox" id="checkbox-4" class="mdl-checkbox__input" name="dest[]" value="s.infrmtq" >
  <span class="mdl-checkbox__label">S.INFrMTQ</span>
</label>
 		
</li>






 		<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label>description :</label>
 	<textarea name="description"></textarea>
 	</div></li>

 	<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label>instruction : </label>
 	<textarea name="instruction"></textarea>
 	</div></li>

<div class="mdl-card__actions mdl-card--border">
	<input type="submit" name="" value="enregistrer" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	<input type="reset" name="" value="réinitialiser" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	</div>






 	</ul>
 </form>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $numorder=$_POST["norder"];
 $date = $_POST["date"];
 $destination  = implode(",", $_POST["dest"]);
 $description = $_POST["description"];
 $instruction = $_POST["instruction"];
 $insert = mysql_query("INSERT INTO `ficheordrea`( `n_order_a`,`date`, `reference`, `organisme`, `objet`, `destination`, `description`, `instruction`) VALUES ('$numorder','$date','$reference','$source','$objet','$destination','$description','$instruction')");
 if ($insert) {
 	echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=directrice_space.php?login='.$login.'">';
 }else{
 	echo mysql_error();
 }
}
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