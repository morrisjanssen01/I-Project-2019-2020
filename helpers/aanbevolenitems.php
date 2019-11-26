<?php


   /*deze pagina is voorlopig voor test purposes en testen. Ik ga nog met jullie implementeren op de website maar daarvoor moet iedereen er zijn! ~dylan 26-11 */

    Function getDecayingItems(){

       /* $sql="";
        $query = preparedQuery($dbh, $sql);
         while($result = $query->fetch(PDO::FETCH_ASSOC)){
                $datas[] = $result;
            
         }*/
         /* foreach($datas as $data){ */
            $data["titel"] = 'henk';
            $data["naam"] = 'jan';
            $data["datum"] = 'diederik';
            $data["beschrijving"] = 'lorum ipsum';

            echo '<div class="col 4><h1 class="center">'. $data["titel"] . $data["naam"] . $data["datum"]. $data["beschrijving"].'</h1></div>';


         /* } */
    }

/* hier komt ga ik de sql uitwerken samen met iemand*/

  
?>
