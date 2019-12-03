<?php


// deze functie aan roepen als er input wordt gegeven die naar de database wordt gestuurd! indien er meerder waarden worden gecheckt geef je $_POST of $_GET mee als parameter
function specialCharacters($value){
    $hasSpecialCharacters = false;

        if (!preg_match("/\w/", $value)) {
            $hasSpecialCharacters = true;
        }

    return $hasSpecialCharacters;
}
?>