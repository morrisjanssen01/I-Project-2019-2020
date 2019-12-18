<?php

    require("connectionDatabaseScript.php");
    require("antiSQLinjectionScript.php");
    require("redirect.php");
    require("rickRoll.php");

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        /* stuur de gebruiker naar de homepage als ze een vak niet invullen */
        if(empty($username) || empty($password)){
            redirect('login', 'emptyUidPass');
            exit;
        }
        else if(specialCharacters($_POST)){
            redirect('login', 'specialchars');
            exit();
        }
        else {
            global $dbh;
            $sql = $dbh->prepare('SELECT * FROM gebruikers where gebruikersnaam = ?');
            $sql->execute(array($username));
            try{
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $accountExist = is_array($result);
                if($accountExist) {

                    if(password_verify($password, $result['wachtwoord'])){
                        session_start();
                        $_SESSION["username"] = $result['gebruikersnaam'];
                        redirect('index', 'success');
                        exit();
                    }
                    else{
                    redirect('login', 'wrongPass');
                    }
                }
                else {
                    redirect('login', 'nonExisting');
                    exit();
                }
            } 
            catch(PDOException $Exception){
                echo "Er ging iets mis met de database. <br>";
                echo "De melding is {$exception->getMessage()}<br><br>";
            }
        }
    }
    else{
        rickRoll();
    }
    ?>