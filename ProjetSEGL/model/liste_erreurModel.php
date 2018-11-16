<?php
require_once 'db.php';

function getNbErreur(){
                $db=getConnexionBD();
                $sql ="SELECT * FROM listeerreur";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();               
}
function getlisteErreur50mil(){
    $db=getConnexionBD();
    $sql="select * from listeerreur WHERE `listeerreur`.`id` = 1";
    $req=$db->query($sql);
    return $req->fetchAll();
}
/*nbre d'erreur Suoerieur a 50mil*/
function nbErreurSup50mil(){
     $db=getConnexionBD();
                $sql ="SELECT * FROM listeerreur where MON>50000";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();
}
/*nom d'erreur inferieur a 50mil*/
function nbErreurInf50mil(){
     $db=getConnexionBD();
                $sql ="SELECT * FROM listeerreur where MON<50000";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();
}
/*nombre d'erreur comprie entre 50 000 et 80 000*/
function NBErreurBetween50and300(){
	$db=getConnexionBD();
    $sql="SELECT * FROM `listeerreur` where MON BETWEEN 50000 and 300000";
   $req=$db->query($sql);
    $s = $req->rowCount();
    return $req->rowCount();
}
function getlisteAgenceByErreur(){
	$db=getConnexionBD();
    $sql="select AGE from listeerreur";
    $req=$db->query($sql);
    return $req->fetchAll();
}
/*R.O au moment d'envoyer la grille au R.A*/
function UpdateErreurByStatus($id_erreur){
    $db=getConnexionBD();
    $sql="UPDATE `listeerreur` SET `status` = '1' WHERE `listeerreur`.`id` = $id_erreur";
    $req=$db->query($sql);
    return $req;   
}
/*R.A au moment d'envoyer la grille il va faire un update de la liste*/
function UpdateErreurByStatusGrille($id_listeErreur){
    $db=getConnexionBD();
    $sql="UPDATE `listeerreur` SET `status` = '2' WHERE `listeerreur`.`id` = $id_listeErreur";
    $req=$db->query($sql);
    return $req;   
}
/*R.O au momment d'envoyer la grille a IGAD*/
function UpdateErreurByStatusGrillIGAD($id_listeErreur){
    $db=getConnexionBD();
    $sql="UPDATE `listeerreur` SET `status` = '3' WHERE `listeerreur`.`id` = $id_listeErreur";
    $req=$db->query($sql);
    return $req;   
}
/*dashbord pour le R.O*/
function getNblisteNonTraite(){
    $db=getConnexionBD();
    $sql ="SELECT * FROM listeerreur where MON>50000 AND status= 1";
    $req=$db->query($sql);
    $s = $req->rowCount();
    return $req->rowCount();  
}
/*dashbord pour le R.O*/
function getNblisteTraite(){
    $db=getConnexionBD();
    $sql ="SELECT * FROM listeerreur where MON>50000 and status = 0";
    $req=$db->query($sql);
    $s = $req->rowCount();
    return $req->rowCount();  
}

