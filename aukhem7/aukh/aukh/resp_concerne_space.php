<?php include 'connexion.php';

     

	session_start();
	$_SESSION["login"] = $_GET["login"];
	$login = $_SESSION["login"];
	$user_data =mysql_fetch_array(mysql_query("SELECT * FROM employe WHERE login='" . $_GET["login"] ."'")); 
	$full_name = $user_data[0];
	
	$serv =mysql_fetch_array(mysql_query("SELECT * FROM `persserv` WHERE `employe` = '$full_name' "));
		
	$_SESSION["fullname"]=$full_name;
	$_SESSION["role"]=$user_data[3];
	$_SESSION["service"]=$serv[0];

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<style type="text/css">
	body{
		background-color: #E0E0E0;
		margin: 0;
		padding: 0;
	}
@media (max-width: 768px){
	

	
	#card{
		width: 100% !important;
	}
}
</style>
<style>
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  <?php echo "background: url('profilepics/".$login.".jpg') center / cover;"; ?>
  background-color: #7b1fa2;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
#card{
	margin :0 auto;
	width: 50%;
	margin-top: 10%;
	text-align: center;
}
</style>
<head>
	<title><?php echo "$full_name | ".$serv[0]; ?></title>
</head>
<body>

<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="card">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text" style="color:white;font-size:30px;font-weight:bold"><?php echo $full_name ?></h2>
  </div>
  <div class="mdl-card__supporting-text">
        <?php 
   if(date("H") < 12){
 
    echo  "Bonjour";
 
   }elseif(date("H") > 11 && date("H") < 18){
 
     echo  "bonne après-midi";
 
   }elseif(date("H") > 17){
 
     echo "Bonsoir";
 
   }

     ?>
  </div>
   <div class="mdl-card__actions mdl-card--border">
    <?php echo "<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' href='my_inbox_fiche_a_s.php?login=".$login."'>Ma boîte de réception</a><br>"; ?>
  </div>
  <div class="mdl-card__menu">
    <a href="logout.php"><button style="color:white" class="mdl-button  mdl-js-button mdl-js-ripple-effect">Deconnexion</button></a>
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