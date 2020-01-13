<?php
    require('redirect.php');
    require('antiSQLinjectionScript.php');
    require('connectionDatabaseScript.php');
    if(!isset($_POST['submitCredit']) || !isset($_POST['submitPost'])){
        rickRoll();
    }
    else if(isset($_POST['questionList']) && $_POST['questionList'] == 'option1' && isset($_POST['submitCredit'])){
        if(empty($_POST['creditcard'])){
            redirect('becomeSeller', 'credit');
        }
        else if(!SpecialCharacters($_POST['creditcard'])){
            try{
            global $dbh;
            $stmt = 'update gebruikers set verkoper = 1 where gebruikers = '.$_SESSION["username"];
            $query = $dbh->prepare($stmt);
            $query -> execute();

            $stmt =  "INSERT INTO verkopers (gebruikersnaam, bank, bankrekening, controleoptie, creditcardnumber)
                       VALUES(".$_SESSION['username'].", :bank, :bankrekening, :optie, :creditcard)";
            $query = $dbh->prepare($stmt);
            $query -> execute(array(':bank'=> $_POST['bank'], ':bankrekening' => $_POST['bankNr'], ':optie' => $_POST['questionList'], ':creditcard' => $_POST['creditcard']));
            redirect('index', 'seller');
            }
            catch (PDOException $e) {
                echo $e;
                echo "Error: Er is een fout opgetreden probeer opnieuw!";
            }

        }
    }
    else if(isset($_GET['codeSent']) && $_SESSION['questionList'] == 'option2' && $_GET['codeSent'] == true && !isset($_POST['questionList'])){
        try{
        var_dump($_SESSION);
        global $dbh;
        $stmt = "update gebruikers set verkoper = 1 where gebruikersnaam = '" .$_SESSION["username"]."'";
        $query = $dbh->prepare($stmt);
        $query -> execute();

        $stmt =  "INSERT INTO verkopers (gebruikersnaam, bank, bankrekening, controleoptie)
                   Values('".$_SESSION['username']."', :bank, :bankrekening, :optie)";           
        $query = $dbh->prepare($stmt);
        $query -> execute(array(':bank' => $_SESSION['bank'], ':bankrekening' => $_SESSION['bankNr'], ':optie' => $_SESSION['questionList']));
        redirect('index', 'seller');
        }
        catch (PDOException $e) {
            echo $e;
            echo "Error: Er is een fout opgetreden probeer opnieuw!";
        }
    }
    else if(isset($_POST['submitPost'])){
        session_start();
        for($i=0; $i<6; $i++){
            $randomNumber = random_int(0,9);
            $verificationcode = $verificationcode . $randomNumber;
        }
        $_SESSION['codePost'] = $verificationcode;
        $_SESSION['bank'] = $_POST['bank'];
        $_SESSION['bankNr'] = $_POST['bankNr'];
        $_SESSION['questionList'] = $_POST['questionList'];


        redirect('becomeSeller', 'true');
    }
    else if(!isset($_SESSION['username'])){
        //rickRoll();
        echo'hoi';
    }
    else{
     //rickRoll();
     var_dump($_SESSION);
    }
    