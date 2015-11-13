<?php

// loome AB ühenduse
require_once("../config_global.php");
$database = "if15_kiira_3";






// võtab andmed ja sisestab ABsse
function createUser($create_email, $create_password){
	
			// Global muutujad, et kätte saada config failist andmed
			$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES(?,?)");
			$stmt->bind_param("ss", $create_email, $create_password);
			$stmt->execute();
			
			echo "Olete registreerunud! Teie E-post on ".$create_email." ja parool on ".$create_password;
			
			$stmt->close();
			
			$mysqli->close();
	
}

function loginUser($email, $password){
			
			$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
			$stmt->bind_result($id_from_db, $email_from_db);
			$stmt->bind_param("ss", $email, $password);
			$stmt->execute();
			
			if($stmt->fetch()){
					
					echo "Kasutaja ".$id_from_db." logis sisse";
				}else{
					echo "Teie poolt sisestatud andmed ei ole õiged!";
					  }
					  
					  
			$stmt->close();
			
			$mysqli->close();
}



?>

