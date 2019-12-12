
<?php
// dit is nog niet af 

require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");
require("redirect.php");
require("existingfieldcheck.php");
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
            $firstname = $_POST["firstName"];
            $surname = $_POST["lastName"];
            $adres1 = $_POST['adress1'];
            $adres2 = $_POST['adress2'];
            $postalcode = $_POST['postalCode'];
            $city = $_POST['city'];
            $country = $_POST['land'];
            $birthdate = $_POST['birthdate'];
            $email = $_SESSION['e-mail'];
            $question = $_POST['questionList'];
            $answer = $_POST['answer'];
					
			if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["repeatpassword"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["adress1"]) || empty($_POST["postalCode"]) || empty($_POST["land"]) || empty($_POST["birthdate"]) || empty($_POST["questionList"]) || empty($_POST["answer"])){
                //var_dump($_POST);
                header("location: ../register.php?empty");
                exit();
            }
            else if($_SESSION['verificationcode'] == $_POST["verificationcode"]){
                redirect('register');
            }
            else{
                if(specialCharacters($_POST)){
                    header("location: ../register.php?karakters");
                }
				else{
                    if(empty($adres2)){
                        $adres2 = NULL;
                    }
                    //connectionDatabase();
                    $data = $dbh->prepare("INSERT INTO Gebruikers (gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, landnaam, geboortedag, Emailadres, wachtwoord, vraagnummer, antwoordtekst, verkoper)
                                           Values (:username, :firstname, :surname, :adres1, :adres2, :postalcode, :city, :country, :birthdate, :email, :wachtwoord, :question, :answer, 0)");
                
                    if ($password !== $repeatpassword) {
                        //redirect("register");
                        header("location: ../register.php?password");
                    }
                    else if(fieldExist($username, 'gebruikersnaam', 'gebruikers')){
                        //redirect("register");
                        header("location: ../register.php?mijnding");
                    }
                    else if($password == $repeatpassword) {
                        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                        $data->execute(
                            array(':username' => $username, ':firstname' => $firstname, ':surname' => $surname, ':adres1' => $adres1, ':adres2' => $adres2, ':postalcode' => $postalcode, 
                                    ':city' => $city, ':country' => $country, ':birthdate' => $birthdate, ':email' => $email, ':wachtwoord' => $hashedpassword, ':question' => $question, ':answer' => $answer));
                             redirect("index");
                            }
                        }
                    }
                }
            }
            catch (PDOException $e) {
                echo $e;
                echo "Error: Er is een fout opgetreden probeer opnieuw!";
			}
		}
?>