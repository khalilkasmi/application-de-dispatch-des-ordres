<?php include 'connexion.php'; ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>chef dep space</title>
</head>
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<style type="text/css">
	body{
		background-color: #E0E0E0;
		margin: 0;
		padding: 0;
	}

</style>

<body>
<?php 
	session_start();
	$_SESSION["login"] = $_GET["login"];
	$login = $_SESSION["login"];
	$user_data =mysql_fetch_array(mysql_query("SELECT * FROM employe WHERE login='" . $_GET["login"] ."'")); 
	$full_name = $user_data[0];
	
	$dep =mysql_fetch_array(mysql_query("SELECT * FROM `chefdep` WHERE `employee` = '$full_name' "));
	
	$_SESSION["fullname"]=$full_name;
	$_SESSION["role"]=$user_data[3];
	$_SESSION["department"]=$dep[1];

?>
<style>
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  <?php echo "background: url('profilepics/".$login.".jpeg') center / cover;"; ?>
  background-color: #0288d1;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
#card{
	margin :0 auto;
	width: 35%;
	margin-top: 10%;
	text-align: center;
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
<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="card">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text" style="color:white;font-size:30px;font-weight:bold"><?php echo $full_name ?></h2>
  </div>
  <div class="mdl-card__supporting-text">
         <?php 
   if(date("H") < 12){
 
    echo  "
    <style>#timecard{background:url('pics/morning.jpg') center / cover;height:3em;width:100%}</style>

    ";

 
   }elseif(date("H") > 11 && date("H") < 18){
 
     echo  "
    <style>#timecard{background:url('pics/noon.jpeg') center / cover;height:3em;width:100%}</style>

    ";
 
   }elseif(date("H") > 17){
 
     echo  "
    <style>#timecard{background:url('pics/evening.jpeg') center / cover;height:3em;width:100%}</style>

    ";
 
   }

     ?>
  </div>
   <div class="mdl-card__actions mdl-card--border">
    <a  href="my_inbox_fiche_a.php" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Ma boîte de réception
   <?php 
if (!strcasecmp($_SESSION["department"], "S.INFRMTQ") == 0) {
	echo '<a href="processed_orders_dep.php" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">orders traitées</a><br>';
}
 ?>

  </div>
  <div class="mdl-card__menu">
    <a href="logout.php"><button style="color:white" class="mdl-button  mdl-js-button mdl-js-ripple-effect">deconnexion</button></a>
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