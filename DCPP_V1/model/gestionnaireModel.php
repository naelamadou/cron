<?php 
	require_once 'db.php';

	function listeGest(){
		$db = getConnexionBD();	
      $sql="select * from Gestionnaire";
      $req=$db->query($sql);
      return $req->fetchAll();
  }
  
?>