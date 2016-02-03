<?php
include_once("lib/login.php");

$post_login     = isset($_POST["login"]) ? $_POST["login"] : NULL;
$post_password  = isset($_POST["password"]) ? $_POST["password"] : NULL;
$post_submit    = isset($_POST["submit"]) ? $_POST["submit"] : NULL;

$msg = "";

// recup et initialisation variable
$get_action = isset($_GET["action"]) ? $_GET["action"] : "liste";

if (!$post_login || !$post_password || !is_email($post_login)) {
    if ($post_submit) {
        if (!$post_login) {
            $msg .= "&rarr; Login obligatoire";
        }else{
            if(!is_email($post_login)){
                $msg .= "&rarr; Login non valide";
            }
        }
        if (!$post_password) {
            $msg .= "&rarr; Mot-de-passe obligatoire";
        }

    }
    $page = "login";
} else {
    $result = verifLogin($post_login, $post_password);
    
    
    
    if (is_array($result) && sizeof($result) > 0){
        
        $l_user_id      = convertFromDB($result[0]["user_id"]);
		
        $user_pseudo      = convertFromDB($result[0]["user_pseudo"]);
		
		$_SESSION["admin_user_id"]  = $l_user_id;
		$_SESSION["admin_login"]    = $post_login;
		$_SESSION["admin_password"] = md5($post_password);
		
		$_SESSION["admin_pseudo"]  = $user_pseudo;
		
		$msg .= "<i class='fa fa-thumbs-o-up'></i> Connexion établie avec succès.\n";
		
		$page = "admin_accueil";

        
    }else{
        $msg .= "<i class='fa fa-exclamation-triangle'></i> Oupsss... utilisateur non valide....\n";
		
        $page = "login";
    }

}

switch($get_action){
	
	case "accueil":
		$page = "admin_accueil";
	break;
	
	case "exit":
		$result = unlog();
		$page = "login";
	break;
}

?>