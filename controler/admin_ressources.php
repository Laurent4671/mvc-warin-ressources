<?php
if(!isset($_SESSION["admin_user_id"]) || empty($_SESSION["admin_user_id"]) || !is_numeric($_SESSION["admin_user_id"])){
    $post_login = "";
    $msg = "";
    $page = "login";
}else{

    // include library
    include_once("lib/sous_categs.php");
    include_once("lib/ressources.php");
    include_once("lib/tools_img.php");
    include_once("lib/tools_txt.php");

    // recup et initialisation variable
    $get_action = isset($_GET["action"]) ? $_GET["action"] : "liste";
    $get_id     = isset($_GET["id"]) ? $_GET["id"] : 0;

    $ressource_titre      = isset($_POST["ressource_titre"]) ? $_POST["ressource_titre"] : NULL;
    $sous_categ_id        = isset($_POST["sous_categ_id"]) ? $_POST["sous_categ_id"] : NULL;
    $ressource_url_href   = isset($_POST["ressource_url_href"]) ? $_POST["ressource_url_href"] : NULL;
    $ressource_url_title  = isset($_POST["ressource_url_title"]) ? $_POST["ressource_url_title"] : NULL;
    $ressource_img_src    = isset($_POST["ressource_img_src"]) ? $_POST["ressource_img_src"] : NULL;
    $ressource_img_alt    = isset($_POST["ressource_img_alt"]) ? $_POST["ressource_img_alt"] : NULL;
    $post_sous_categ_id   = isset($_POST["sous_categ_id"]) ? $_POST["sous_categ_id"] : NULL;
    $is_visible           = isset($_POST["is_visible"]) ? $_POST["is_visible"] : NULL;
    $post_submit          = isset($_POST["submit"]) ? $_POST["submit"] : NULL;

    $msg        = "";

    // switch sur action et re-définition de $page
    switch($get_action){
	
        case "liste":
            $result = getRessources(0);
            $page = "admin_ressources_liste";
            break;
			

        case "add":
            $result_sous_categ = getSousCategorie(0);

            if (!$ressource_titre || !$sous_categ_id || !$ressource_url_href || !$ressource_url_title || !$ressource_img_src || !$ressource_img_alt) {

                if ($post_submit) {
                    if (!$ressource_titre) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Titre obligatoire</p>";
                    }
                    if (!$sous_categ_id) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Sous catégorie obligatoire</p>";
                    }
                    if (!$ressource_url_href) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Adresse obligatoire</p>";
                    }
                    if (!$ressource_url_title) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Title obligatoire</p>";
                    }
                    if (!$ressource_img_src) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Image obligatoire</p>";
                    }
                    if (!$ressource_img_alt) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Alt obligatoire</p>";
                    }
                }

                $page = "admin_ressources_add";

            } else {
                $insert = insertRessources($sous_categ_id, $ressource_titre, $ressource_url_href, $ressource_url_title, $ressource_img_src, $ressource_img_alt);
				
				if ($insert){
                    $msg .= "<div class='box-body'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Alert!</h4>Ressource ajoutée avec succès.</div></div>\n";
                }else{
                    $msg .= "<div class='box-body'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Alert!</h4>Oupsss... problème lors de l'ajout de la ressource.</div></div>\n";
                }

                $result = getRessources(0);
				
                $page = "admin_ressources_liste";
            }
            break;
			
			
			case "update":

            $result = getRessources($get_id);


            if (!$sous_categ_id || !$ressource_titre || !$ressource_url_href || !$ressource_url_title || !$ressource_img_alt) {
                if ($post_submit) {
                    if (!$sous_categ_id) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Sous catégorie obligatoire</p>";
                    }
                    if (!$ressource_titre) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Titre obligatoire</p>";
                    }
                    if (!$ressource_url_href) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> URL obligatoire</p>";
                    }
                    if (!$ressource_url_title) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> Title obligatoire</p>";
                    }
                    if (!$ressource_img_alt) {
                        $msg .= "<p class='text-red'><i class='fa fa-long-arrow-right'></i> ALT obligatoire</p>";
                    }
                }
                $page = "admin_ressources_update";
            } else {
                $update = updateRessources($sous_categ_id, $ressource_titre, $ressource_url_href, $ressource_url_title, $ressource_img_alt, $get_id);

                if ($update){
                    $msg .= "<div class='box-body'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Alert!</h4>Ressource modifiée avec succès</div></div>\n";
                }else{
                    $msg .= "<div class='box-body'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Alert!</h4>Oupsss... problème lors de la modification de la ressource</div></div>\n";
                }
                
                $page = "admin_ressources_update";
            }
            break;
			
			
			case "delete":
			
				$delete = deleteRessources($get_id);
				
				if ($delete){
                    $msg .= "<div class='box-body'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Alert!</h4>Ressource supprimée avec succès</div></div>\n";
                }else{
                    $msg .= "<div class='box-body'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Alert!</h4>Oupsss... problème lors de la suppression de la ressource</div></div>\n";
                }
				
				$result = getRessources(0);
				
				$page = "admin_ressources_liste";
				
            break;

        /* case "update":
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
			*/
    }
}
?>