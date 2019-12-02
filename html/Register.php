<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <?php include '../includes/header.php'; ?> 
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
                        <form action="../helpers/RegistrerenScript.php" method="post">        
                            <div class="form-field">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" name="username" id="username">
                            </div><br>
                            <div class="form-field">
                                <label for="password">Wachtwoord</label>
                                <input type="password" name ="password" id="password">
                            </div>
                            <div class="form-field">
                                <label for="repeat password">Bevestig Wachtwoord</label>
                                <input type="password" name="repeat password" id="repeat password">
                                <div class="form-field">
                            </div><br>
                            <div class="form-field">
                            <label for="firstName">Voornaam</label>
                                <input type="text" name="firstName" id="firstName">
                            </div>
                            <div class="form-field">
                            <label for="lastName">Achternaam</label>
                                <input type="text" name="lastName" id="lastName">
                            </div><br>
                            <div class="form-field">
                            <label for="adress1">Adres 1</label>
                                <input type="text" name="adress1" id="adress1">
                            </div>
                            <div class="form-field">
                            <label for="adress2">Adres 2</label>
                                <input type="text" name="adress2" id="adress2">
                            </div><br>
                            <div class="form-field">
                            <label for="postalCode">Postcode</label>
                                <input type="text" name="postalCode" id="postalCode">
                            </div>
                            <div class="form-field">
                            <label for="city">Plaatsnaam</label>
                                <input type="text" name="city" id="city">
                            </div><br>
                            <div class="form-field">
                            <label for="land">Land</label>
                                <input type="text" name="land" id="land">
                            </div><br>
                            <div class="form-field">
                            <label for="birthDate">Geboortedag</label>
                                <input type="text" id="birthDate" class="datepicker"> 
                            </div><br>
                            <div class="form-field">
                            <label for="questionList">Vragen</label>
                                <select>
                                     <option value="" disabled selected>Kies uw beveiligingsvraag</option>
                                     <option value="1">Hoe heet uw huisdier?</option>
                                     <option value="2">Wat is uw geboorteplaats</option>
                                     <option value="3">Wat is de naam van uw oude basisschool</option>
                                </select>    
                            </div><br>
                            <div class="form-field">
                            <label for="answer">Antwoord</label>
                                <input type="text" name="answer" id="answer">
                            </div><br>
                                <label>
                                <input type="checkbox" id="remember"/>
                                <span>Akkoord met Voorwaarden</span>
                                </label>
                            </div><br>
                            <div class="g-recaptcha" style="margin-left:20%; margin-bottom:5%;" data-sitekey="6Ld5H8UUAAAAAMr3EOrfgpBEQBpfv2X3yvPnR54V"></div>
                            <div class="form-field">
                                <button class="btn-large warmSand darken-2" name="submit" id="submit">Registreer</button>
                            </div><br>
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
        <?php include '../includes/footer.php'; ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
            // Vragen knop
            $(document).ready(function(){
               $('.modal').modal();
            });
            //datepicker
            $(document).ready(function(){
             $('.datepicker').datepicker();
             });
             //multiselect
             $(document).ready(function(){
             $('select').formSelect();
             });
        </script>
      </body>
</html>
<?php

if(isset($_POST['submit'])){
    function CheckCaptcha($userResponse){
        $fields_string = '';
        $fields = array(
            "secret" => "6Ld5H8UUAAAAALhODoTx6h90-YsgL4KAd0wltr4H",
            "response" => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recatcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }

    //Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if($result['success']){
        //If the user has checked the captcha box
        echo "Captcha verified Successfully";
    }
    else{
        //If the CAPTCHA box wasn't checked
        echo '<script>alert("Error Message");</script>';
    }
    }
?>
<!-- 2de knop maken die een 2de mail stuurd doormiddel van een knop e-mail niet ontvangen of een knop E-mail binnen 5 min niet ontvangen
