<?php
/** /
 *
 * @param type $file = fichier uploadé
 * @return string
 */
function uploadImg($file, $path="") {

    $r = array();
    $r['warnmsg'] = "";
    if (isset($file['name']) AND $file['name'] != "") {
        $photo = date("YmdHis").".jpg";
        $tmp_file = $file["tmp_name"];
        // Upload du fichier image
        if (is_uploaded_file($tmp_file)) {
            $size = getimagesize($tmp_file);
            
            // Vérification de l'extension (2 = JPEG)
            if ($size[2] == 2) {
                // Upload et renommage
                move_uploaded_file($tmp_file, WWW_UP .$path. $photo);
                
                $r['photo'] = $photo;
                //$r['warnmsg'] .= "<br />L'image a été insérée avec succès";
            } else {
                $r['warnmsg'] .= "<br />L'extension du fichier n'est pas valide.";
            }
        } else {
            $r['warnmsg'] .= "<br />Erreur lors de l'upload du fichier.";
        }
    } else {
        $r['warnmsg'] .= "<br />Pas d'image fournie.";
    }
    
    return $r;
}

function uploadMultiImg($files, $path="") {

    $r              = array();
    $r['warnmsg']   = "";
    $r['photo']     = "";
    
    for($i = 0; $i < sizeof($files['name']); $i++){
        if(isset($files['name'][$i]) AND $files['name'][$i] != "") {
            $cpt = $i + 1;
            $photo = date("YmdHis")."_".$cpt.".jpg";
            $tmp_file = $files["tmp_name"][$i];
            // Upload du fichier image
            if (is_uploaded_file($tmp_file)) {
                $size = getimagesize($tmp_file);
                // Vérification de l'extension (2 = JPEG)
                if ($size[2] == 2) {
                    // Upload et renommage
                    move_uploaded_file($tmp_file, WWW_UP .$path. $photo);
                    
                } else {
                    $r['warnmsg'][$i] .= "<br />L'extension du fichier n'est pas valide.";
                }
            } else {
                $r['warnmsg'][$i] .= "<br />Erreur lors de l'upload du fichier.";
            }
        } else {
            $r['warnmsg'][$i] .= "<br />Pas d'image fournie.";
        }
        $r['photo'][$i] = $photo;
    }
    return $r;
}


/** /
 * Redimensionne et renomme l'image en fonction des parametres donnés
 * @param type $image = chemin de l'image sur le disque
 * @param type $largeur = future largeur de l'image
 * @param type $nom = futur nom de l'image
 * @return boolean
 */
function resize($image, $largeur, $nom, $file) {
    $image_origine = imagecreatefromjpeg($image);
    // Récupération des dimensions de l'image
    list($width, $height, $type, $attr) = getimagesize($image);
    // Calcul de la nouvelle hauteur
    $ratio = $width / $height;
    $hauteur = $largeur / $ratio;
    // Création d'un conteneur pour la nouvelle image
    $new_image = imagecreatetruecolor($largeur, $hauteur);
    if (!$new_image) {
        return false;
    } else {
        // Création de l'image dans les nouvelles dimensions et suppression de l'ancienne
        imagecopyresampled($new_image, $image_origine, 0, 0, 0, 0, $largeur, $hauteur, $width, $height);
        imagejpeg($new_image, $file.$nom, 100);
        imagedestroy($image_origine);
        return true;
    }
}

function delPicFile($picfile, $path = "") {
    if (file_exists(WWW_UP .$path. $picfile) && is_file(WWW_UP .$path . $picfile) ) {
            return unlink(WWW_UP .$path. $picfile);
    } else {
        return false;
    }
}
?>