<?php
if(!isset($_SESSION["admin_user_id"]) || empty($_SESSION["admin_user_id"]) || !is_numeric($_SESSION["admin_user_id"])){
    $post_login = "";
    $msg = "";
    $page = "login";
}else{

    // include library
    include_once("lib/tools_txt.php");
    include_once("lib/login.php");
	
	// initialisation des variables de vérification des champs
	$post_old_password    = false;
	$post_new_password    = false;
	$post_repeat_password = false;

    // recup et initialisation variable
    $get_action = isset($_GET["action"]) ? $_GET["action"] : "form";
    $get_id     = isset($_GET["id"]) ? $_GET["id"] : 0;

    $post_old_password      = isset($_POST["old_password"]) ? $_POST["old_password"] : NULL;
    $post_new_password      = isset($_POST["new_password"]) ? $_POST["new_password"] : NULL;
    $post_repeat_password   = isset($_POST["repeat_password"]) ? $_POST["repeat_password"] : NULL;
    $post_submit            = isset($_POST["submit"]) ? $_POST["submit"] : NULL;

    $msg        = "";
	
	

    // switch sur action et re-définition de $page
    switch($get_action){
        case "form":
            $page = "admin_password";
            break;

        case "update":
            if (!$post_old_password || !$post_new_password || !$post_repeat_password || (md5($post_old_password) != $_SESSION["admin_password"]) || $post_new_password != $post_repeat_password) {
                if ($post_submit) {

                    if (!$post_old_password) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Mot-de-passe actuel obligatoire</p>";
                    }elseif(md5($post_old_password) != $_SESSION["admin_password"]) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Votre mot-de-passe actuel est erroné !</p>";
                    }
                    if (!$post_new_password) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Nouveau mot-de-passe obligatoire</p>";
                    }
                    if (!$post_repeat_password) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Répétition du mot-de-passe obligatoire</p>";
                    }
                    if ($post_new_password != $post_repeat_password) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Votre nouveau mot-de-passe et la répétition de celui-ci doivent être identiques</b></p>";
                    }
                }
                $page = "admin_password";
            } else {
                $update = updatePassword($post_new_password, $_SESSION["admin_user_id"]);

                if ($update){
                    $msg .= "<div class='box-body'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Alert!</h4>Mot-de-passe modifié avec succès</div></div>\n";
                }else{
                    $msg .= "<div class='box-body'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Alert!</h4>Oupsss... problème lors de la modification du mot-de-passe</div></div>\n";
                }
                
                $page = "admin_password";
            }
            break;
    }
}
?>