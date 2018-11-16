<?php 
	require_once 'db.php';

	function listetraitement(){
		$db = getConnexionBD();	
      $sql="select * from Gestionnaire";
      $req=$db->query($sql);
      return $req->fetchAll();
  }
  
?>