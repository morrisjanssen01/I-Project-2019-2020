<?php
include 'helpers/redirect.php';


function loadForm(){
    if(!isset($_SESSION["prevPost"])){
        echo'
            <form action="helpers/offerItemScript.php" method="post">       
                <div class="form-field">
                    <label for="title">titel*</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div class="row"> 
                    <div class="col s6 form-field">
                        <label for="description">beschrijving*</label>
                        <input type="text" name ="beschrijving" id="beschrijving" required>
                    </div>
                    <div class="col s6 form-field">
                        <label for="starting_price">startprijs*</label><br>
                        <div class="dollar">
                            <input type="number" name="starting_price" id="starting_price" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 form-field">
                        <label for="payment_method">betalingswijze*</label>
                        <input type="text" name="payment_method" id="payment_method" required>
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
                    <label for="runtime">looptijd*</label>
                    <input type="text" name="runtime" id="runtime" title="vul een geldige postcode in" required>
                </div> <br>
                <div class="col s6 form-field">
                <label for="image">afbeelding*</label>
                <input type="file" name="image" id="image" required>
            </div> <br>
                </div>
                <label><span>Velden met * zijn verplicht</span></label>
                <div class="form-field">
                    <button class="btn-large warmSand darken-2" name="submit" id="submit">Registreer</button>
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
                <?php include 'includes/header.php'; 
                //print_r($_SESSION);?> 
            </div>
            <div class="box content">
                <!-- Registreer stuk van de site --> 
                <section class="section container center" id="loginForm">
                    <div class="row">
                        <div class="col s12 l6 offset-l3">
                            <div class="card">
                                <div class="card-action warmSand darken-2 white-text">
                                    <h3 class="center">Veiling maken</h3>
                                    <!-- maakt de vragenknop aan (verander brown om de kleur te veranderen)-->   
                                    <a class="waves-effect waves-light brown btn modal-trigger"  href="#modal1" > Vragen?</a> 
                                </div>
                                <div class="card-content">
                            <?php loadForm(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>    
                <!-- structuur vraag knop --> 
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Hoe registreert u zich?</h4> 
                        <p> 
                            <ol>
                                <li>Kies een unieke gebruikersnaam.</li>
                                <li>Kies een goed wachtwoord.</li>
                                <li>Onthoud het wachtwoord en herhaal het wachtwoord dat u gekozen heeft.</li>
                                <li>Vul up personalia in.</li>
                                <li>Kies een beveiligingsvraag.</li> 
                                <li>Vul een antwoord in op de beveiligingsvraag</li>
                                <li>Lees de voorwaarden die verbonden zijn aan het registreren.</li> 
                                <li>Wanneer u met de voorwaarden akkoord gaat, vink de akkoordknop onder aan het scherm aan.</li> 
                                <li>Druk op de Registreer-knop. </li>
                            </ol> 
                        </p>
                    </div>
                    <div class="modal-footer"> 
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Terug naar de Registreer-pagina</a>
                    </div>
                </div>
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
                // Vragen knop
                $(document).ready(function(){
                   $('.modal').modal();
                });
                //datepicker
                /* $(document).ready(function(){
                   $('.datepicker').datepicker();
                 });  */
                 $(document).ready(function() {
                    $('.datepicker').datepicker({
                        format: 'yyyymmdd',
                    });
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
            else if($_GET['msg'] == 'noVerification'){
                popupMessage('Vul de verificatiecode correct in');
            }
            else if($_GET['msg'] == 'specialChars'){
                popupMessage('Onrechtmatig gebruik van speciale tekens');
            }
            else if($_GET['msg'] == 'noRepeatPass'){
                popupMessage('Herhalend wachtwoord klopt niet');
            }
            else if($_GET['msg'] == 'redundantUsername'){
                popupMessage('Deze gebruikersnaam is al in gebruik');
            }
            ?>
        </div>
    </body>
</html>
