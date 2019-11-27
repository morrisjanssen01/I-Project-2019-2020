<?php

function specialCharacters($values){
    $hasSpecialCharacters = false;

    foreach ($values as $value) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            $specialeKarakters = true;
        }
    }

    return $specialeKarakters;
}
?>