<?php 
require_once 'db.php';
function AjouterGrille($fichier,$id_responsable,$id_listeErreur)
{
	$db=getConnexionBD();
	$sql="INSERT INTO grille(id_gr, fichier, id_responsable, id_listeErreur) values(NULL,'$fichier',$id_responsable,$id_listeErreur)";
	$req=$db->query($sql);
	if ($req) {
		return 1;
	}
	return 0;	
}
function nbgrille()
{
	 $db=getConnexionBD();
                $sql ="SELECT * FROM grille";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();
}
?>