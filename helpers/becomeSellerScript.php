<?php
    require('redirect.php')
    require('antiSQLinjectionScript')
    if($_POST['questionList'] == 'option1' && isset($_POST['submitCredit'])){
        if(!SpecialCharacters($_POST['creditcard']){
            session_start();
            global $dbh;
            $stmt = 'update gebruikers set verkoper = 1 where gebruikers = '.$_SESSION["username"];
            $query = $dbh-prepare($stmt);
            $query -> execute;

        }
        else{

        }
    }
    else{

    }