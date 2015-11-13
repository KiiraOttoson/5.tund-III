<?php


// kõik funktsioonid kus tegeleme ABga
require_once("functions.php");


// muutujad errorite jaoks
	$email_error = "";
	$password_error = "";
	$create_email_error = "";
	$create_password_error = "";


// muutujad väärtuste jaoks
	$email = "";
	$password = "";
	$create_email = "";
	$create_password = "";

	
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

	if(isset($_POST["login"])){ 
	
	if(empty($_POST["email"])){
					$email_error = " *Palun sisesta E-post!"; 
				}else{
		$email = test_input($_POST["email"]);	
		}
		
	if(empty($_POST["password"])){
					$password_error = " *Palun sisesta salasõna!";
				}else{
				if(strlen($_POST["password"]) < 6 ){ 
				$password_error = " *Salasõna pikkus peab olema vähemalt 6 sümbolit!";
				}else{
				$password = test_input($_POST["password"]);
		}
		}
	  
		if($password_error == "" && $email_error == "" ){ 
				
		
			loginUser();			
				
				
				
		}
				
				
} //if isset login ends

if(isset($_POST["create"])){ 


	
	
	if(empty($_POST["create_email"])){
	  $create_email_error = " *Palun sisesta E-post!";
	}else{
	  $create_email = test_input($_POST["create_email"]);
	  }
  
	if(empty($_POST["create_password"])){
	  $create_password_error = "*Palun sisesta parool!";
    }else{
	  if(strlen($_POST["create_password"]) < 6 ){
	  $create_password_error = " *Parooli pikkus peab olema vähemalt 6 sümbolit!";
	}else{
	 $create_password = test_input($_POST["create_password"]);
	  }
	  }
	  
		
		if($create_password_error == "" && $create_email_error == "" ){
					
				echo "Olete registreerunud! Teie E-post on ".$create_email." ja parool on ".$create_password;
				
				createUser();
				 
				
				
				}
				
} //if isset create ends
}// if server request ends

function test_input($data) { 
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<head>
<title>Matkapäevik</title>
</head>

<body>

<h2>Sisselogimine</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

	<input type="email" name="email" placeholder="E-post" value="<?php echo $email; ?>"><?php echo $email_error; ?><br><br>
	<input type="password" name="password" placeholder="Parool"><?php echo $password_error; ?><br><br>
	<input type="submit" name="login" value="Sisene">

</form>

	<h2>Registreerumine</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	

		E-post:<br><input type= "email" name="create_email" value="<?php echo $create_email; ?>"><?php echo $create_email_error; ?><br><br>
		Valige parool:<br><input type= "password" name="create_password"><?php echo $create_password_error; ?><br><br>
		<input type="submit" name="create" value= "Loo kasutaja">
</form>
	
	



</body>
</html>




