<?php
require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");
require("redirect.php");

session_start();

error_reporting(E_ERROR | E_PARSE);
echo($_SESSION["verificationcode"]);

if(!isset($_SESSION["e-mail"])){
	redirect("register email");
	exit();
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$_SESSION["postedData"]=$_POST;
}
if(isset($_POST["username"])) {
	ConnectionDatabase();
	global $dbh;
	$record = $_POST["username"];
	$sql = $dbh->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ?");
	$query = $sql->execute(array([$username]));
	$users = $query->fetchAll(pdo::FETCH_ASSOC);
	if(isarray($user)){
	  echo'Deze gebruikersnaam staat al geregistreerd!';
	  exit();
	}
	/* if(sqlsrv_nums_row($query) == 0){
		$result = add_customer($_POST);
 		if ($result === true ){	
			die();
		} */
  }
/*else {
	if(isset($_POST["gebruikersnaam"])){
    $existing = existing_customer();
	echo'Deze gebruikersnaam staat al geregistreerd!';
	exit();
	}	
 } */

/* Geeft de ingevulde waarden bij gebruikersnaam en wachtwoord mee aan de variabelen */
/* zet het mailadres in een sessie en unset deze nadat je hem in de database hebt gestopt.	*/
if(isset($_POST["submit"])){
	$username = $dbh->real_escape_string($_POST["username"]);
	$password = $dbh->real_escape_string($_POST["password"]);
	$repeatpassword = $dbh->real_escape_string($_POST["Rpassword"]);
	$mailaddress = $dbh->real_escape_string($_POST["mailadress"]);
	$firstname = $dbh->real_escape_string($_POST["firstName"]);
	$lastName = $dbh->real_escape_string($_POST["lastName"]);
	$adress1 = $dbh->real_escape_string($_POST["adress1"]);
	$adress2 = $dbh->real_escape_string($_POST["adress2"]);
	$postalCode = $dbh->real_escape_string($_POST["postalCode"]);
	$city = $dbh->real_escape_string($_POST["city"]);
	$land = $dbh->real_escape_string($_POST["land"]);
	$birthDate = $dbh->real_escape_string($_POST["birthDate"]);
	$questionList = $dbh->real_escape_string($_POST["questionList"]);
	$answer = $dbh->real_escape_string($_POST["answer"]);
/* Geeft een melding zodra niet alle velden zijn ingevuld */
try {
if(empty($username) || empty($password) || empty($repeatpassword) || empty($mailadress)) {
	echo "Nog niet alle velden zijn ingevuld";
}
else if(specialCharacters($_POST)){
		redirect('index');
}
}
catch (PDOException $exception){
		echo "Er ging iets mis met het invullen. <br>";
		echo "De melding is {$exception->getMessage()}<br><br>";
}
/* Checkt of wachtwoorden overeenkomen. Wanneer de wachtwoorden overeenkomen, wordt het wachtwoord gehasht */

	if($password != $repeatpassword){
		echo "Wachtwoorden komen niet overeen";
	}
	else {
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT); 
	$dbh = "INSERT INTO gebruikers (gebruikersnaam, Emailadres, wachtwoord, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, landnaam, geboortedag, vraagnummer, antwoordtekst)
			VALUES ($username, $mailadress, $hashedpassword, $firstname, $lastName, $adress1, $adress2, $postalCode, $city, $land, $birthDate, $questionList, $answer)";
	echo "U bent geregistreerd!";
	}

	
}
?>