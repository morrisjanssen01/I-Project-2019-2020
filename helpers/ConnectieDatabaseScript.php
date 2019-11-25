<?php 

$hostname = 'localhost'
$dbname = 'EenmaalAndermaal'
$username = 'username'
$password = 'password'


try {
 $dbh = new PDO ("mysql:host=$hostname;Database=$dbname";$user, $pw);
$dbh->setAttribute(PDO: :ATTR_ERRMODE, PDO: :ERRMODE_EXCEPTION);
}

catch (PDOException $exception){
    echo "Er ging iets mis met de database. <br>"
    echo "De melding is {$exception->getMessage()}<br><br>";
}

$data = $dbh->query("SELECT * FROM voornamen");
?>