<?php
session_start();
function redirect($page, $error = ''){
    if(!empty($error)){
        header('location: ../'.$page.'.php?msg='.$error);
    } else{
    header('location: ../'.$page.'.php');
    }
}

//dit moet een eigen pagina krijgen

function popupMessage($msg){
            echo"<script>
                        $(document).ready(function(){
                            M.toast({html: '$msg', classes: 'rounded'});});
                    </script>";
                }

function loadImages($itemId){
    global $dbh;
    $img = '';
    $sql = "SELECT filenaam FROM Bestanden WHERE voorwerp = '".$itemId."'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $img = $query->fetch(PDO::FETCH_ASSOC);
    return 'http://iproject5.icasites.nl/pics/'.$img['filenaam'];
}

 function loadBidding($voorwerpnummer){
    global $dbh;
    $sql = "SELECT bod, gebruikersnaam FROM boden WHERE voorwerpnummer = :voorwerpnummer order by bod desc";
    $stmt2 = $dbh->prepare($sql);
    $stmt2->execute(array(':voorwerpnummer' => $voorwerpnummer));
    $boden = $stmt2->fetchAll(PDO::FETCH_ASSOC);

   return $boden;
    }

    Function getStartPrijs($detail){

        global $dbh;
        $stmt = "SELECT startprijs From voorwerpen WHERE voorwerpnummer = $detail ";
        $query = $dbh->prepare($stmt);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            $resultsArray = $result;
        }
        return $resultsArray;
    
    }

    function rickRoll(){
        header("Location: https://youtu.be/dQw4w9WgXcQ?t=22");
    }
?>