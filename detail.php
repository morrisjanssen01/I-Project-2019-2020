<?php


?>



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
                <div class="row">
                    <div class="col s3" style="padding:0;">
                        <h1>Title</h1>
                        <img src="images/rickastley.jpg" style="max-width:100%">
                        <h3>beschrijving product</h3>
                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac aliquam nisl, quis faucibus leo. Aliquam erat volutpat. Morbi non mi molestie, condimentum turpis dictum, dignissim elit. Morbi porttitor egestas sodales. Maecenas sollicitudin aliquet dictum. Phasellus tellus tellus, gravida ut hendrerit a, convallis vel risus. Cras vitae elementum sem. Pellentesque vitae malesuada ex. Maecenas odio leo, suscipit nec quam quis, condimentum facilisis augue. Suspendisse potenti. Quisque non lectus sit amet est porttitor aliquet sit amet et lacus. Duis semper at metus id accumsan. Proin neque metus, ultricies ut leo quis, semper porttitor magna. Nulla vehicula lorem ante.</h5>
                    </div>
                    <div class="col s4 offset-s1" style="border-right-style:solid; border-left-style:solid; height:100%;">
                        <h1>Naam Verkoper</h1>
                        <h5>Plaatsnaam, Postcode, Land</h5>
                        <h5>E-mailadres</h5>
                        <div style="margin-top:30%;">
                            <h5>looptijd</h5>
                        </div>
                        <div style="margin-top:40%;">
                            <form action="biedScript.php?" method="POST">
                                <div class="form-field">
                                    <label for="bod">Bod</label>
                                    <input type="text" name="bod" id="bod" placeholder="5.00">
                                </div>
                                <div class="form-field">
                                    <button class="btn-large warmSand darken-2 right" name="submit" id="submit">Bieden</button>
                                </div>
                            </form><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                    <div class="col s3 offset-s1 ">
                        <div style="border-style:solid;">
                            <h5>Bod Geschiedenis</h5>
                            <div class="white" style="border-top-style:solid; border-bottom-style:solid">
                                <h5>TheEdgyDylan</h5><p>5.00</p>

                            </div>
                        </div>
                        <div style="border-style:solid; margin-top:5%">
                            <h5>Huidige Bod</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box footer">
                <?php include 'includes/footer.php';?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.js"></script>
        <script>
            $(document).ready(function(){
            $('.sidenav').sidenav();
            });
        </script>
    </body>
</html>