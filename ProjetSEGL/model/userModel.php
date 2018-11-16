<?php
include 'db.php';
function getConnexion($username,$password){
    $db=getConnexionBD();
    $sql="select * from users where username='$username' and password='$password'";
    $req=$db->query($sql);
    return $req->fetch();
}
function listeUser(){
	$db=getConnexionBD();
    $sql="select * from users, role where users.id_role=role.id";
    $req=$db->query($sql);
    return $req->fetchAll();
}
function getlisterole(){
	$db=getConnexionBD();
    $sql="select * from role";
    $req=$db->query($sql);
    return $req->fetchAll();
}
function getlisteUserByResponsable()
{
    $db=getConnexionBD();
    $sql="select * from users,role where users.id_role=role.id and users.id_role=2";
    $req=$db->query($sql);
    return $req->fetchAll();
}
/*R.O POUR ENVOYER A LA IGAD*/
function getlisteUserByIGAD(){
    $db=getConnexionBD();
    $sql="select * from users u,role r where u.id_role=r.id and r.id='5'";
    $req=$db->query($sql);
    return $req->fetchAll();
}
?>