<?php 
require_once 'db.php';

function listeRole(){
	$db=getConnexionBD();
    $sql="select * from role";
    $req=$db->query($sql);
    return $req->fetchAll();
}

 ?>