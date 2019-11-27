<?php

    require("ConnectieDatabaseScript.php");
    require("antiSQLinjection.php");
    require("redirect.php");
    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];


        /* stuur de gebruiker naar de homepage als ze een vak niet invullen */
        if(empty($username) || empty($password)){
            echo "Er is iets misgegaan tijdens het invullen";
            redirect('index');
            exit;

        }
        else if(specialCharacters($_POST)){

            redirect('index');


        }
        else {

            $sql =  $dbh->prepare('SELECT * FROM gebruikers where gebruikersnaam = ?');
            $query = $sql->execute(array([$username]));
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $accountExist = is_array($result);

            if($accountExist) {

                $passwordCorrect = true; /* password_verify($password, $result('wachtwoord'));*/

                if($passwordCorrect){

                    session_start();

                    $_SESSION["username"] = $result['gebruikersnaam'];
                    header("Location: ../html/index.php");
                    exit();

                }
                else{
                    header("Location: login.php");
                }

            }
            else {

                header("Location: ../html/login.php");
                exit();

            }
        }
    }
    else{
        header("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=PLahKLy8pQdCM0SiXNn3EfGIXX19QGzUG3");
    }
    