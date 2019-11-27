<?php

  require("ConnectieDatabaseScript.php");

   /*deze pagina is voorlopig voor test purposes en testen. Ik ga nog met jullie implementeren op de website maar daarvoor moet iedereen er zijn! ~dylan 26-11 */
   /*deze functie moet worden aangeroepen binnen de container en de row van de aanbevolen veilingen */

    Function getDecayingItems(){

        $sql="Select * from Voorwerp ORDER BY RAND() LIMIT 6;";
        $query = preparedQuery($dbh, $sql);
         while($result = $query->fetch(PDO::FETCH_ASSOC)){
                $datas[] = $result;
            
         }
         foreach($datas as $data){ 
            
            echo '<div class="col 4>
                  <h1 class="center">'. $data["titel"]. '</h1>
                    <img src="" class="responsive">
                    <p>'. $data["beschrijving"].'</p>
                    <h3 class="center">'.$data["looptijdEindeTijdstip"].'
                  </div>';
            /* Hier moet een img komen ook ergens */

          } 
    }

  
?>
