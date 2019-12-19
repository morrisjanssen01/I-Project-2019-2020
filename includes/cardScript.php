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
                        <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="'.$results[$i]["voorwerpnummer"].'" style="margin: 5px;" target>bied</button>
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
                        <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="'.$results[$i]["voorwerpnummer"].'" style="margin: 5px;" target>bied</button>
                    </figcaption>
                </figure>
            </div>';

        }
    }
        echo'</div></div>';
        for($i = 0; $i < $nCards; $i++){
            echo '<div id="'.$results[$i]["voorwerpnummer"].'" class="modal coconutMilk" style="width:30%; height:40%">
                    <form action="biedScript.php?"  method="post">
                        <div class="modal-header" style="margin-top:3%; margin-bottom:10%;">
                            <h4 class="center">Bieden op '.$results[$i]["titel"].'</h4>
                        </div>
                        <div class="modal-content" style="padding-top:0;">
                            <div class="input-field">
                                <label>Bedrag:</label><br><br>
                                <div class="row">
                                    <div class="col s1" style="padding:0;">
                                        <p>€</p>
                                    </div>
                                    <div class="col s11" style="padding:0;">
                                        <input placeholder="0,00" id="firstname" type="number" min="5" value="5.00" step="1">
                                    </div>
                                </div>                            
                            </div>
                            <div class="right" style="margin-top:10%;">
                                <a class="modal-close waves-effect waves-green btn-flat">Terug</a>
                                <button type="submit" class="waves-effect  btn-flat warmSand darken-2">Bieden</a></button>
                            </div>
                        </div>
                    </form>
                </div>';      
        }
    }
//loadImages();
//loadCardBatch(3 , 'pumps', 'Pumps');
