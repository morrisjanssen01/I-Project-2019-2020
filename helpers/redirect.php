<?php
function redirect($page, $error = ''){
    if(!empty($error)){
        header('location: ../'.$page.'.php?msg='.$error);
    } else{
    header('location: ../'.$page.'.php');
    }
}


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
    $stmt2 = $dbh->prepare("SELECT bod FROM boden WHERE voorwerpnummer = :voorwerpnummer group by bod order by bod desc");
    $stmt2->execute(array($voorwerpnummer));
    $boden = $stmt2->fetch(PDO::FETCH_ASSOC);

    var_dump($boden);
    }
?>