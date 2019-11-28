<?php

  require("ConnectieDatabaseScript.php");

   /*deze pagina is voorlopig voor test purposes en testen. Ik ga nog met jullie implementeren op de website maar daarvoor moet iedereen er zijn! ~dylan 26-11 */
   /*deze functie moet worden aangeroepen binnen de container en de row van de aanbevolen veilingen */

    Function getDecayingItems(){

        $sql= $dbh->prepare("Select * from Voorwerp ORDER BY RAND() LIMIT 4");
        $query = $sql->execute;
         while($result = $query->fetch(PDO::FETCH_ASSOC)){
                $datas[] = $result;
            
         }
         foreach($datas as $data){ 
            
            echo '<div class="col s5">
            <h1 class="valign">'.$data["titel"].'</h1>
            <img src="../images/vaseline.jpg" class="responsive-img"width="150">
            <h3 class="right" style=""> eindingt in '.$data["looptijdEindeTijdstip"].'</h3>
            <span class="right">'.$data["beschrijving"].'</span><br><br><br>
               <a href=""><button class="btn left" name="submit">
                  bied
               </button></a>
            </div>';

           echo '<div class="col l6 m6 s12 coconutMilk z-depth-4">
        <h1 class="valign">'.$data["titel"].'</h1>
        <img src="../images/icabuttplugg.jpg" class="responsive-img" width="150">
        <h2 class="right">eindigd in '.$data["looptijdEindeTijdstip"].'</h3>
        <span class="left">'.$data["beschrijving"].'</span><br><br><br>
          <button class="btn left">
            bied
          </button>
       </div>'
            /* Hier moet een img komen ook ergens en de design kan ik pas maken als ik een virtueel voorbeeld heb.*/

          } 
    }

  
?>


<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <?php include '../includes/header.php'; ?> 

    <div class="row ">
      <div class="col l6 m6 s12 sailorBlue z-depth-4">
       <h1 class="valign grey-text">Vaseline</h1>
       <img src="../images/vaseline.jpg" class="responsive-img" width="150">
       <h2 class="right grey-text ">eindigd in 69 : 42 : 00</h3>
       <span class="left grey-text">gebruikt door de enige echte martijn Driessen</span><br><br><br>
          <button class="btn left">
            bied
          </button>
       </div>
       <div class="col l6 m6 s12 coconutMilk z-depth-4">
        <h1 class="valign">buttplugg</h1>
        <img src="../images/icabuttplugg.jpg" class="responsive-img" width="150">
        <h2 class="right">eindigd in 42 : 06 : 90</h3>
        <span class="left">ook gebruikt door de einige echte martijn Driessen tijdens een van zijn beroemde assesments</span><br><br><br>
          <button class="btn left">
            bied
          </button>
       </div>
    </div>


    <?php include '../includes/footer.php';?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.js"></script>
    <script>
  </body