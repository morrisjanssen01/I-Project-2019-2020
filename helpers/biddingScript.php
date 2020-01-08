<?php
require ("antiSQLinjectionScript.php");
require ("redirect.php");
require ("connectionDatabaseScript.php");

session_start();
if(isset($_POST["submit"]) && isset($_SESSION["username"])){

    

    $bod = $_POST['bod'];

    $latestbid = loadBidding($_GET["detail"]);

    if(empty($bod)){
            
        header('location:  ../404.php?reeee');
        exit();

    }
    else if($latestbid[0]['bod'] == $bod || $latestbid['bod'] == $bod){
        redirect("detail.php?detail=".$_GET["detail"]);
    }
    else{
        global $dbh;
        $stmt = 'INSERT INTO boden (voorwerpnummer, bod, gebruikersnaam)
                  Values('.$_GET["detail"].', '. $bod.', '.$_SESSION["username"].')';

            //echo $_GET["detail"].$_POST["bod"].$_SESSION["username"];
        redirect('index', 'bodGeplaatst');
    }
}
else if(!isset($_GET["detail"]) || empty($_GET["detail"])){
    header('location:  ../404.php?boe');
    exit();
    }
else if(specialCharacters($_GET)){
    header('location:  ../404.php?nee');
    exit();
    }
else{
    header('location:  ../404.php?test');
    exit();
}