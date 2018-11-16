<?php 
require_once 'db.php';

function getNbAgence(){
                $db=getConnexionBD();
                $sql ="SELECT * FROM agence";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();               
}
function listeAgence(){
	$db=getConnexionBD();
    $sql="select * from agence,unite_Commerciale where agence.id_unite=unite_Commerciale.id_uc";
    $req=$db->query($sql);
    return $req->fetchAll();
}
function AjouterAgence($codeAgence_UC,$libelleAgence,$id_unite){
		$db=getConnexionBD();
		$sql="INSERT INTO agence(id, codeAgence_UC, libelleAgence, id_unite, created_at, updated_at, deleted_at) values(null,'$codeAgence_UC','$libelleAgence','$id_unite')";
		// INSERT INTO `agence` (`id`, `codeAgence_UC`, `libelleAgence`, `id_unite`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '01600', 'POMPIDOU ', '2', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL), (NULL, '01800', 'CENTENAIRE', '2', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL);
		$req=$db->query($sql);
		if ($req) {
			return 1;
		}
		return 0;
		
}

 ?>