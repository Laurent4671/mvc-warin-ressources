<?php
if(!isset($_SESSION["admin_user_id"]) || empty($_SESSION["admin_user_id"]) || !is_numeric($_SESSION["admin_user_id"])){
    $post_login = "";
    $msg = "";
    $page = "login";
}else{

    // include library
    include_once("lib/sous_categs.php");
    include_once("lib/tools_img.php");
    include_once("lib/tools_txt.php");

    // recup et initialisation variable
    $get_action = isset($_GET["action"]) ? $_GET["action"] : "liste";
    $get_id     = isset($_GET["id"]) ? $_GET["id"] : 0;
	
    $is_visible   = isset($_POST["is_visible"]) ? $_POST["is_visible"] : NULL;
    $post_submit        = isset($_POST["submit"]) ? $_POST["submit"] : NULL;

    $msg        = "";

    // switch sur action et re-définition de $page
    switch($get_action){
        case "liste":
            $result = getSousCategorie(0);
            $page = "admin_sous_categs_liste";
            break;

        /* case "add":
            if (!$categorie || !$description) {

                if ($post_submit) {
                    if (!$categorie) {
                        $msg .= "<p class='red'>&rarr; Catégorie obligatoire</p>";
                    }
                    if (!$description) {
                        $msg .= "<p class='red'>&rarr; Description obligatoire</p>";
                    }

                }

                $page = "admin_categorie_add";

            } else {
                $insert = insertCategorie($categorie, $description, $_SESSION["admin_user_id"]);

                if ($insert){
                    $msg .= "<p><b class='fond_ok'><i class='fa fa-thumbs-o-up'></i> Insertion effectuée avec succès.</b></p>\n";
                }else{
                    $msg .= "<p><b class='fond_pas_ok'><i class='fa fa-exclamation-triangle'></i> Oupsss... problème lors de l'insertion....</b></p>\n";
                }

                $result = getCategorie(0);
                $page = "admin_categories_liste";
            }
            break;

        case "update":
            if (!$categorie || !$description) {
                if (!$post_submit) {
                    $result = getCategorie($get_id);
                } else {
                    if (!$categorie) {
                        $msg .= "<p class='red'>&rarr; Catégorie obligatoire</p>";
                    }
                    if (!$description) {
                        $msg .= "<p class='red'>&rarr; Description obligatoire</p>";
                    }
                }
                $page = "admin_categorie_update";
            } else {
                $update = updateCategorie($categorie, $description, $get_id);

                if ($update){
                    $msg .= "<p><b class='fond_ok'><i class='fa fa-thumbs-o-up'></i> Modification effectuée avec succès.</b></p>\n";
                }else{
                    $msg .= "<p><b class='fond_pas_ok'><i class='fa fa-exclamation-triangle'></i> Oupsss... problème lors de l'update....</b></p>\n";
                }

                $result = getCategorie(0);
                $page = "admin_categories_liste";
            }
            break;

        case "delete":
            $delete = deleteCategorie($get_id);

            if ($delete){
                $msg .= "<p><b class='fond_ok'><i class='fa fa-thumbs-o-up'></i> Suppression effectuée avec succès.</b></p>\n";
            }else{
                $msg .= "<p><b class='fond_pas_ok'><i class='fa fa-exclamation-triangle'></i> Oupsss... problème lors de la suppression....</b></p>\n";
            }

            $result = getCategorie(0);
            $page = "admin_categories_liste";

            break;
			*/
    }
}
?>