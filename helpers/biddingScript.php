<?php
require ("antiSQLinjectionScript.php");
require ("redirect.php");
require ("connectionDatabaseScript.php");

session_start();
if(isset($_POST["submit"])){

    

    $bod = $_POST['bod'];

    $latestbid = loadBidding($_GET["detail"]);

    if(empty($bod)){
            
        header('location:  ../404.php?');
        exit();

    }
    else if((floatval($latestbid[0]['bod']) <= floatval($bod) || floatval($latestbid['bod']) <= floatval($bod)) && $latestbid[0]['bod'] != null && $latestbid['bod'] != null){
        header("location: ../detail.php?detail=".$_GET["detail"]."&msg=invalid");
    }
    else if(floatval($bod) < getStartPrijs($_GET["detail"])){
        header("location: ../detail.php?detail=".$_GET["detail"]."&msg=invalid");
    }
    else{
        global $dbh;
        $stmt = "INSERT INTO boden (voorwerpnummer, bod, gebruikersnaam)
                  Values(".$_GET["detail"].", ".$_POST["bod"].", '".$_SESSION["username"]."')";
        $query = $dbh ->prepare($stmt);
        $query->execute();

        echo $_GET["detail"].$_POST["bod"].$_SESSION["username"];
        redirect('index', 'bodGeplaatst');
    }
}
else if(!isset($_GET["detail"]) || empty($_GET["detail"])){
    header('location:  ../404.php?');
    exit();
    }
else if(specialCharacters($_GET)){
    header('location:  ../404.php?');
    exit();
    }
else if(!isset($_SESSION["username"])){
    header('location:  ../404.php?');
}
else{
    header('location:  ../404.php?');
    exit();
}


Function getStartPrijs($detail){

    global $dbh;
    $stmt = "SELECT startprijs From voorwerpen WHERE voorwerpnummer = $detail ";
    $query = $dbh->prepare($stmt);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return floatval($result);

}