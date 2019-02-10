<?php include 'connexion.php'; 
 
      
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

</style>
<head>
	<title>Bureau D'ordre</title>
</head>
<body>
<?php 
	session_start();
	$_SESSION["login"] = $_GET["login"];
	$login = $_SESSION["login"];
	$user_data =mysql_fetch_array(mysql_query("SELECT * FROM employe WHERE login='" . $_GET["login"] ."'")); 
	$full_name = $user_data[0];
?>




<?php
	$dep =mysql_fetch_array(mysql_query("SELECT * FROM `chefdep` WHERE `employee` = '$full_name' "));
 
	//echo "your department is ".$dep[1];	
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
  
  background-color: #00aa8d;
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
    width: 100% !important;
  }
}
</style>

<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="card">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text" style="color:white;font-size:30px;font-weight:bold"><?php echo $full_name ?></h2>
  </div>
  <div class="mdl-card__supporting-text" id="timecard">
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
    <a  href="new_order.php" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Nouveau order
    </a><a href="del_order.php" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
     Supprimer order
    </a>
    <a  href="final_orders.php" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
     Ma boîte de réception
    </a>


  </div>
  <div class="mdl-card__menu">
    <a href="logout.php"><button style="color:white" class="mdl-button  mdl-js-button mdl-js-ripple-effect">Déconnexion</button></a>
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