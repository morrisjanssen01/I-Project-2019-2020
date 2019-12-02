<?php 

/*$hostname = 'localhost';
$dbname = 'EenmaalAndermaal';
$username = 'username';
$password = 'password'; */

$hostname = 'mssql.iproject.icasites.nl';
$dbname = 'iproject5';
$username = 'iproject5';
$password = 'kFzV56Yuyn';
global $dbh;

function ConnectionDatabase() {
try {
    /*$hostname = 'mssql.iproject.icasites.nl';
    $dbname = 'iproject5';
    $username = 'iproject5';
    $password = 'kFzV56Yuyn'; */
    
    Global $dbh;
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $exception){
    echo "Er ging iets mis met de database. <br>";
    echo "De melding is {$exception->getMessage()}<br><br>";
}
};
?>