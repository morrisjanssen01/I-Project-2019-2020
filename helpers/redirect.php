<?php
function redirect($page, $error = ''){
    if(!empty($error)){
        header('location: ../'.$page.'.php?msg='.$error);
    } else{
    header('location: ../'.$page.'.php');
    }
}