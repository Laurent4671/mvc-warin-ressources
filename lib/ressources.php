<?php


function getRessources($id){
    if(!is_numeric($id)){
        return false;
    }

    if($id > 0){
        $sql = "SELECT R.ressource_id, R.ressource_titre, R.ressource_url_href, R.ressource_url_title, R.ressource_img_src, R.ressource_img_alt, R.is_visible, R.sous_categ_id, S.sous_categ_titre, C.categorie_id, C.categorie_titre
				FROM ressources R, categories C, sous_categs S 
				WHERE R.sous_categ_id = S.sous_categ_id 
				AND S.categorie_id = C.categorie_id 
				AND R.ressource_id = $id;";
    }else{
        $sql = "SELECT R.ressource_id, R.ressource_titre, R.ressource_url_href, R.ressource_url_title, R.ressource_img_src, R.ressource_img_alt, R.is_visible, R.sous_categ_id, S.sous_categ_titre, C.categorie_id, C.categorie_titre
				FROM ressources R, sous_categs S, categories C 
				WHERE R.sous_categ_id = S.sous_categ_id 
				AND S.categorie_id = C.categorie_id 
				ORDER BY R.ressource_id ASC;";
    }
    return requeteResultat($sql);
}

/***************************/

function insertRessources($sc_id, $r_tt, $r_url_h, $r_url_t, $r_img_s, $r_img_a){
    $sc_id   = convert2DB($sc_id);
    $r_tt    = convert2DB($r_tt);
    $r_url_h = convert2DB($r_url_h);
    $r_url_t = convert2DB($r_url_t);
    $r_img_s = convert2DB($r_img_s);
    $r_img_a = convert2DB($r_img_a);



    $sql = "INSERT INTO ressources
                (sous_categ_id, ressource_titre, ressource_url_href, ressource_url_title, ressource_img_src, ressource_img_alt)
            VALUES
                ('$sc_id', '$r_tt', '$r_url_h', '$r_url_t', '$r_img_s', '$r_img_a');
            ";

    return ExecRequete($sql);
}

/***************************/

function updateRessources($sc_id, $r_tt, $r_url_h, $r_url_t, $r_img_a, $id){
	$id      = intval($id);
    $sc_id   = convert2DB($sc_id);
    $r_tt    = convert2DB($r_tt);
    $r_url_h = convert2DB($r_url_h);
    $r_url_t = convert2DB($r_url_t);
    $r_img_a = convert2DB($r_img_a);
			
	$sql = "
			UPDATE ressources
			SET    sous_categ_id        = $sc_id,
			SET    ressource_titre      = $r_tt,
			SET    ressource_url_href   = $r_url_h,
			SET    ressource_url_title  = $r_url_t,
			SET    ressource_img_alt    = $r_img_a,
			WHERE  ressource_id         = $id;
	   ";

    var_dump($sql);
    return ExecRequete($sql);
}

/***************************/

function deleteRessources($id){
    if(!is_numeric($id)){
        return false;
    }
    $id = intval($id);
    if($id > 0){
        $sql = "
				DELETE FROM ressources
				WHERE ressource_id = $id;
				";
				
        return ExecRequete($sql) ? true : false;
    }else{
        return false;
    }
}


?>