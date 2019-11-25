<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <header>
            <nav class="nav-wrapper warmSand">
                <div class="container">
                    <a href="Test.html" class="brand-logo">Logo placeholder</a>
                    <a href="" class="sidenav-trigger" data-target="mobile-menu">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="Test.html">Home</a></li>
                    </ul>
                    <ul class="sidenav grey lighten-2" id="mobile-menu">
                        <li><a href="Test.html">Home</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <section class="section container center" id="loginForm">
            <div class="row">
                <div class="col s12 l4 offset-l4">
                    <div class="card">
                        <div class="card-action warmSand darken-2 white-text">
                            <h3 class="center">Inloggen</h3>
                        </div>
                        <div class="card-content">
                            <form action="../helpers/loginScript.php" target="">
                            <div class="form-field">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" id="username">
                            </div><br>
                            <div class="form-field">
                                <label for="password">Wachtwoord</label>
                                <input type="password" id="password">
                            </div><br>
                            <div class="form-field">
                                <label>
                                <input type="checkbox" id="remember"/>
                                <span>Wachtwoord onthouden?</span>
                                </label>
                            </div><br>
                            <div class="form-field">
                                <button class="btn-large warmSand darken-2">Inloggen</button>
                            </div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
    </body>
</html>