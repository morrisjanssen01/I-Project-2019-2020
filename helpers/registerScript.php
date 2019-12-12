
<?php
// dit is nog niet af 

require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");
require("redirect.php");
session_start();

if(empty($_SESSION["e-mail"])){
	redirect("register email");
	exit();
}
else{
			try {
                if (isset($_POST["submit"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $repeatpassword = $_POST["repeatpassword"];
                    $firstname = $_POST["firstname"];
                    $surname = $_POST["lastname"];
                    $adres1 = $_POST['address'];
                    $adres2 = $_POST['address2'];
                    $postalcode = $_POST['postcode'];
                    $city = $_POST['postcode'];
                    $country = $_POST['country'];
                    $birthdate = $_POST['birthdate'];
                    $question = $_POST['control'];
                    $answer = $_POST['answer'];
					
				if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["repeatpassword"]) || empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["address"]) || empty($_POST["control"]) || empty($_POST["postcode"]) || empty($_POST["country"]) || isset($_POST["birthdate"]) || empty($_POST["control"]) || empty($_POST["answer"]))){
                    redirect("register");
                    exit();
                }
                if(specialCharacters($_POST))
				else{
                    connectionDatabase();
                    $data = $dbh->prepare("INSERT INTO Gebruikers (gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, landnaam, geboortedag, Emailadres, wachtwoord, vraagnummer, antwoordtext)
                                           Values (:username, :firstname, :surname, :adres1, :adres2, :postalcode, :city, :country, :birthdate, :question, :answer");

                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                    if (checkusername($username) == false) {
                        
                    }
                    if (checkMail($email) == false) {
                        
                    }
                    if ($password !== $repeatpassword) {
                        
                    }

                    if ($password == $repeatpassword) {
                        if (checkUsername($username) == true) {
                            if (checkMail($email) == true) {
                                $data->execute(
                                    array(':firstname' => $firstname, ':surname' => $surname, ':birthdate' => $birthdate,
                                        ':mail' => $email, ':username' => $username, ':hashedpassword' => $hashedpassword, ':question' => $question,
                                        ':answer' => $answer, ':country' => $country, ':postcode' => $postcode, ':city' => $city, ':street' => $address, ':phone' => $phoneNumber));
                                        header("Location: index.php");
                            }
                        }
                    }
                }
            }

            } catch (PDOException $e) {
                //echo $e;
                echo "Error: Er is een fout opgetreden probeer opnieuw!";
			}
		}
?>