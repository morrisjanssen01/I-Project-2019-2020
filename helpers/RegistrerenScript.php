<?php

require("ConnectieDatabaseScript.php");

$username = $_POST(["username"]);
$password = $_POST(["password"]);
$repeatpassword = $_POST(["repeat password"]);
$mailaddres = $_POST(["mailadress"]);


function CheckRegistration() {

}

/* checkt of de waarden die bij 'wachtwoord' en 'bevestig wachtwoord' met elkaar overeenkomen */
function checkPassword(){
if($password == $repeatpassword){
	submitRegistration();
}
	else{
		echo "Wachtwoorden komen niet overeen";
	}
}

/* Deze functie hasht het wachtwoord */
function hashPassword() {
	
}


/* Geeft een melding zodra niet alle velden zijn ingevuld */
function 
if(empty($username) || empty($password) || empty($repeatpassword) || empty($mailadress) {
	echo "Nog niet alle velden zijn ingevuld";
	exit;
})


/* deze functie geeft de ingevulde waarden bij gebruikersnaam en wachtwoord mee aan de variabelen */
if(isset($_POST["submit"])){
	$dbh = "INSERT INTO gebruikers (gebruikersnaam, Emailadres, wachtwoord)
	VALUES ($username, $mailadress, $password)";


/*  Deze functie checkt of de gebruikersnaam nog niet bestaat */
	if(isset($_POST["username"])){

	}
}

?>