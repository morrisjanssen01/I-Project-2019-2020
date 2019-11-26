<?php


   /*deze pagina is voorlopig voor test purposes en testen. Ik ga nog met jullie implementeren op de website maar daarvoor moet iedereen er zijn! ~dylan 26-11 */

    Function getDecayingItems(){

        $sql="";
        $query = preparedQuery($dbh, $sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $resultexist = is_array($result);
        if($resultexist){

            

        }

    }
 *

/* hier komt ga ik de sql uitwerken samen met iemand*/


  
?>
