<?php
    require("includes/cardScript.php");
    require("helpers/redirect.php");
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
        <div class="wrapper">
            <div class="box header">
                <?php include 'includes/header.php';?>
            </div>
            <div class="box content">
                <div class="carousel" style="height:500px;">
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/404.jpg" alt="Rickrolled!!!"></a>
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/404.jpg" alt="Der TEUFEL!!!"></a>
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/404.jpg" alt="ICA ButtPlugg"></a>
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/404.jpg" alt="Vaseline voor de ButtPlugg"></a>
                </div>
                <div class="container">
                <div class="card" style="margin-bottom:0; margin-top:0%;">
                    <?php  loadCardBatch(6 , 'laatse kans', 'laatse kans'); ?>
                </div>
            </div>   
            <div class="container">
                <div class="card" style="margin-bottom:0; margin-top:0%;">
                    <p style="font-size:200%; margin-left:3%;">Koopjes</p>
                    <div class="row">
                        <div class="col s4" style="height:40%;">
                            <figure style='background-image: url("images/404.jpg"); background-repeat: no-repeat; margin:0; width:100%;'>
                                <figcaption>
                                    <a href="details.php?detail="><h5>title</h5></a>
                                    <h5>prijs</h5>
                                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col s4" style="height:30%;">
                            <figure style='background-image: url("images/404.jpg"); background-repeat: no-repeat; margin:0; width:100%;'>
                                <figcaption>
                                    <h5>title</h3>
                                    <h5>prijs</h5>
                                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col s4">
                            <figure style='background-image: url("images/404.jpg"); background-repeat: no-repeat; margin:0; width:100%;'>
                                <figcaption>
                                    <h5>title</h3>
                                    <h5>prijs</h5>
                                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <figure style='background-image: url("images/404.jpg"); background-repeat: no-repeat; margin:0; width:100%;'>
                                <figcaption>
                                    <h5>title</h3>
                                    <h5>prijs</h5>
                                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col s4">
                            <figure style='background-image: url("images/404.jpg"); background-repeat: no-repeat; margin:0; width:100%;'>
                                <figcaption>
                                    <h5>title</h3>
                                    <h5>prijs</h5>
                                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col s4">
                            <figure style='background-image: url("images/404.jpg"); background-repeat: no-repeat; margin:0; width:100%;'>
                                <figcaption>
                                    <h5>title</h3>
                                    <h5>prijs</h5>
                                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">                
                <div class="card">
                    <?php  loadCardBatch(3 , 'pumps', 'Pumps'); ?>
                </div>
            </div>  
            <div class="container">
                <div class="card">
                    <?php loadCardBatch(3, 'overige kleding', 'Overige Kleding') ?>
                </div>
            </div>
                <div id="modal1" class="modal coconutMilk" style="width:30%; height:30%">
                    <form action="biedScript.php?$_POST" style="margin-bottom:10%;">
                        <div class="modal-header" style="margin-top:3%; margin-bottom:5%;">
                            <h4 class="center">Bieden op "title"</h4>
                        </div>
                        <div class="modal-content" style="padding-top:0;">
                            <div class="input-field">
                                <label>Bedrag:</label><br><br>
                                <div class="row">
                                    <div class="col s1" style="padding:0;">
                                        <p>€</p>
                                    </div>
                                    <div class="col s11" style="padding:0;">
                                        <input placeholder="0,00" id="firstname" type="number" min="5" value="5.00" step="1">
                                    </div>
                                </div>                            
                            </div>
                            <div class="right" style="margin-top:10%;">
                                <a class="modal-close waves-effect waves-green btn-flat">Terug</a>
                                <button type="submit" class="waves-effect  btn-flat warmSand darken-2">Bieden</a></button>
                            </div>
                        </div>
                    </form>
                </div>      
                <div id="cookieConsent">
                    <div id="closeCookieConsent">x</div>
                    Deze website maakt gebruik van cookies. <a href="#" target="_blank">Meer info</a>. <a class="cookieConsentOK">Akkoord</a>
                </div>
            </div> 
            <div class="box footer">
                <?php include 'includes/footer.php';?>
            </div>
        </div>        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){   
                setTimeout(function () {
                    $("#cookieConsent").fadeIn(0);
                }, 500);
                $("#closeCookieConsent, .cookieConsentOK").click(function() {
                $("#cookieConsent").fadeOut(200);
                }); 
            });
        </script>
        <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.carousel').carousel();
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.modal').modal();
            });
        </script>
        <?php
        if($_GET['msg'] == 'successAccount'){
            popupMessage('Account aangemaakt!');
        }
        ?>
    </body>
</html>