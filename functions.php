<?php

// functions.php
// siia tulevad funktsioonid mis on seotud andmebaasiga

$name="Kiira";
WelcomeUserOne($name);



function WelcomeUserOne($name){

// return "Tere ".$name; ei kuva midagi
echo "Tere ".$name;
	
}

?>

<br><br>

<?php

$welcome_user= welcomeUserTwo("Juku");


function WelcomeUserTwo($welcome_user){
	
	echo $welcome_user;
	
}



?>