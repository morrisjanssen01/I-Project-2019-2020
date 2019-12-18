<?php

    require("helpers/antiSQLinjectionScript.php");
    require("helpers/connectionDatabaseScript.php");

    if(!isset($_GET["detail"]) || empty($_GET["detail"])){
        header('location:  404.php');
        exit();
    }
    else if(specialCharacters($_GET)){
        header('location:  404.php');
    }
    else{
        $voorwerpnummer = $_GET["detail"];
        
        $stmt = $dbh->prepare("SELECT * FROM voorwerpen WHERE voorwerpnummer = :voorwerpnummer");
       
        $stmt3 = $dbh->prepare("select emailadres
                                from gebruikers
                                where gebruikersnaam IN (select gebruikersnaam from voorwerpen
                                where voorwerpnummer = :voorwerpnummer)");

        $stmt->execute(array($voorwerpnummer));
        $voorwerp = $stmt->fetch(PDO::FETCH_ASSOC);
       
        
    }
    

    function loadBidding(){
        global $dbh;
        $stmt2 = $dbh->prepare("SELECT bod FROM boden WHERE voorwerpnummer = :voorwerpnummer group by bod order by bod desc");
        $stmt2->execute(array($voorwerpnummer));
        $boden = $stmt2->fetch(PDO::FETCH_ASSOC);

        print_r($boden);
    }

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
                    <div class="col s4" style="padding:0;">
                     <?php  echo" <h4>".$voorwerp["titel"]."</h4>" ?>
                        <img src="images/404.jpg" alt="voorwerp" style="max-width:100%">
                        <h3>beschrijving product</h3>
                        <?php  echo" <iframe width='375' height='375' srcdoc='". htmlspecialchars($voorwerp["beschrijving"]) ."'></iframe>"; ?>   
                    </div>
                    <div class="col s4" style="border-right-style:solid; border-left-style:solid; height:100%;">
                        <?php  echo" <h1>".$voorwerp["verkoper"]."</h1>"; ?>
                        <?php  echo" <h5>".$voorwerp["plaatsnaam"].", ". $voorwerp["land"]."</h5>"; ?>
                        <?php  echo" <h5>".$gebruiker['Emailadres']."</h5>"; ?>
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
                    <div class="col s4">
                        <div style="border-style:solid;">
                            <h5>Bod Geschiedenis</h5>
                            <div class="white" style="border-top-style:solid; border-bottom-style:solid">

                            </div>
                        </div>
                        <div style="border-style:solid; margin-top:5%">
                            <h5>Huidige Bod</h5>
                            <?php // loadBidding()?>
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