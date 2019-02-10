<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Authentification</title>
</head>
<link rel="stylesheet" type="text/css" href="material.css">
<script src="material.js"></script>
<link rel="stylesheet" href="cssslide/css/app.css">

<style type="text/css">

	body {
		margin: 0;
		padding: 0;
		background-color: #E0E0E0;
}

@media (max-width: 768px){
	

	
	#card{
		margin-top: -50% !important;
		width: 100% !important;
	}
}
</style>
<body>

<?php 
include 'connexion.php';


if(count($_POST)>0) {
	
	// fetch the username and password 
	/*
	$result = mysql_query("SELECT * FROM employe WHERE login='" . $_POST["login"] . "' and password = '". $_POST["password"]

		."'");

	$count  = mysql_num_rows($result);

	if($count==0) {

		//wrong authentification
*/



$login = $_POST["login"];
$password  = $_POST["password"];
try {
	$dbh = new PDO('mysql:host=localhost;dbname=aukh', 'root', '');
	      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $q = "SELECT * FROM employe WHERE login = :log AND password = :pas";
	            $sth = $dbh->prepare($q);
	                  $sth->bindParam(':log', $login);
	                        $sth->bindParam(':pas', $password);
	                              $sth->execute();
	                                    $sth->setFetchMode(PDO::FETCH_ASSOC);
	                                          $result = $sth->fetchColumn();
	                                                $dbh = null;
} catch (Exception $e) {
	error_log('PDOException - ' . $e->getMessage(), 0);
	      die('Error establishing connection with database');
	
}
// teste if connected 

if (!empty($result)) {
	# code...

	//connected
		//fetching the role 
		$role =mysql_fetch_array(mysql_query("SELECT role FROM employe WHERE login='" . $_POST["login"] ."'")); 
		$user_role = $role[0];	
		$var2 = "chef_department";
		$var3 = "directrice";
		$var4 = "responsable_BO";
		$var5 = "responsable_concerne";
		if (strcasecmp($user_role, $var2) == 0)
		{
    	echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=chef_department_space.php?login='.$_POST["login"].'">';
		}elseif (strcasecmp($user_role, $var3) == 0)
		 {
		echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=directrice_space.php?login='.$_POST["login"].'">';
		}	elseif (strcasecmp($user_role, $var4) == 0)
		 {
		echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=BO_space.php?login='.$_POST["login"].'">';
		}elseif (strcasecmp($user_role, $var5) == 0)
		 {
		echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=resp_concerne_space.php?login='.$_POST["login"].'">';
		}		
}
}
?>
<style type="text/css">
	#card{
	margin :0 auto;
	width: 50%;
	margin-top: 10%;
	text-align: center;
}
.inp{
	font-size: 2em;
}
.lbl{
	font-size: 2em;
}
</style>



<div id="loginform">

<br>
<img src="aukhlogo.png">
<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="card">

<form method="POST" id="myform">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " >
		<input class="mdl-textfield__input inp" type="text" name="login" id="log">
		<label class="mdl-textfield__label lbl" for="log" >Nom d'utilisateur</label>
	</div><br>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
		<input class="mdl-textfield__input inp" type="password" name="password" id="pass">
		<label class="mdl-textfield__label lbl" for="pass">mot de pass</label>
	</div>	<br>
	<input type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect" value="s'identifier" id="show-dialog" >
</form>
</div>


</div>

<section class="sect-banner"> 
  <!-- Slider animation -->
  <ul class="kf-slider">
    <li></li>
    <li></li>
    <li></li>
  </ul>
  
</section>
<style type="text/css">
	#loginform{
		width: 50%;
		margin: 0 auto;
		text-align: center;
		margin-top: 10%;
	}
</style>
<script src='nprogress/nprogress.js'></script>
<link rel='stylesheet' href='nprogress/nprogress.css'/>
<script>
NProgress.configure({ showSpinner: false });
NProgress.start();
setInterval(function(){NProgress.done();},1000)
</script>
</body>
</html>