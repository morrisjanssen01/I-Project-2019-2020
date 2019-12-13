<?php
require("connectionDataBase");

function loadCardBatch($nCards, $category){
    $sqlLaastekans ='select top 6 titel, startprijs
        from voorwerpen 
        where veilingGesloten = 0
        order by looptijdEinddag,looptijdEindTijd';
    $sql = $dbh->prepare("SELECT title, prijs FROM voorwerpen ")



}

loadCardBatch(6 , 'laatstekans', 'Laatste Kans!')
 
echo '<div class="col s2 offset-s2" style="height:30%;">
            <figure style="background-image: url("images/rickAstley.jpg"); background-repeat: no-repeat; margin:0; width:100%;">
                <figcaption>
                    <a href="details.php?detail="><h5>'.$title.'</h5></a>
                    <h5>'.$prijs.'</h5>
                    <button class="btn-large coconutMilk black-text waves-effect waves-green modal-trigger" data-target="modal1" style="margin: 5px;" target>bied</button>
                </figcaption>
            </figure>
        </div>'