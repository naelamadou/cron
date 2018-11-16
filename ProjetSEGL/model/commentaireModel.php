<?php 
require_once 'db.php';

function AjouterCommentaire($id_users,$id_erreur,$desc_com,$status,$id_agence){
    $db=getConnexionBD();
    $sql="INSERT INTO commentaire (id_com, id_users, id_erreur, desc_com, status, id_agence) VALUES (NULL, $id_users, $id_erreur, '$desc_com', '0', $id_agence)";
        $req=$db->query($sql);
        if ($req) {
            return 1;
        }
        return 0;   
}
function getNBCommentaire(){
                $db=getConnexionBD();
                $sql ="SELECT * FROM commentaire";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();               
}
function getlisteCommentaire(){
  $db=getConnexionBD();
    $sql="select * from commentaire,users,agence where commentaire.id_users=users.id and commentaire.id_agence=agence.id";
    $req=$db->query($sql);
    return $req->fetchAll();
}
//je voudrais avoir la listeerreur ainsi que leur commentaire
function getlisteErreurCommente(){
  $db=getConnexionBD();
    $sql="select * from commentaire,users,agence,listeerreur where commentaire.id_users=users.id and commentaire.id_agence=agence.id and commentaire.id_erreur=listeerreur.id";
    $req=$db->query($sql);
    return $req->fetchAll();
}


?>