<?php 
require_once 'db.php';

function getNbAgence(){
                $db=getConnexionBD();
                $sql ="SELECT * FROM agence";
                $req=$db->query($sql);
                $s = $req->rowCount();
                return $req->rowCount();               
}
/*la fonction listeAgence() est utilisée par le R.O*/
function listeAgence(){
	$db=getConnexionBD();
    //$sql="select * from agence,unite_Commerciale,users where agence.id_unite=unite_Commerciale.id_uc and agence.id_resp=users.id";
    $sql="select * from agence";
    $req=$db->query($sql);
    return $req->fetchAll();
}
/*la fonction listeAgenceByUcByUsers() sera utilisée par l'administrateur*/
function listeAgenceByUcByUsers(){
	$db=getConnexionBD();
	//$sql="select * from agence,unite_Commerciale,users where agence.id_unite=unite_Commerciale.id_uc and agence.id_resp=users.id and users.id_role='2'";
	$sql="SELECT ag.id,ag.codeAgence_UC,ag.libelleAgence,ag.id_unite, ag.id_resp,uc.Nom_UC,u.username FROM 
	agence ag,unite_Commerciale uc,users u 
	WHERE ag.id_unite=uc.id_uc AND ag.id_resp=u.id";
	 $req=$db->query($sql);
    return $req->fetchAll();
}
function AjouterAgence($codeAgence_UC,$libelleAgence,$id_unite,$id_resp){
		try{
			$db=getConnexionBD();
			$sql="INSERT INTO agence(id, codeAgence_UC, libelleAgence, id_unite, id_resp, created_at, updated_at, deleted_at) values(NULL,'$codeAgence_UC','$libelleAgence','$id_unite','$id_resp',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,NULL)";
			/* $sql="INSERT INTO commentaire (id_com, id_users, desc_com, status, id_agence, heure) VALUES (NULL, '$id_users', '$desc_com', '0', '$id_agence', CURRENT_TIMESTAMP)";*/
			$req=$db->query($sql);
			if ($req) {
				return 1;
			}
			return 0;
		}catch(PDOException $e){
			die('error ajout agence'.$e->getmessage());
		}
}
function ModifierAgence($id,$codeAgence_UC,$libelleAgence,$id_unite,$id_resp){
		try{
			$db=getConnexionBD();
			$sql="UPDATE agence SET codeAgence_UC= '$codeAgence_UC',libelleAgence= '$libelleAgence',id_unite= $id_unite,id_resp= $id_resp where id= $id";
			/* $sql="INSERT INTO commentaire (id_com, id_users, desc_com, status, id_agence, heure) VALUES (NULL, '$id_users', '$desc_com', '0', '$id_agence', CURRENT_TIMESTAMP)";*/
			$req=$db->query($sql);
			if ($req) {
				return 1;
			}
			return 0;
		}catch(PDOException $e){
			die('error De Modification'.$e->getmessage());
		}
}
function SupprimerAgence($id){
		try{
			$db=getConnexionBD();
			$sql="DELETE FROM agence WHERE id= $id";
			/* $sql="INSERT INTO commentaire (id_com, id_users, desc_com, status, id_agence, heure) VALUES (NULL, '$id_users', '$desc_com', '0', '$id_agence', CURRENT_TIMESTAMP)";*/
			$req=$db->query($sql);
			if ($req) {
				return 1;
			}
			return 0;
		}catch(PDOException $e){
			die('error De Suppression'.$e->getmessage());
		}
}

 ?>
  <script>
  setInterval('load_messages()',500)
  function load_messages() {
    $('#messages').load('listeagence.php');
  }
  </script>