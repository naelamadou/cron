<?php 
require_once 'db.php';

function listeUC(){
	$db=getConnexionBD();
    $sql="select * from unite_Commerciale";
    $req=$db->query($sql);
    return $req->fetchAll();
}
function ajouterUC($Code_UC,$Nom_UC){
		$db=getConnexionBD();
		$sql="insert into unite_Commerciale(id_uc,Code_UC,Nom_UC) values(NULL,'$Code_UC','$Nom_UC')";
		$req=$db->query($sql);
		return $req;
	}
	// function deleteUC($id)
	// {
	// 	$db=getConnexionBD();
	// 	$sql="DELETE FROM unite_Commerciale where id=$id";
	// 	$req=$db->query($sql);
	// 	return $req;
	// }
	function updateUC($id,$Code_UC,$Nom_UC){
		$db=getConnexionBD();
		$sql="UPDATE unite_Commerciale SET Code_UC='$Code_UC',
		Nom_UC='$Nom_UC' where id='$id'";
		$req=$db->query($sql);
		return $req;
	}
 ?>
