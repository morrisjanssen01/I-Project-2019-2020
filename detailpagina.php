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
                    <div class="col s4">  
                        <img src="images/rickastley.jpg">
                        <h1>Title</h1>
                    </div>
                    <div class="col s8">
                        <h1>veilerinfo<h1>
                        <div class="row">
                            <div class="col 7">
                                <h3>naam veiler</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col 12">
                                <h3>info verkoper</h3>
                                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac aliquam nisl, quis faucibus leo. Aliquam erat volutpat. Morbi non mi molestie, condimentum turpis dictum, dignissim elit. Morbi porttitor egestas sodales. Maecenas sollicitudin aliquet dictum. Phasellus tellus tellus, gravida ut hendrerit a, convallis vel risus. Cras vitae elementum sem. Pellentesque vitae malesuada ex. Maecenas odio leo, suscipit nec quam quis, condimentum facilisis augue. Suspendisse potenti. Quisque non lectus sit amet est porttitor aliquet sit amet et lacus. Duis semper at metus id accumsan. Proin neque metus, ultricies ut leo quis, semper porttitor magna. Nulla vehicula lorem ante.</h5>
                            </div>
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