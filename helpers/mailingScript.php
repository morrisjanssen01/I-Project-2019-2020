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
print_r($_SESSION);
$subject = 'Welkom op EenmaalAndermaal'; 
$email = 'Dank U voor uw aanmelding op EenmaalAndermaal.' . '<br> <br>' .
'hier is uw verificatiecode: ' . $_SESSION['verificationcode'] .'<br> <br>' .
'M.V.G.<br>Team EenmaalAndermaal'; 
$to = 'coen.klabbers@gmail.com';
//$_SESSION['e-mail']; 
$from = 'EenmaalAndermaal@noreply.com'; 
$headers   = array(); 
$headers[] = "MIME-Version: 1.0"; 
$headers[] = "Content-type: text/plain; charset=iso-8859-1"; 
$headers[] = "From: EenmaalAndermaal Servicedesk <{$from}>"; 
$headers[] = "Reply-To: Realhosting Servicedesk <{$from}>"; 
//$headers[] = "Subject: {$subject}"; 
$headers[] = "X-Mailer: PHP/".phpversion(); 
mail($to, $subject, $email, implode("\r\n", $headers), "-f".$from );

//redirect(register);
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
