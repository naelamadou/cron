<?php 
require_once 'db.php';

function AjouterCommentaire($id_users,$commentaire,$status){
	$db=getConnexionBD();
    $sql="INSERT INTO commentaire(id_users,commentaire,status) values(null,'$id_users','$commentaire','$status')";
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

?>