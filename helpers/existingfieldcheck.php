<?php
 require("connectionDatabaseScript.php");
 
 function fieldExist($value, $rowname, $tablename){
    //connectionDatabase();
    global $dbh;
    $sql = $dbh->prepare('SELECT * FROM '.$tablename.' where '.$rowname.' = ?');
    $sql->execute(array($value));
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $accountExist = is_array($result);
    if($accountExist){
        return true;
    }
    else{
        return false;
    }
 }
 rickRoll();
