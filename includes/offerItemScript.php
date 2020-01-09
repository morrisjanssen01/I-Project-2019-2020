<?php
require '../helpers/connectiondatabasescript.php';
session_start();

$target_dir = "http://iproject5.icasites.nl/pics/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} 
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
} 
if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG & JPEG files are allowed.";
    $uploadOk = 0;
} 
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// vanaf hier gaan we de data in de database zetten.
global $dbh;
$title=$_POST['title'];
$description=$_POST['description'];
$startprijs=$_POST['starting_price'];
$payment_method=$_POST['payment_method'];
$payment_instruction =$_POST['payment_instruction'];
$city=$_POST['place'];
$country=$_POST['country'];
$runtime=$_POST['runtime'];
$sending_price=$_POST['sending_cost'];
$sending_instruction=$_POST['sending_instruction'];

$query = "INSERT INTO voorwerpen (titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, plaatsnaam, land, looptijd,verzendkosten, verzendinstructie, verkoper)
		VALUES( '" .  $title . "', '" . $description . "', '" . $startprijs . "', '" . $payment_method . "', '" . $payment_instruction. "', '" .  $city. "', '" . $country. "', '" .$runtime . "', '" . $sending_price . "', '" . $sending_instruction . "', '" . $_session['username'] . "')";
		$sql = $dbh->prepare ( $query );
		$sql->execute();
		redirect('../html/index');
?>
