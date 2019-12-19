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
                            M.toast({html: '.$msg.', classes: 'rounded'});});
                    </script>";}
                    
                    ?>