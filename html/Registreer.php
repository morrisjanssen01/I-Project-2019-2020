<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php include '../includes/header.php'; ?>



        <!--  <section class="" id= ""> 
       </section>  -->
    
        
       <a class="waves-effect waves-light btn modal-trigger"  href="#modal1" >Vragen?</a> 

    <!-- structuur vraag knop --> 
      <div id="modal1" class="modal">
       <div class="modal-content">
       <h4>Registreer handleiding</h4> 
            <p> 
       <ol>
          <li>Kies een gebruikersnaam.</li>
          <li>Kies een wachtwoord.</li>
          <li>Herhaal het wachtwoord dat u gekozen heeft.</li>
          <li>Lees de voorwaarden die verbonden zijn aan het registreren.</li> 
          <li>Als u de voorwaarden gelezen heeft en u hiermee akkoord gaat vink de akkoordknop onder aan het scherm aan.</li> 
          <li>Druk op de Registreer knop. </li>
        </ol> 
            </p>
       </div>
        <div class="modal-footer"> 
             <a href="#!" class="modal-close waves-effect waves-green btn-flat">Terug naar registreerpagina</a>
          </div>
        </div>
        <!-- Registreer stuk van de site --> 
        <section class="section container center" id="loginForm">
            <div class="row">
                <div class="col s12 l4 offset-l4">
                    <div class="card">
                        <div class="card-action warmSand darken-2 white-text">
                            <h3 class="center">Registreren</h3>
                        </div>
                        <div class="card-content">
                          <form action="../helpers/RegistrerenScript.php" method="post">
                            <div class="form-field">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" id="username">
                            </div><br>
                            <div class="form-field">
                                <label for="password">Wachtwoord</label>
                                <input type="password" name = password id="password">
                            </div><br>
                            <div class="form-field">
                                <label for="repeat password">Bevestig Wachtwoord</label>
                                <input type="password" id="repeat password">
                            <div class="form-field">
                            </div><br>
                                <label>
                                <input type="checkbox" id="remember"/>
                                <span>Akkoord met Voorwaarden</span>
                                </label>
                            </div><br>
                            <div class="form-field">
                                <button class="btn-large warmSand darken-2">Registreer</button>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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