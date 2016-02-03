<?php

/* WARIN Laurent
   13-01-2016
*/

session_start();
include_once('base/config.php');

// initialisation des variables
$page = isset($_GET["p"]) ? $_GET["p"] : "admin_unlog";

// pour sous menu active (visuel css) dans la sidebar
$get_action = "";


if(file_exists("controler/".$page.".php")){
    include_once("controler/".$page.".php");
}else{
    include_once("erreurs/404.php");
    exit;
}




$verif_login = array("login");

if(in_array($page, $verif_login)){
    $section = "admin";	
}else{
    if(preg_match("/^admin/i", $page)) {
        $section = "admin";
    }else{
        $section = "public";
    }
}

switch($section){
    case "admin":
        include_once("include/back-off.php");
        break;
	case "public":
        include_once("include/front-off-header.php");
		
		include_once("view/".$page.".php");
		
        include_once("include/front-off-footer.php");
        break;
}

?>



