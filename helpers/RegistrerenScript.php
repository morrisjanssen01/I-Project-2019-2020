<?php

require("ConnectieDatabaseScript.php");
require("antiSQLinjection.php");

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$_SESSION["postedData"]=$_POST;
}

/* Geeft de ingevulde waarden bij gebruikersnaam en wachtwoord mee aan de variabelen */
if(isset($_POST["submit"])){
	$username = $dbh->real_escape_string($_POST(["username"]));
	$password = $dbh->real_escape_string($_POST(["password"]));
	$repeatpassword = $dbh->real_escape_string($_POST(["Rpassword"]));
	$mailaddres = $dbh->real_escape_string($_POST(["mailadress"]));

/* Geeft een melding zodra niet alle velden zijn ingevuld */

if(empty($username) || empty($password) || empty($repeatpassword) || empty($mailadress) {
	echo "Nog niet alle velden zijn ingevuld";
	exit;

	else if(specialCharacters($_POST)){

		redirect('index');
	}
})

/* Checkt of wachtwoorden overeenkomen. Wanneer de wachtwoorden overeenkomen, wordt het wachtwoord gehasht */

	if($password != $repeatpassword){
		echo "wachtwoorden komen niet overeen";
	}
	else {
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT); 
	$dbh = "INSERT INTO gebruikers (gebruikersnaam, Emailadres, wachtwoord)
	VALUES ($username, $mailadress, $password)";
	echo "U bent geregistreerd!"
	}

	


?>