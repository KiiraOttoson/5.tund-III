<?php

// functions.php
// siia tulevad funktsioonid mis on seotud andmebaasiga

// loome AB ühenduse
require_once("../config.php");
$database = "if15_kiira_3";
$mysqli = new mysqli($servername, $username, $password, $database);

// võtab andmed ja sisestab ABsse
function createUser(){
	
			$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES(?,?)");
			$stmt->bind_param("ss", $create_email, $create_password);
			$stmt->execute();
			$stmt->close();
	
}

function loginUser(){
			
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
}

// paneme ühenduse kinni
$mysqli->close();

?>

