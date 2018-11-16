<?php 
require_once 'db.php';

function AjouterPoursuite($fichier,$desc_com,$id_users,$id_listeErreur){
    $db=getConnexionBD();
    $sql="INSERT INTO poursuite (id_pr, fichier, desc_com, id_users, id_listeErreur) VALUES (NULL,'$fichier','$desc_com', '$id_users', $id_listeErreur)";
        $req=$db->query($sql);
        if ($req) {
            return 1;
        }
        return 0;   
}
 ?>