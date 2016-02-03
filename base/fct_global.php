<?php


// Cette fonction vérifie qu'une variable existe bien. 
// Si elle existe, la variable est retournée, si elle n'existe pas c'est la valeur "default" qui est retournée
// Sera fort utilisée dans le cas de $_POST & $_GET
function ifsetor(&$val, $default = null){
    return isset($val) ? $val : $default;
}

// Cette fonction va servir à récupérer les variables envoyées par POST ou par GET
function param($val){
    return ifsetor($_REQUEST[$val], false);
}


function convert2DB($string){
    global $mysqli;
    
    return $mysqli->real_escape_string(trim($string));
}

function convertFromDB($txt){
    return stripslashes($txt);
}


function convertDate2US($date){
    $a = explode("/", $date);
    return $a[2]."-".$a[1]."-".$a[0];
}

function convertDate2FR($date){
    $a = explode("-", $date);
    return $a[2]."/".$a[1]."/".$a[0];
}

function is_email($s){
    return filter_var($s, FILTER_VALIDATE_EMAIL);
}
?>