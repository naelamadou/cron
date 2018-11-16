<?php

include 'db.php';

	function getChart(){
		$db = getConnexionBD();
     	
      $sql1="SELECT *  FROM Prospect WHERE Typedecontrat='CDD'";
      $req1=$db->query($sql1);
      $s=$req1->rowCount();
      return $req1->rowCount();
      echo(ok)

      //  $sql2="SELECT count(*) as nbrCDI FROM Prospects WHERE Typedecontrat='CDI'";
      // $req2=$db->query($sql2);
      // return $req2->fetch();
  }