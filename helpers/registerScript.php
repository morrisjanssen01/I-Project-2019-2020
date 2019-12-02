<?php
require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");

error_reporting(E_ERROR | E_PARSE);

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$_SESSION["postedData"]=$_POST;
}
if(isset($_POST["username"])) {
	ConnectionDatabase();
	global $dbh;
	$record = $_POST["username"];
	$getUsers = $dbh->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam == $record");
	$getUsers->execute();
	$users = $getUsers->fetchAll(pdo::FETCH_ASSOC);
	foreach ($users as $user){
		
	};
	if(sqlsrv_nums_row($query) == 0){
		$result = add_customer($_POST);
 		if ($result === true ){	
			die();
		}
  }
}	
else {
	if(isset($_POST["gebruikersnaam"])){
    $existing = existing_customer();
	echo'Deze gebruikersnaam staat al geregistreerd!';
	}	
}

/* Geeft de ingevulde waarden bij gebruikersnaam en wachtwoord mee aan de variabelen */
/* zet het mailadres in een sessie en unset deze nadat je hem in de database hebt gestopt.	*/
if(isset($_POST["submit"])){
	$username = $dbh->real_escape_string($_POST(["username"]));
	$password = $dbh->real_escape_string($_POST(["password"]));
	$repeatpassword = $dbh->real_escape_string($_POST(["Rpassword"]));
	$mailaddress = $dbh->real_escape_string($_POST(["mailadress"]));
/* Geeft een melding zodra niet alle velden zijn ingevuld */
try {
if(empty($username) || empty($password) || empty($repeatpassword) || empty($mailadress)) {
	echo "Nog niet alle velden zijn ingevuld";
}
elseif(specialCharacters($_POST)){
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
	$dbh = "INSERT INTO gebruikers (gebruikersnaam, Emailadres, wachtwoord)
	VALUES ($username, $mailadress, $hashedpassword)";
	echo "U bent geregistreerd!";
	}

	
}
?>