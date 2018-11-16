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
?>