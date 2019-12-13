<?php
require("connectionDataBase");


// n=aantal kaartjes
function loadCardBatch($nCards, $category, $title = ''){


    $sqlLaastekans ='select top '.$nCards.'titel, startprijs
        from voorwerpen 
        where veilingEinddag = day(getdate()) and veilinggesloten = 0
        order by newid()';
    $sqlKoopjes = '';

    $sqlrubrieken = "select top $nCards *
                    from voorwerpen
                    where voorwerpnummer IN (select voorwerpnummer 
                                            from voorwerpenInRubrieken 
                                             where RubriekOpLaagsteNiveau = (select rubrieknummer from rubrieken where rubrieknaam = '$category' ) )";

    $sql = '';

    if($category == 'laatse kans'){
        $sql = $sqlLaastekans;
    }
    else if($category == 'koopjes'){
        $sql = $sqlKoopjes;
    }

    $sql = $dbh->prepare("SELECT title, prijs FROM voorwerpen ");




}

loadCardBatch(6 , 'laatstekans', 'Laatste Kans!')
