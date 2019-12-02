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
     
            /* Hier moet een img komen ook ergens en de design kan ik pas maken als ik een virtueel voorbeeld heb.*/
          } 
    }
?>
<!-- deze hele pagina moet opnieuw gemaakt worden de HTML CSS klopt niet --> 
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <div class="row">
    <div class="col s12 m6 l6">
      <div class="card coconutMilk" style="max-width:30%; max-height:40%;">
        <div class="card-image">
          <img src="../images/icaButtplugg.jpg">
          <span class="card-title coconutMilk black-text">StandBeeld</span>
        </div>
        <div class="card-content coconutMilk">
          <p>Never gonna give you up</p>
        </div>
        <div class="card-action coconutMilk">
          <a href="#">Bieden</a>
        </div>
      </div>
    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.js"></script> 
  </body>
<!-- deze hele pagina moet opnieuw gemaakt worden de HTML CSS klopt niet --> 