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
            <h3 class="right" style="">'.$data["looptijdEindeTijdstip"].'</h3>
            <span class="right">'.$data["beschrijving"].'</span>
            <form action="">
               <button class="btn left">
                  <input type="submit" value="naar artiekel pagina"/>
               </button>
             </form>
            </div>';
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

    <div class="row">
      <div class="col s5">
       <h1 class="valign">$data["titel"]</h1>
       <img src="../images/vaseline.jpg" class="responsive-img"width="150">
       <h3 class="right" style="">$data["looptijdEindeTijdstip"]</h3>
       <span class="right">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</span>
       <form action="">
          <button class="btn left">
             <input type="submit" value="naar artiekel pagina"/>
          </button>
        </form>
       </div>
       <div class="col s5">
        <h1 class="valign">$data["titel"]</h1>
        <img src="../images/icabuttplugg.jpg" class="responsive-img" width="150">
        <h3 class="right">$data["looptijdEindeTijdstip"]</h3>
        <span class="right">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</span>
        <form action="">
          <button class="btn">
             <input type="submit" value="naar artiekel pagina"/>
          </button>
        </form>
       </div>
    </div>


    <?php include '../includes/footer.php';?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.js"></script>
    <script>
  </body