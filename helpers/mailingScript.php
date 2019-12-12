<?php
require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");
include("redirect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$_SESSION["postedData"]=$_POST;
}

for($i=0; $i<6; $i++){
	$randomNumber = random_int(0,9);
	$verificationcode = $verificationcode . $randomNumber;
}
$_SESSION["verificationcode"]=$verificationcode;
$_SESSION["e-mail"]=$_POST['mailaddress']; 
$email = 'Dank U voor uw aanmelding op EenmaalAndermaal,<br>' . $_SESSION["e-mail"] . '.<br> <br>' .
'hier is uw verificatiecode: ' . $_SESSION['verificationcode'] .'<br> <br>' .
'M.V.G.<br>Team EenmaalAndermaal'; 

$to = $_SESSION['e-mail']; 
//'coen.klabbers@gmail.com';
//'desktopmorris@outlook.com';
$subject = "Activeer uw Eenmaal Andermaal account";
$headers = "From: noreply@EenmaalAndermaal.com\r\n"; 
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "Reply-To: The Sender <info@icasites.nl>\r\n";
$headers .= "Return-Path: The Sender <info@icasites.nl>\r\n";
$headers .= "Organization: icasites\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
mail($to, $subject, $email, $headers);

redirect(register);
?> 

<!-- Een andere methode is: --> 

<?php 
/*
$subject = 'Dit is de titel van het test bericht'; 
$email = 'Dit is de inhoud van het test bericht'; 
$to = 'servicedesk@realhosting.nl'; 
$from = 'servicedesk@realhosting.nl'; ini_set('sendmail_from', $from); 
$headers   = array(); 
$headers[] = "MIME-Version: 1.0"; 
$headers[] = "Content-type: text/plain; charset=iso-8859-1"; 
$headers[] = "From: Realhosting Servicedesk <{$from}>"; 
$headers[] = "Reply-To: Realhosting Servicedesk <{$from}>"; 
//$headers[] = "Subject: {$subject}"; 
$headers[] = "X-Mailer: PHP/".phpversion(); 
mail($to, $subject, $email, implode("\r\n", $headers) ); 


header(location:"register.php");
*/
?>
