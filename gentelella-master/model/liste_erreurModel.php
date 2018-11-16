<?php
require_once 'db.php';

function getNbErreur(){
                $db=getConnexionBD();
                $sql ="SELECT * FROM listeErreur";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();               
}
function getlisteErreur50mil(){
    $db=getConnexionBD();
    $sql="select * from listeErreur";
    $req=$db->query($sql);
    return $req->fetchAll();
}
// function getlistErreurAll(){
// 	$db=getConnexionBD();
//     $sql="select * from liste_erreur,agence where liste_erreur.id_agence=agence.id";
//     $req=$db->query($sql);
//     return $req->fetchAll();
// }
function getlisteAgenceByErreur(){
	$db=getConnexionBD();
    $sql="select AGE from listeErreur";
    $req=$db->query($sql);
    return $req->fetchAll();
}