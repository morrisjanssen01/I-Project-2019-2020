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
            echo "Er is iets misgegaan tijdens het invullen";
            redirect('login');
            exit;
        }
        else if(specialCharacters($_POST)){

            header("Location: ../login.php?bitch");
           // redirect('login');
           exit();
        }
        else {
            connectionDatabase();
            global $dbh;
            $sql = $dbh->prepare('SELECT * FROM gebruikers where gebruikersnaam = ?');
            $sql->execute(array($username));
            try{
                $result = $sql -> fetch(PDO::FETCH_ASSOC);
                $accountExist = is_array($result);
                if($accountExist) {
                    password_verify($password, $result['wachtwoord']);
                    if($passwordCorrect){
                        session_start();
                        $_SESSION["username"] = $result['gebruikersnaam'];
                        header("Location: ../index.php");
                        exit();
                    }
                    else{
                    header("Location: ../login.php");
                    }
                }
                else {
                    header("Location: ../login.php");
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