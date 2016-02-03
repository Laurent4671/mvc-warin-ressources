<?php
if(!isset($_SESSION["admin_user_id"]) || empty($_SESSION["admin_user_id"]) || !is_numeric($_SESSION["admin_user_id"])){
    $post_login = "";
    $msg = "";
    $page = "login";
}else{

    // include library
    include_once("lib/categories.php");
    include_once("lib/tools_img.php");
    include_once("lib/tools_txt.php");

    // recup et initialisation variable
    $get_action = isset($_GET["action"]) ? $_GET["action"] : "liste";
    $get_id     = isset($_GET["id"]) ? $_GET["id"] : 0;

    $categorie_id         = isset($_POST["categorie_id"]) ? $_POST["categorie_id"] : NULL;
    $categorie_titre         = isset($_POST["categorie_titre"]) ? $_POST["categorie_titre"] : NULL;
	
    $is_visible   = isset($_POST["is_visible"]) ? $_POST["is_visible"] : NULL;
    $post_submit        = isset($_POST["submit"]) ? $_POST["submit"] : NULL;

    $msg        = "";

    // switch sur action et re-définition de $page
    switch($get_action){
        case "liste":
            $result = getCategorie(0);
            $page = "admin_categories_liste";
            break;

        case "add":
            if (!$categorie_titre) {

                if ($post_submit) {
                    if (!$categorie_titre) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Titre obligatoire</p>";
                    }
                }

                $page = "admin_categories_add";

            } else {

                $insert = insertCategorie($categorie_id, $categorie_titre, $_SESSION["admin_user_id"]);

                if ($insert){
                    $msg .= "<div class='box-body'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Alert!</h4>Catégorie ajoutée avec succès.</div></div>\n";
                }else{
                    $msg .= "<div class='box-body'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Alert!</h4>Oupsss... problème lors de l'ajout d'une catégorie.</div></div>\n";
                }

                $result = getCategorie(0);
                $page = "admin_categories_liste";
            }
            break;

        case "update":

            $result = getCategorie($get_id);

            if (!$categorie_titre) {

                if ($post_submit) {
                    if (!$categorie_titre) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Titre obligatoire</p>";
                    }
                }

                $page = "admin_categories_update";

            } else {
                $update = updateCategorie($categorie_titre, $get_id);

                if ($update){
                    $msg .= "<div class='box-body'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Alert!</h4>Catégorie modifiée avec succès.</div></div>\n";
                }else{
                    $msg .= "<div class='box-body'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Alert!</h4>Oupsss... problème lors de l'ajout d'une catégorie.</div></div>\n";
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

    }
}
?>