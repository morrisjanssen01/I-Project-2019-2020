<?php

$username = $_POST(["username"]);
$password = $_POST(["password"]);
$repeatpassword = $_POST(["repeat password"]);
$mailaddres = $_POST(["mailadress"]);


/* checkt of de waarden die bij 'wachtwoord' en 'bevestig wachtwoord' met elkaar overeenkomen */
if($password == $repeatpassword){
	submitRegistration();
}
	else{
		echo "Wachtwoorden komen niet overeen";
	}

/* Geeft een melding zodra niet alle velden zijn ingevuld */
if(empty($username) || empty($password) || empty($repeatpassword) || empty($mailaddres) {
	echo "Nog niet alle velden zijn ingevuld";
	exit;
})


/* deze functie geeft de ingevulde waarden bij gebruikersnaam en wachtwoord mee aan de variabelen */
if(isset($_POST["submit"])){

	$username = $_POST["username"];
	$password = $_POST["password"];


/*  Deze functie checkt of de gebruikersnaam nog niet bestaat */
function CheckUsername() {
	if(isset($_POST["username"])){

	}
}

?>