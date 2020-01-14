<?php
    require("includes/cardScript.php");
    //require("helpers/redirect.php");
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
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/Tech banner.jpg" alt="Technologie"></a>
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/Mode banner.jpg" alt="Mode"></a>
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/Interieur banner.jpg" alt="Interieur"></a>
                    <a href="#" class="carousel-item" style="width:75%; height:100%;"><img style="height:100%;" src="images/Auto's banner.jpg" alt="Auto's"></a>
                </div>
                <div class="container">
                <div class="card" style="margin-bottom:0; margin-top:0%;">
                    <?php  loadCardBatch(6 , 'laatse kans', 'laatse kans');
                    
                    //ja het klopt hier mist een div! niet toevoegen! anders breekt het! danku!?>
                
            </div>   
            <div class="container">
                <div class="card" style="margin-bottom:0; margin-top:0%;">
                    <?php loadCardBatch(6, 'koopjes', 'Koopjes!');

                    //ja het klopt hier mist een div! niet toevoegen! anders breekt het! danku! ?>
            </div>
            <div class="container">                
                <div class="card">
                    <?php  loadCardBatch(3 , 'pumps', 'Overige Kleding');

                    //ja het klopt hier mist een div! niet toevoegen! anders breekt het! danku! ?>
            </div>  
            <div class="container">
                <div class="card">
                    <?php loadCardBatch(3, 'overige kleding', 'sokken') 
                    
                    //ja het klopt hier mist een div! niet toevoegen! anders breekt het! danku!?>
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
        else if($_GET['msg'] == 'logInSuccess'){
            popupMessage('U bent succesvol ingelogd!');
        }
        else if($_GET['msg'] == 'logOutSuccess'){
            popupMessage('U bent succesvol uitgelogd!');
        }
        else if($_GET['msg'] == 'offerSuccess'){
            popupMessage('Veiling Geplaatst!');
        }
        ?>
    </body>
</html>