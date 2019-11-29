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
                                <label for="mailadress">E-mail</label>
                                <input type="text" name= "mailadress" id="mailadress"> 
                            </div><br>
                            <div class="card-content">
                                <div class="form-field">
                                    <label for="username">Gebruikersnaam</label>
                                    <input type="text" name="username" id="username">
                                </div><br>
                                <div class="form-field">
                                    <label for="password">Wachtwoord</label>
                                    <input type="password" name ="password" id="password">
                                </div><br>
                                <div class="form-field">
                                    <label for="repeat password">Bevestig Wachtwoord</label>
                                    <input type="password" name="repeat password" id="repeat password">
                                    <div class="form-field">
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
                            <div class="form-field">
                            <button class="btn-large warmSand darken-2">e-mail niet ontvangen</button>
                            </div><br> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <!-- structuur vraag knop --> 
          <div id="modal1" class="modal">
                     <div class="modal-content">
                       <h4>Registreer handleiding</h4> 
                        <p> 
                          <ol>
                            <li>Vul uw e-mailadres in.</li>
                            <li>Ga naar uw mailbox en klik op de link die in de mail staat. Daarna ga naar stap 4 (indien u de mail niet heeft ontvangen, ga naar stap 3)</li>
                            <li>Indien u de mail niet heeft ontvangen druk op de e-mail niet ontvangenknop daarna herhaal stap 2</li> 
                            <li>Kies een unieke gebruikersnaam.</li>
                            <li>Kies een goed wachtwoord.</li>
                            <li>Onthou het wachitwoord en herhaal het wachtwoord dat u gekozen heeft.</li>
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