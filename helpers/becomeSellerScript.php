<?php
    require('redirect.php');
    require('antiSQLinjectionScript');
    if($_POST['questionList'] == 'option1' && isset($_POST['submitCredit'])){
        if(!SpecialCharacters($_POST['creditcard'])){
            try{
            global $dbh;
            $stmt = 'update gebruikers set verkoper = 1 where gebruikers = '.$_SESSION["username"];
            $query = $dbh->prepare($stmt);
            $query -> execute();

            $stmt =  "INSERT INTO verkopers (gebruikersnaam, bank, bankrekening, controleoptie, creditcardnumber)
                       VALUES(".$_SESSION['username'].", :bank, :bankrekening, :optie, :creditcard)";
            $query = $dbh->prepare($stmt);
            $query = execute(array(':bank'=> $_POST['bank'], ':bankrekening' => $_POST['bankNr'], ':optie' => $_POST['questionList'], ':creditcard' => $_POST['creditcard']));
            redirect('index', 'seller');
            }
            catch (PDOException $e) {
                echo $e;
                echo "Error: Er is een fout opgetreden probeer opnieuw!";
            }

        }
        else if($_POST['questionList'] == 'option2' && $_GET['sentcode'] == true){
            try{
            global $dbh;
            $stmt = 'update gebruikers set verkoper = 1 where gebruikers = '.$_SESSION["username"];
            $query = $dbh->prepare($stmt);
            $query -> execute();

            $stmt =  "INSERT INTO verkopers (gebruikersnaam, bank, bankrekening, controleoptie, verificatiecode)
                       Values(".$_SESSION["username"].", :bank, :bankrekening, :optie, :code)";           
            $query = $dbh->prepare($stmt);
            $query = execute(array(':bank'=> $_POST['bank'], ':bankrekening' => $_POST['bankNr'], ':optie' => $_POST['questionList'], ':code' => $_POST['verificationCode']));
            redirect('index', 'seller');
            }
            catch (PDOException $e) {
                echo $e;
                echo "Error: Er is een fout opgetreden probeer opnieuw!";
            }
        }
    }
    else{
      rickRoll();
    }
    