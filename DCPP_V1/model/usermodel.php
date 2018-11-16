<?php

include 'db.php';

	function getConnexion($email, $pwd){
		$db = getConnexionBD();
     	
      $sql="select * from users where email='$email' and password='$pwd'";
      $req=$db->query($sql);
      return $req->fetch();
  }
  function listeUtilisateurs(){
    $db = getConnexionBD(); 
      $sql="SELECT u.idU,u.nom,u.email,u.password,r.libelle_role,a.libelleAgence
			FROM users u,role r, agence a
			WHERE u.idrole=r.id_r
			AND u.id_agence=a.id; ";
      $req=$db->query($sql);
      return $req->fetchAll();
      //SELECT u.idU,u.nom,u.email,u.password,r.libelle_role,a.libelleAgence FROM users u,role r, agence a WHERE u.idrole=r.id_r AND u.id_agence=a.id group by a.libelleAgence;
  }