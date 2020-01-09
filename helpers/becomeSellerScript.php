<?php
    require('redirect.php');
    require('antiSQLinjectionScript');
    if($_POST['questionList'] == 'option1' && isset($_POST['submitCredit'])){
        if(!SpecialCharacters($_POST['creditcard']){
            global $dbh;
            $stmt = 'update gebruikers set verkoper = 1 where gebruikers = '.$_SESSION["username"];
            $query = $dbh-prepare($stmt);
            $query -> execute();

            $stmt2 =  "INSERT INTO verkopers (gebruikersnaam, bank, bankrekening, controleoptie, creditcardnumber)
                       Values($_SESSION["username"], :bank, :bankrekening, :optie, :"


        }
        else{

        }
    }
    else{

    }