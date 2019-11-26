<?php 

$hostname = 'localhost';
$dbname = 'EenmaalAndermaal';
$username = 'username';
$password = 'password';

function ConnectionDatabase($hostname, $dbname, $username, $password) {
try {
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $exception){
    echo "Er ging iets mis met de database. <br>";
    echo "De melding is {$exception->getMessage()}<br><br>";
}
};

?>