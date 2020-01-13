<?php 

/*$hostname = 'localhost';
$dbname = 'EenmaalAndermaal';
$username = 'username';
$password = 'password'; */

global $hostname;
global $dbname;
global $username;
global $password;
global $dbh;
global $verificationcode;

//function connectionDatabase() {
    try {
        $hostname = 'mssql.iproject.icasites.nl';
        $dbname = 'iproject5';
        $username = 'iproject5';
        $password = 'kFzV56Yuyn'; 

/* inloggen op mijn lokale database

$hostname = 'localhost';
$dbname = 'EenmaalAndermaal2019';
$username = 'sa';
$password = 'SA'; */
    
        global $dbh;
        $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $exception){
        echo "Er ging iets mis met de database. <br>";
    }
//}