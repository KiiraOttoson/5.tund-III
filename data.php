<?php

require_once("functions.php");

//siia pääseb ligi sisseloginud kautaja
//kui kasutaja ei ole sisselogitud,
//siis suunan login.php lehele
if(!isset($_SESSION["logged_in_user_id"])){
	header("Location: login.php");
}

//kasutaja tahab välja logida
if(isset($_GET["logout"])){
	//aadressireal on olemas muutuja logout
	// kustutame kõik sessiooni muutujad ja peatame sessiooni
	session_destroy();
	
	header("Location: login.php");
	
}

?>

<p>
 Tere, <?=$_SESSION["logged_in_user_email"];?>
 <a href="?logout=1"> Logi välja <a>