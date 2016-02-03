<?php


function getCategorie($id){
    if(!is_numeric($id)){
        return false;
    }

    if($id > 0){
        $sql = "SELECT categorie_id, categorie_titre, is_visible FROM categories WHERE categorie_id = $id;";
    }else{
        $sql = "SELECT categorie_id, categorie_titre, is_visible FROM categories ORDER BY categorie_id ASC;";
    }
    return requeteResultat($sql);
}

/***************************/

function insertCategorie($c, $t){
    $c = convert2DB($c);
    $t = convert2DB($t);

    $sql = "INSERT INTO categories
                (categorie_id, categorie_titre)
            VALUES
                ('$c', '$t');
            ";

    return ExecRequete($sql);
}

function updateCategorie($pTitre, $id){
    $id      = intval($id);
    $pTitre   = convert2DB($pTitre);

    $sql = "
			UPDATE categories
			SET    categorie_titre =  ' $pTitre '
			WHERE  categorie_id         = $id;
	   ";

    return ExecRequete($sql);
}

function deleteCategorie($pid){
    $pid    = intval($pid);

    $sql =  "
                DELETE FROM categories
                WHERE categorie_id = $pid;
            ";

    return ExecRequete($sql);
}

?>