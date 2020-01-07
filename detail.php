<?php

    require("helpers/antiSQLinjectionScript.php");
    require("helpers/connectionDatabaseScript.php");
    require("helpers/redirect.php");

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
       
        $stmt3 = $dbh->prepare("select Emailadres
                                from gebruikers
                                where gebruikersnaam IN (select gebruikersnaam from voorwerpen
                                where voorwerpnummer = :voorwerpnummer)");

        $stmt->execute(array($voorwerpnummer));
        $voorwerp = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt3->execute(array($voorwerpnummer));
        $gebruiker = $stmt3->fetch(PDO::FETCH_ASSOC);
       
        
    }


    $img = loadImages($voorwerp['voorwerpnummer']);

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
                <div class="row" style="margin:0; height: 100%">
                    <div class="col s4" style="padding:0;">
                     <?php  echo" <h4>".$voorwerp["titel"]."</h4>" ?>
                        <img src="<?php echo $img?>" alt="voorwerp" style="max-width:100%">
                        <h3>beschrijving product</h3>
                        <?php  echo" <iframe style='width:100%; height:340px;' srcdoc='". htmlspecialchars($voorwerp["beschrijving"]) ."'></iframe>"; ?>   
                    </div>
                    <div class="col s4" style="border-right-style:solid; border-left-style:solid; height:100%;">
                        <h3>Verkoper:</h3>
                        <?php  echo" <h5>".$voorwerp["verkoper"]."</h5>"; ?>
                        <h4>Plaats:</h4>
                        <?php  echo" <h5>".$voorwerp["plaatsnaam"].", ". $voorwerp["land"]."</h5>";?>
                        <h4>Email Verkoper:</h4>
                        <?php  echo" <h5>".$gebruiker['Emailadres']."</h5>"; ?>
                        <div style="margin-top:10%;">
                            <h5>looptijd:</h5>
                        <?php  echo' <h5>'.$voorwerp["looptijd"].' Dagen</h5>'?>
                        </div>
                        <div style="">
                            <?php echo '<form action="helpers/biddingScript.php?detail='.$voorwerpnummer.'" method="POST">' ?>
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
                                <?php $bod = loadBidding($voorwerpnummer);
                                      for($i = 1; $i < 10; $i++){
                                        if(!empty($bod[$i]['bod'])){
                                            echo $bod[$i]['bod'].' door '.$bod[$i]['gebruikersnaam'].'<br><br>';
                                        }
                                        else if($i = 1 || !empty($bod[0]['bod'] )){
                                            echo '<h1>Er is nog niet geboden op dit item. Wees de eerste!</h1><br><br>';
                                        }
                                       }   ?>
                            </div>
                        </div>
                        <div style="border-style:solid; margin-top:5%">
                            <h5>Huidige Bod</h5>
                            <?php $bod = loadBidding($voorwerpnummer);
                                  echo $bod['bod'].' door '.$bod['gebruikersnaam']?>
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