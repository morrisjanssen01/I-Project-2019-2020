<?php
require("connectionDatabaseScript.php");
require("antiSQLinjectionscript.php");
require("existingfieldcheck.php");
include("redirect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$_SESSION["postedData"]=$_POST;
}
if(fieldExist($_POST["mailaddress"], 'Emailadres', 'gebruikers')){
	redirect("Register email");
	exit();
}
for($i=0; $i<6; $i++){
	$randomNumber = random_int(0,9);
	$verificationcode = $verificationcode . $randomNumber;
}
$_SESSION["verificationcode"]=$verificationcode;
$_SESSION["e-mail"]=$_POST['mailaddress']; 
$email = '<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Verificatie Code EenmaalAndermaal</title>
	</head>
	<style>
		*{
			font-family: Roboto, Helvetica, Arial, sans-serif;
		}
		body{
			background-color: #f0ede5;
		}

		h1{
			font-size: 2em;
			text-align: left;
		}
		div{
			margin:10%;
			padding:5%;
			background-color: white;
			display: flex;
			flex-direction: column;
		}
		img{
			height:10%;
			width: 150px;
			align-self: left;
		}
		a{
			width: 50%;
			height: 40px;
			align-self: left;
			margin-top: 75px;
			background-color: #5F4B8B;
			border-radius: 10px;
			text-decoration: none;
			color: white;
			text-align: left;
			padding-top: 20px;
		}
		p{
			text-align:left;
		}
	</style>
	<body>
		<div>
			<img src="http://iproject5.icasites.nl/images/LogoMini.png"">
			<container style="align-self: left; text-align:left;">
				<h1>Activeer uw EenmaalAndermaal account!</h1>
				<p>Dank U voor uw aanmelding op EenmaalAndermaal</p>
				<p>Uw verificatie code is: ' . $_SESSION['verificationcode'] . '</p><br><br>
				<p>M.V.G.</p>
				<p>Team EenmaalAndermaal</p>
			</container>
		</div>

	</body>
</html>'; 

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

