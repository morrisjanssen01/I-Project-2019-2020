<?php
require("helpers/connectionDatabaseScript.php");
require("helpers/redirect.php");




// n=aantal kaartjes
function loadCardBatch($nCards, $category, $title = ''){

    $sqlLaastekans ='select top '.$nCards.' *
                    from voorwerpen 
                    where veilingGesloten = 0
                    order by looptijdEindTijd';

    $sqlKoopjes = '';

    $sqlrubrieken = "select top $nCards *
                    from voorwerpen
                    where voorwerpnummer IN (select voorwerpnummer 
                                            from voorwerpenInRubrieken 
                                             where RubriekOpLaagsteNiveau IN (select rubrieknummer from rubrieken where rubrieknaam = '$category' ) )";

    $sql = '';

    $notFound = "'images/404.jpg'";

    global $dbh;

    if($category == 'laatse kans'){
        $sql = $sqlLaastekans;
    }
    else if($category == 'koopjes'){
        $sql = $sqlKoopjes;
    }
    else{
        $sql = $sqlrubrieken;
    }

    $query = $dbh->prepare($sql);
    $query->execute();

    $results = $query->fetchall(PDO::FETCH_ASSOC);


    for($i = 0; $i < $nCards; $i++){
        $img = loadImages($results[$i]['voorwerpnummer']);
        if(empty($img)){
            $img = '404.jpg';
        }
        if($i == 0){
        echo ' <p style="font-size:200%; margin-left:3%;">'.$title.'</p>
               <div class="row">';
        }
        else if($i == 3){
            echo '</div>
                  <div class="row">';
        }
        if($i == 0 || $i == 3){
          echo'<div class="col s2 " style="height:30%; width: 33%;">
                <figure style="background-image: url('.$img.'); background-repeat: no-repeat; margin:0; width:100%;">
                    <figcaption>
                        <a style="width: 30%; heigth: 100%;" href="detail.php?detail='.$results[$i]["voorwerpnummer"].'"><p style="font-size: 65%;">'.$results[$i]["titel"].'</p></a>
                        <h5 style="margin-left: 5px">€'.$results[$i]['startprijs'].'</h5>
                        <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                    </figcaption>
                </figure>
            </div>';
        }
        else{
            echo'<div class="col s2" style="height:30%; width: 33%;">
                <figure style="background-image: url('.$img.'); background-repeat: no-repeat; margin:0; width:100%;">
                    <figcaption>
                        <a style="width: 30%; heigth: 100%;" href="detail.php?detail='.$results[$i]["voorwerpnummer"].'"><p style="font-size: 65%;">'.$results[$i]["titel"].'</p></a>
                        <h5 style="margin-left: 5px">€'.$results[$i]['startprijs'].'</h5>
                        <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                    </figcaption>
                </figure>
            </div>';

        }
    }
        echo'</div>';
    }
//loadImages();
//loadCardBatch(3 , 'pumps', 'Pumps');
