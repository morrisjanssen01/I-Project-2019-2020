
<?php
// dit is nog niet af 
require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");
require("redirect.php");

if(!isset($_SESSION["e-mail"])){
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
					
				if(!(isset($_POST["username"]) || isset($_POST["password"]) || isset($_POST["repeatpassword"]) || isset($_POST["firstname"]) || isset($_POST["lastname"]) || isset($_POST["address"]) || isset($_POST["control"]) || isset($_POST["postcode"]) || isset($_POST["country"]) || isset($_POST["birthdate"]) || isset($_POST["control"]) || isset($_POST["answer"]))){
                    redirect("register");
                    exit();
                }
                if
				else{
                    connectionDatabase();
                    $data = $dbh->prepare("INSERT INTO Gebruikers (gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, landnaam, geboortedag, Emailadres, wachtwoord, vraagnummer, antwoordtext)
                                           Values (:username, :firstname, :surname, :adres1, :adres2, :postalcode, :city, :country, :birthdate, :question, :answer");

                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                    if (checkusername($username) == false) {
                        echo "<p>Gebruikersnaam al in gebruik, wees is wat meer origineel</p>";
                    }
                    if (checkMail($email) == false) {
                        echo "<p>Dit E-mailadres is al in gebruik!</p>";
                    }
                    if ($password !== $repeatpassword) {
                        echo "<p>Wachtwoord komt NIET overeen, voer 2 dezelfde wachtwoorden in!</p>";
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