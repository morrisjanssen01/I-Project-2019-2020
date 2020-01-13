<?php
include 'helpers/redirect.php';
include 'helpers/connectionDatabaseScript.php';
/*if(isset($_SESSION['username'])){
    global $dbh;
    global $seller;
    $querystring = "SELECT verkoper FROM Gebruikers WHERE gebruikersnaam = '" . $_SESSION['username'] . "'";
    $user = "'".$_SESSION['username']."'";
    $sql = $dbh->prepare($querystring);
    var_dump($querystring);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    if($result == 0){
        $seller = false;
    }else if($result == 1){
        $seller = true;
    }
    if($result == 0){
        header("Location: BecomeSeller.php?msg=noSeller");
    }
} */

if(!isset($_SESSION['username'])){
    header("Location: login.php?msg=loggedOut");
}
else {
    header("Location: BecomeSeller.php?msg=noSeller");
}

function loadForm(){
    if(!isset($_SESSION["prevPost"])){
        echo'
            <form action="includes/offerItemScript.php" enctype="multipart/form-data" method="post">       
                <div class="form-field">
                    <label for="title">titel*</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div class="row"> 
                    <div class="col s6 form-field">
                        <label for="description">beschrijving*</label>
                        <input type="text" name ="description" id="discription" required>
                    </div>
                    <div class="col s6 form-field">
                        <label for="starting_price">startprijs*</label><br>
                        
                            <input type="number" name="starting_price" id="starting_price" placeholder="€5.00" required>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 form-field">
                        <label for="payment_method">betalingswijze*</label>
                        <select name="payment_method" id="payment_method" required>
                            <option value="Contant" selected>Contant</option>
                            <option value="IDeal">IDeal</option>
                        </select>
                    </div>
                    <div class="col s6 form-field">
                        <label for="payment_instruction">betalingsinstructie*</label>
                        <input type="text" name="payment_instruction" id="payment_instruction" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 form-field">
                        <label for="place">plaatsnaam*</label>
                        <input type="text" name="place" id="place" required>
                    </div>
                    <div class="col s6 form-field">
                        <label for="country">land*</label>
                        <input type="text" name="country" id="country" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 form-field">
                        <label for="sending_cost">verzendkosten</label>
                        <input type="number" name="sending_cost" id="sending_cost">
                    </div>
                    <div class="col s6 form-field">
                        <label for="sending_instruction">verzendinstructies</label>
                        <input type="text" name="sending_instruction" id="sending cost">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 form-field">
                    <label for="runtime">looptijd*</label>
                    <select name="runtime" id="runtime" required>
                            <option value="3" selected>3 Dagen</option>
                            <option value="5">5 Dagen</option>
                            <option value="7">7 Dagen</option>
                            <option value="10">10 Dagen</option>
                            <option value="12">12 Dagen</option>
                        </select>
                    </div> <br>
                <div class="col s6 form-field">
                    <label for="image">afbeelding*</label>
                    <input type="file" name="image" id="image" required>
            </div> <br>
                </div>
                <label><span>Velden met * zijn verplicht</span></label>
                <div class="form-field">
                    <button class="btn-large waves-effect waves-warmSand warmSand darken-2" name="submit" id="submit">Registreer</button>
                </div>
                <div class="form-field">
                    <a class="waves-effect waves-warmSand btn-flat">Terug</a>
                </div>
            </form>';
            
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.css">
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="box header">    
                <?php include 'includes/header.php';?> 
            </div>
            <div class="box content">
                <!-- Registreer stuk van de site --> 
                <section class="section container center" id="loginForm">
                    <div class="row">
                        <div class="col s12 l6 offset-l3">
                            <div class="card">
                                <div class="card-action warmSand darken-2 white-text">
                                    <h3 class="center">Veiling maken</h3>
                                </div>
                                <div class="card-content">
                            <?php loadForm(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>    
            </div>
            <div class="box footer">
                <?php include 'includes/footer.php'; ?>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.js"></script>
            <script>
                $(document).ready(function(){
                    $('.sidenav').sidenav();
                });
                $(document).ready(function(){
                    $('select').formSelect();
                });
                // Vragen knop
                $(document).ready(function(){
                   $('.modal').modal();
                });
                //multiselect
                $(document).ready(function(){
                    $('select').formSelect();
                });
            </script>
            <?php
            if($_GET['msg'] == 'emptyFields'){
                popupMessage('Vul alle velden in A.U.B.');
            }
            ?>
        </div>
    </body>
</html>
