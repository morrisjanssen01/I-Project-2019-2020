<?php

    require("ConnectieDatabaseScript.php");
    require("antiSQLinjectionScript.php");
    require("redirect.php");

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

            header("Location: ../html/login.php?bitch");
           // redirect('login');
           exit();
        }
        else {
            ConnectionDatabase();
            global $dbh;
            $sql =  $dbh -> prepare('SELECT * FROM gebruikers where gebruikersnaam = ?');
            $sql -> execute(array($username));
            try{
                $result = $sql -> fetch(PDO::FETCH_ASSOC);
                $accountExist = is_array($result);
                if($accountExist) {
                    password_verify($password, $result['wachtwoord']);
                    if($passwordCorrect){
                        session_start();
                        $_SESSION["username"] = $result['gebruikersnaam'];
                        header("Location: ../html/index.php");
                        exit();
                    }
                    else{
                    header("Location: ../html/login.php");
                    }
                }
                else {
                    header("Location: ../html/login.php");
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
        header("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=PLahKLy8pQdCM0SiXNn3EfGIXX19QGzUG3");
    }  