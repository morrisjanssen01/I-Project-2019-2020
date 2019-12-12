<!DOCTYPE html>
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
        text-align: center;
	}
	div{
		margin:10%;
		padding:5%;
		background-color: white;
		display: flex;
		flex-direction: column;
	}
	img{
		width: 150px;
		height: 150px;
		align-self: center;
	}
	a{
		width: 50%;
		height: 40px;
		align-self: center;
		margin-top: 75px;
        background-color: #5F4B8B;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        text-align: center;
        padding-top: 20px;
    }
    p{
        text-align:center;
    }
</style>
<body>
<div>
<img src="../images/Logo.png">
<container style="align-self: center;">
    <h1>Activeer uw EenmaalAndermaal account!</h1>
    <p>Dank U voor uw aanmelding op EenmaalAndermaal</p><br>
    <p>Uw verificatie code is:</p><br>' . $_SESSION['verificationcode'] . '<br><br>
    <p>M.V.G.</p><br>
    <p>Team EenmaalAndermaal</p>
</container>
    


</div>

</body>
</html>