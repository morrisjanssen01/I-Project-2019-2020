<?php

    function Login() {

        $username = $_GET[username];
        $password = $_GET["password"];

        /* stuur de gebruiker naar de homepage als ze een vak niet invullen */
        if(empty($username) || empty($password)){
            header('location: index.php');
            exit;

        }
        else{

            $sql = 'SELECT * FROM gebruikers where gebruikersnaam = :username';
            $query = preparedQuery($dbh , $sql [$username]); /* dbh connectie moet nog geschreven worden */
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $accountExist = (is_array($result));

            if($accountExist){

                $passwordCorrect = password_verify($password, $result('wachtwoord'));

                if($passwordCorrect){

                    session_start();

                    $_SESSION["username"] = $result['gebruikersnaam'];
                    header('location: index.php');

                }

            }
            else {

                header('location: login.php');

            }


        }
    }