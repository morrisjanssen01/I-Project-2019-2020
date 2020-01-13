<?php
include 'helpers/redirect.php';
if(isset($_SESSION['verkoper'])){
    header('location: https://www.youtube.com/watch?v=dQw4w9WgXcQ&feature=youtu.be&t=22')
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
    <?php  if(isset($_GET['msg'])){
                if($_GET['msg'] == 'true'){
                    echo '<p>'.$_SESSION['codePost'].'</p>';
                    }
            } ?>
        <div class="wrappper" style="height:100%;">
            <div class="box header">
                <?php include 'includes/header.php'; ?>
            </div>
            <div class="box content" style="width:100%">
                <section class="section container center" id="loginForm">
                    <div class="row">
                        <div class="col s12 l4 offset-l4">
                            <div class="card">
                                <div class="card-action warmSand darken-2 white-text">
                                    <h3 class="center">Wordt Verkoper</h3>
                                </div>
                                <div class="card-content">
                                    <form action="helpers/becomeSellerScript.php" method="post">
                                        <div class="form-field">
                                            <label for="bank">Bank</label>
                                            <input type="text" name="bank" id="bank" pattern="[a-z,A-Z\s]{1,50}" required>
                                        </div>
                                        <div class="form-field">
                                            <label for="bankNr">Rekening Nummer</label>
                                            <input type="text" name="bankNr" id="bankNr" pattern="NL[0-9]{2,2}[A-Z]{4,4}[0-9]{10,10}" required>
                                        </div>
                                        <div class="form-field">
                                            <label for="questionList">Verificatiemethode</label>
                                            <select name="questionList" id="questionList" required>
                                                <option value="option1" selected>Creditkaart</option>
                                                <option value="option2">Post</option>
                                            </select>
                                        </div>
                                        <div class="group" id="option1">
                                            <div class="form-field">
                                                <label for="creditcard">Creditkaart</label>
                                                <input type="text" name="creditcard" id="creditcard" pattern="[0-9]{13,16}" >
                                            </div><br>
                                            <div class="form-field">
                                                <button class="btn-large warmSand darken-2" name="submitCredit" id="submitCredit">Verifieer</button>
                                            </div><br>
                                        </div>
                                        <div class="group" id="option2">
                                            <br><h6>Via deze wijze zult u uw verificatiecode ontvangen in de post.</h6><br>
                                            <button class="btn-large warmSand darken-2" name="submitPost" id="submitCredit">Stuur code</button><br><br>
                                            <p>Al een verificatiecode ontvangen in de post?<p>
                                            <p>Klik dan <a class="modal-trigger" href="#modal1" target>hier</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div id="modal1" style="width:25%;" class="modal">
                    <form action="helpers/becomeSellerScript.php?codeSent=true" method="post">
                            <div class="modal-header" style="margin-top:3%; margin-bottom:10%;">
                                <h4 class="center">Verificatie</h4>
                            </div>
                            <div class="modal-content" style="padding-top:0;">
                                <div class="input-field">
                                    <label>Verificatiecode</label><br><br>
                                    <div class="row">
                                        <div class="col s11" style="padding:0;">
                                            <input type="text" name="verificationCode" id="verificationCode" pattern="[0-9]{6,6}">
                                        </div>
                                    </div>                            
                                </div>
                                <div class="modal-footer">
                                    <div class="right" style="margin-top:10%;">
                                        <a class="modal-close waves-effect waves-green btn-flat">Terug</a>
                                        <button type="submit" class="waves-effect  btn-flat warmSand darken-2">Verifieer</a></button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                $(document).ready(function(){
                    $('select').formSelect();
                });
                $(document).ready(function(){
                   $('.modal').modal();
                });
                $(document).ready(function () {
                    $('.group').hide();
                    $('#option1').show();
                    $('#questionList').change(function () {
                    $('.group').hide();
                    $('#'+$(this).val()).show();
                    })
                });
            </script>
            <?php
                if($_GET['msg'] == 'emptyCredit'){
                    popupMessage('Voer een creditkaartnummer in!');
                }
                if($_GET['msg'] == 'invalidCredit'){
                    popupMessage('Voer een geldig creditkaartnummer in!');
                }
                if($_GET['msg'] == 'emptyCode'){
                    popupMessage('Voer een verificatiecode in!');
                }
                if($_GET['msg'] == 'invalidCode'){
                    popupMessage('Voer een geldige verificatiecode in!');
                }
                if($_GET['msg'] == 'wrongCode'){
                    popupMessage('Verkeerde verificatiecode. Controleer uw code en probeer het opnieuw!');
                }
            ?>
        </div>
    </body>
</html>