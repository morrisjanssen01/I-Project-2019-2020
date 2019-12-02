<?php


// deze functie aan roepen als er input wordt gegeven die naar de database wordt gestuurd! indien er meerder waarden worden gecheckt geef je $_POST of $_GET mee als parameter
function specialCharacters($values){
    $hasSpecialCharacters = false;

    foreach ($values as $value) {
        if (!preg_match('/[^a-zA-Z\d]+_/', $value)) {
            $hasSpecialCharacters = true;
        }
    }
    return $hasSpecialCharacters;
}
?>