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
<script src="material.js"></script><head>
	<title>
		<?php echo "$department | $full_name "; ?> - process order</title>
	</title>
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
$numorder = $_GET["norder"];
$reference = $_GET["ref"];
$organisme = $_GET["org"];
$objet = $_GET["obj"];
 ?>
 <div id="card" class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="mdl-card__menu">
    <?php echo "<a href='my_inbox_fiche_a.php?login=".$login."'>"; ?><button style="color:black" class="mdl-button  mdl-js-button mdl-js-ripple-effect">back</button></a>
    </button>
  </div>
 <form method="POST">
  <h2 class="mdl-card__title-text" style="font-size:30px;font-weight:bold;">Process order</h2><br><br><br>
  <ul class="demo-list-item mdl-list">
 	<li class="mdl-list__item"><label>objet : <?php echo $objet; ?></label></li>
 	<li class="mdl-list__item"><label>reference : <?php echo $reference; ?></label></li>
 	<li class="mdl-list__item"><label>organisme : <?php echo $organisme; ?></label></li>
 	<li class="mdl-list__item"><label>destination : SECT.D </label></li>

<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label class="mdl-textfield__label" for="nord">num order S</label>
 	<input class="mdl-textfield__input" id="nord" type="text" name="norder"></div></li>

<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label class="mdl-textfield__label" for="date">date : </label>
 	<input class="mdl-textfield__input" id="date" type="date" name="date"></div></li>

<li class="mdl-list__item">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
 	<label class="mdl-textfield__label" for="desc" >description :</label>
 	<textarea class="mdl-textfield__input" id="desc" name="description"></textarea></div></li>


 	<div class="mdl-card__actions mdl-card--border">
	<input type="submit" name="" value="save" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	<input type="reset" name="" class="mdl-button  mdl-js-button mdl-js-ripple-effect">
	</div>
 	</ul>
 </form>
 <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $numordersort = $_POST["norder"];
 $date = $_POST["date"];
 $desc = $_POST["description"];
$query = mysql_query("INSERT INTO `ficheorderss`(`numordersort`, `objet`,  `destination`, `source`, `date`, `description`,`reference`,`from`) VALUES ('$numordersort','$objet','SECT.D','$organisme','$date','$desc','$reference','$department')");
if (!$query) {
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