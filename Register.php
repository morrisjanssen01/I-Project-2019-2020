<?php
include 'helpers/redirect.php';
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
                                    <h3 class="center">Registreren</h3>
                                    <!-- maakt de vragenknop aan (verander brown om de kleur te veranderen)-->   
                                    <a class="waves-effect waves-light brown btn modal-trigger"  href="#modal1" > Vragen?</a> 
                                </div>
                                <div class="card-content">
                                    <form action="helpers/registerScript.php" method="post">       
                                        <div class="form-field">
                                            <label for="username">Gebruikersnaam</label>
                                            <input type="text" name="username" id="username">
                                        </div>
                                        <div class="row"> 
                                            <div class="col 6 form-field">
                                                <label for="password">Wachtwoord</label>
                                                <input type="password" name ="password" id="password">
                                            </div>
                                            <div class="col 6 form-field">
                                                <label for="repeat password">Bevestig Wachtwoord</label>
                                                <input type="password" name="repeatpassword" id="repeatpassword">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col 6 form-field">
                                                <label for="firstName">Voornaam</label>
                                                <input type="text" name="firstName" id="firstName">
                                            </div>
                                            <div class="col 6 form-field">
                                                <label for="lastName">Achternaam</label>
                                                <input type="text" name="lastName" id="lastName">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col 6 form-field">
                                                <label for="adress1">Adres 1</label>
                                                <input type="text" name="adress1" id="adress1">
                                            </div>
                                            <div class="col 6 form-field">
                                                <label for="adress2">Adres 2</label>
                                                <input type="text" name="adress2" id="adress2">
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col 6 form-field">
                                            <label for="postalCode">Postcode</label>
                                            <input type="text" name="postalCode" id="postalCode">
                                        </div>
                                        <div class="col 6 form-field">
                                            <label for="city">Plaatsnaam</label>
                                            <input type="text" name="city" id="city">
                                        </div>
                                        </div>
                                        <div class="form-field">
                                            <label for="land">Land</label>
                                            <input type="text" name="land" id="land">
                                        </div>
                                        <div class="form-field">
                                            <label for="birthDate">Geboortedag</label>
                                            <input type="text" name="birthdate" id="birthDate" class="datepicker"> 
                                        </div>
                                        <div class="form-field">
                                            <label for="questionList">Vragen</label>
                                            <select name="questionList" id="questionList">
                                                <option value="" disabled selected>Kies uw beveiligingsvraag</option>
                                                <option value="1">Hoe heet uw huisdier?</option>
                                                <option value="2">Wat is uw geboorteplaats</option>
                                                <option value="3">Wat is de naam van uw oude basisschool</option>
                                            </select>    
                                        </div>
                                        <div class="form-field">
                                            <label for="answer">Antwoord</label>
                                            <input type="text" name="answer" id="answer">
                                        </div>
                                        <div class="form-field">
                                            <label for="verification">verificatiecode</label>
                                            <input type="text" name="verificationcode" id="verificationcode">
                                        </div>
                                        <div class="form-field">
                                            <label>
                                                <input type="checkbox" id="remember"/>
                                                <span>Akkoord met Voorwaarden</span>
                                            </label>
                                        </div>
                                        <div class="form-field">
                                            <button class="btn-large warmSand darken-2" name="submit" id="submit">Registreer</button>
                                        </div>
                                    </form>
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
<!-- 2de knop maken die een 2de mail stuurd doormiddel van een knop e-mail niet ontvangen of een knop E-mail binnen 5 min niet ontvangen -->
