<?php
require ("helpers/redirect.php");
if(isset($_SESSION["username"])){
    rickRoll();
}


?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.css">
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="wrappper" style="height:100%;">
            <div class="box header">
                <?php include 'includes/header.php';
                ?>
            </div>
            <div class="box content">
                <section class="section container center" id="loginForm">
                    <div class="row">
                        <div class="col s12 l4 offset-l4">
                            <div class="card">
                                <div class="card-action warmSand darken-2 white-text">
                                    <h3 class="center">Inloggen</h3>
                                </div>
                                <div class="card-content">
                                    <form action="helpers/loginScript.php" method="post">
                                        <div class="form-field">
                                            <label for="username">Gebruikersnaam</label>
                                            <input type="text" name="username" id="username">
                                        </div><br>
                                        <div class="form-field">
                                            <label for="password">Wachtwoord</label>
                                            <input type="password" name="password" id="password">
                                            
                                        </div><br>
                                        <div class="form-field">
                                            <label>
                                                <input type="checkbox" name="remember"/>
                                                <span>Wachtwoord onthouden?</span>
                                            </label>
                                        </div><br>
                                        <div class="form-field">
                                            <button class="btn-large waves-effect waves-warmSand warmSand darken-2" name="submit" id="submit">Inloggen</button>
                                        </div><br>
                                    </form>
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
            </script>
            <?php
                if($_GET['msg'] == 'emptyUidPass'){
                    popupMessage('Gebruikersnaam en/of wachtwoord niet ingevuld!');
                }
                else if($_GET['msg'] == 'specialChars'){
                    popupMessage('Onrechtmatig gebruik van speciale tekens!');
                }
                else if($_GET['msg'] == 'nonExisting'){
                    popupMessage('Gebruiker bestaat niet!');
                }
                else if($_GET['msg'] == 'wrongPass'){
                    popupMessage('Verkeerd wachtwoord. Probeer het opnieuw!');
                }
                else if($_GET['msg'] == 'loggedOut'){
                    popupMessage('Log in om deze actie voort te zetten!');
                }
                else if($_GET['msg'] == 'successSeller'){
                    popupMessage('Verificatie Geslaagd. Log opnieuw in alstublieft!');
                }
            ?>
        </div>
    </body>
</html>