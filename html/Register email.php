<!DOCTYPE html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php include '../includes/header.php'; ?> 
         <!-- e-mail invullen van de site -->  
        <section class="section container center" id="loginForm">
            <div class="row">
                <div class="col s12 l4 offset-l4">
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
                            <div class="form-field">
                                <button class="btn-large warmSand darken-2">Stuur verificatie mail</button>
                                </div><br> 
                                <div class="form-field">
                            <button class="btn-large warmSand darken-2">e-mail niet ontvangen</button>                   
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
                            <li>Vul uw e-mailadres in.</li>
                            <li>Ga naar uw mailbox en vul de code in die in de mail staat op de volgende pagina.</li>
                            <li>Indien u de mail niet heeft ontvangen druk op de knop e-mail niet ontvangen daarna herhaal stap 2</li> 
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

<!-- deze pagina heeft een kapotte footer --> 