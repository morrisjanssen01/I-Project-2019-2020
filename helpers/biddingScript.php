<?php
require ("antiSQLinjectionScript.php");
require ("redirect.php");
require ("connectionDatabaseScript.php");

session_start();

if(isset($_POST["submit"])){
   if(!isset($_SESSION["username"])){
    redirect('login','loggedOut');
}
else{
    $bod = $_POST['bod'];

    $latestbid = loadBidding($_GET["detail"]);

    if(empty($bod)){
            
        header('location:  ../404.php?');
        exit();

    }
    else if(floatval($latestbid[0]['bod']) >= floatval($bod) && $latestbid[0]['bod'] !== null){
        //var_dump($latestbid);
        header("location: ../detail.php?detail=".$_GET["detail"]."&msg=invalid");
    }
    else if(floatval($bod) < floatval(getStartPrijs($_GET["detail"]))){
        header("location: ../detail.php?detail=".$_GET["detail"]."&msg=invalid");
    }
    else{
        global $dbh;
        $stmt = "INSERT INTO boden (voorwerpnummer, bod, gebruikersnaam)
                  Values(".$_GET["detail"].", ".$_POST["bod"].", '".$_SESSION["username"]."')";
        $query = $dbh ->prepare($stmt);
        $query->execute();

        echo $_GET["detail"].$_POST["bod"].$_SESSION["username"];
        header("location: ../detail.php?detail=".$_GET["detail"]."&msg=bodGeplaatst");
    }
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
else{
    header('location:  ../404.php?');
    exit();
}
