<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php include '../includes/header.php'; ?>
        <section class="section container center" id="loginForm">
            <div class="row">
                <div class="col s12 l4 offset-l4">
                    <div class="card">
                        <div class="card-action warmSand darken-2 white-text">
                            <h3 class="center">Registreer</h3>
                        </div>
                        <div class="card-content">
                            <div class="form-field">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" id="username">
                            </div><br>
                            <div class="form-field">
                                <label for="password">wachtwoord</label>
                                <input type="password" id="password">
                            </div><br>
                            <div class="form-field">
                                <label for="repeat password">Herhaal wachtwoord</label>
                                <input type="password" id="repeat password">
                            <div class="form-field">
                            </div><br>
                                <label>
                                <input type="checkbox" id="remember"/>
                                <span>Akkoord met voorwaarden</span>
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
        </script>
    </body>
</html>