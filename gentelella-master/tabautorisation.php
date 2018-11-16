<?php

require_once 'db.php';


	function getNbAutorisations(){
		$db = getConnexionBD();
     	
      $sql="select * from 1_0_tabautorisations";
      $req=$db->query($sql);
      $s = $req->rowCount();
      //var_dump($s);
      return $req->rowCount();
	}

?>