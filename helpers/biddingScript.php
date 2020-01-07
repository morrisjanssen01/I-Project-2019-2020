<?php
require ("antiSQLinjectionScript.php");
if(isset($_POST["submit"])){

    global $dbh;

    $bod = $_POST['bod'];

    if(!empty($bod)){


        }
    }
else if(!isset($_GET["detail"]) || empty($_GET["detail"])){
    header('location:  404.php');
    exit();
    }
else if(specialCharacters($_GET)){
    header('location:  404.php');
    }
else{
    header('location:  404.php');
    exit();
}