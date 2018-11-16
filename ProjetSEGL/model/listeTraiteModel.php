<?php 
require_once 'db.php';
function ajouterListeTraite($id_liste,$id_commentaire)
{
	$db=getConnexionBD();
	$sql="INSERT INTO  listeerreurt (id_LT,deleted_at,updated_at,created_at, id_liste,id_commentaire) VALUES (NULL,NULL,NULL,CURRENT_TIMESTAMP,'$id_liste',$id_commentaire)";
	//INSERT INTO `listeerreurt` (`id_LT`, `deleted_at`, `updated_at`, `created_at`, `id_liste`, `id_commentaire`) VALUES (NULL, NULL, NULL, CURRENT_TIMESTAMP, '16', '67');
	$req=$db->query($sql);
	if ($req) {
		return 1;
	}
	return 0;	
}
?>