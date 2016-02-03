<?php
function verifLogin($l, $p){
    $l = convert2DB($l);
    $p = convert2DB($p);
    
    $sql = "SELECT user_id, user_pseudo
            FROM users 
            WHERE user_login LIKE '$l' 
                AND user_password LIKE MD5('$p');
        ";
    
    return requeteResultat($sql);
}

/***************************/

function updatePassword($p, $id){
    $id = intval($id);
    $p = convert2DB($p);
    
    $sql = "UPDATE users 
                SET user_password = MD5('$p') 
            WHERE user_id = $id;
        ";
    return ExecRequete($sql);
    
}

/***************************/

function unlog(){
    // destruction des variables de session en ré-initialisant le array $_SESSION
    $_SESSION = array();
    // on détruit la session et le cookie de session
    return session_destroy() ? true : false;    
}
?>