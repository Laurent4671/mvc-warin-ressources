<?php
function stripString($chaine, $tailleMax){
    $pLastSpace = 0;
    $chaine     = strip_tags($chaine);
    if(strlen($chaine) >= $tailleMax ){
        $chaine     = substr($chaine,0,$tailleMax);
        $pLastSpace = strrpos($chaine,' ');
        $chaine     = substr($chaine, 0, $pLastSpace).'...';
    }
    return $chaine;
}

function missing_msg($field){
    $msg = "";
    if($field){
        $msg = "<span class='input-notification error png_bg'>Champs obligatoire</span>";
    }
    return $msg;
}


?>