<?php
require("helpers/connectionDatabaseScript.php");
require("helpers/redirect.php");




// n=aantal kaartjes
function loadCardBatch($nCards, $category, $title = ''){


    //STARTprijs in deze functie moet huidigebod worden

    $sqlLaastekans ='select top '.$nCards.' *
                    from voorwerpen 
                    where veilingGesloten = 0
                    order by looptijdEindTijd';

    $sqlKoopjes = 'select * from voorwerpen
    where voorwerpnummer in(
            select top 6 V.voorwerpnummer
            from voorwerpen V
            left join boden B on V.voorwerpnummer = B.voorwerpnummer
            group by V.voorwerpnummer
            having max(B.bod) BETWEEN 5 AND 10) AND veilingGesloten = 0';

    $sqlrubrieken = "select top $nCards *
                    from voorwerpen
                    where voorwerpnummer IN (select voorwerpnummer 
                                            from voorwerpenInRubrieken 
                                             where RubriekOpLaagsteNiveau IN (select rubrieknummer from rubrieken where rubrieknaam = '$category')) AND veilingGesloten = 0";
    
    $sqlNieuw = "select top $nCards * from voorwerpen order by voorwerpnummer desc";

    $sql = '';

    $notFound = "'images/404.jpg'";

    global $dbh;

    if($category == 'laatse kans'){
        $sql = $sqlLaastekans;
    }
    else if($category == 'koopjes'){
        $sql = $sqlKoopjes;
    }
    else if($category == 'nieuw'){
        $sql = $sqlNieuw;
    }
    else{
        $sql = $sqlrubrieken;
    }

    $query = $dbh->prepare($sql);
    $query->execute();

    $results = $query->fetchall(PDO::FETCH_ASSOC);

    


    for($i = 0; $i < $nCards; $i++){
        $img = loadImages($results[$i]['voorwerpnummer']);
        $hightestBid = loadBidding($results[$i]['voorwerpnummer']);
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
                        <h5 style="margin-left: 5px">€';
                        if(!empty($hightestBid)){
                            echo $hightestBid[0]['bod'];
                        }
                        else {
                            echo $results[$i]["startprijs"];
                        }
                        echo'</h5>
                        <button class="btn-large coconutMilk black-text waves-effect waves-warmSand modal-trigger" data-target="'.$results[$i]["voorwerpnummer"].'" style="margin: 5px;" target>bied</button>
                    </figcaption>
                </figure>
            </div>';
        }
        else{
            echo'<div class="col s2" style="height:30%; width: 33%;">
                <figure style="background-image: url('.$img.'); background-repeat: no-repeat; margin:0; width:100%;">
                    <figcaption>
                        <a style="width: 30%; heigth: 100%;" href="detail.php?detail='.$results[$i]["voorwerpnummer"].'"><p style="font-size: 65%;">'.$results[$i]["titel"].'</p></a>
                        <h5 style="margin-left: 5px">€';
                        if(!empty($hightestBid)){
                            echo $hightestBid[0]['bod'];
                        }
                        else {
                            echo $results[$i]["startprijs"];
                        }
                        echo '</h5>
                        <button class="btn-large coconutMilk black-text waves-effect waves-warmSand modal-trigger" data-target="'.$results[$i]["voorwerpnummer"].'" style="margin: 5px;" target>bied</button>
                    </figcaption>
                </figure>
            </div>';

        }
    }
        echo'</div></div>';
        for($i = 0; $i < $nCards; $i++){
            echo '<div id="'.$results[$i]["voorwerpnummer"].'" class="modal coconutMilk" style="width:30%; height:40%">
                    <form action="helpers/biddingScript.php?detail='.$results[$i]["voorwerpnummer"].'"  method="post">
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
                                        <input type="number" step="0.1" name="bod" id="bod" placeholder="5.00">
                                    </div>
                                </div>                            
                            </div>
                            <div class="right" style="margin-top:10%;">
                                <a class="modal-close waves-effect waves-warmSand btn-flat">Terug</a>
                                <button type="submit" name="submit" class="waves-effect  btn-flat warmSand darken-2">Bieden</a></button>
                            </div>
                        </div>
                    </form>
                </div>';      
        }
    }
//loadImages();
//loadCardBatch(3 , 'pumps', 'Pumps');
