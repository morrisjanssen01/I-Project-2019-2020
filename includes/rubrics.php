<?php

    require("helpers/connectionDatabaseScript.php");
    
    error_reporting(E_ERROR | E_PARSE);

    function generateRubrics(){
        try{
            connectionDatabase();
            global $dbh;
            $sql = $dbh->prepare('SELECT rubrieknummer, rubrieknaam, subrubriek, volgnr FROM rubrieken ORDER BY subrubriek ASC, rubrieknaam');
            $sql->execute();
            $result = $sql->fetchAll(pdo::FETCH_ASSOC);
            $html = '';
            $parent = -1;
            $parent_stack = array();
            $items = array();
            foreach($result as $key => $value){
                array_push($items, $value);
                }

            $children = array();
            foreach($items as $item){
                $children[$item['subrubriek']][] = $item;
                }
            $html .= '<li class="no-padding">';
            while(($option = each($children[$parent])) || ($parent > 0)){
                if(!empty($option)){
                    if(!empty($children[$option['value']['rubrieknr']])){
                        $html .= '<ul class="collapsible collapsible-accordion"><li class="bold"><a class="collapsible-header waves-effect waves-teal">' . $option['value']['rubrieknaam'] . '</a>';
                        $html .= '<div class="collapsible-body" style="display: block;"><ul>';
                        array_push($parent_stack, $parent);
                        $parent = $option['value']['rubrieknr'];
                    }else{
                    $html .= '<li class="bold"><a class="collapsible-header waves-effect waves-teal">' . $option['value']['rubrieknaam'] . '</a></li>';
                }
            }else{
                $html .= '</ul></div></li></ul>';
                $parent = array_pop($parent_stack);
            }
        }
    $html .= '</li></div>';                
    } catch(\Throwable $th){
        echo $th->getMessage();
        $html = "";
    }
    return $html;
}
 echo generateRubrics(); 
?>