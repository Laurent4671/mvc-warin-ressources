<?php


function getSousCategorie($id){
    if(!is_numeric($id)){
        return false;
    }

    if($id > 0){
        $sql = "SELECT sous_categ_id, sous_categ_titre, is_visible FROM sous_categs WHERE sous_categ_id = $id;";
    }else{
        $sql = "SELECT sous_categ_id, sous_categ_titre, is_visible FROM sous_categs ORDER BY sous_categ_id ASC;";
    }
    return requeteResultat($sql);
}

?>