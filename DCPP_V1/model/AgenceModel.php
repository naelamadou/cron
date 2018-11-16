<?php 
	require_once 'db.php';

	function listeAgence(){
		$db = getConnexionBD();	
      $sql="select * from agence";
      $req=$db->query($sql);
      return $req->fetchAll();
  }
  
