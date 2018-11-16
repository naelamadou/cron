<?php 
	require_once 'db.php';

function getAutoByProspet($id){
    $db = getConnexionBD(); 
      $sql="SELECT * FROM prospect  WHERE idp= '$id'";
      $req=$db->query($sql);
      return $req->fetchAll();
}
	function listeProspet(){
		$db = getConnexionBD();	
      $sql="SELECT * FROM prospect  WHERE date !='' and nom !=''";
      $req=$db->query($sql);
      return $req->fetchAll();
  }
  function detailProspet(){
    $db = getConnexionBD(); 
    $id=$_GET['$id'];
      $sql="select * from prospect";
      $req=$db->query($sql);
      return $req->fetchAll();
  }

function listeProspetT(){
    $db = getConnexionBD(); 
      $sql="SELECT * FROM prospect WHERE statut = 1 AND date !='' AND nom !=''";
      $req=$db->query($sql);
      return $req->fetchAll();
  }

function listeProspetNT(){
    $db = getConnexionBD(); 
      $sql="SELECT * FROM prospect WHERE statut = 0 AND date !='' AND nom !=''";
      $req=$db->query($sql);
      return $req->fetchAll();
  }

	function getlistCDD(){
		$db = getConnexionBD();
     	
      $sql1="SELECT *  FROM prospect WHERE typecontrat='CDD'";
      $req=$db->query($sql1);
       return $req->fetchAll();

}
	function getlistCDI(){
		$db = getConnexionBD();
     	
      $sql1="SELECT *  FROM prospect WHERE typecontrat='CDI'";
      $req=$db->query($sql1);
       return $req->fetchAll();

}

  function getChartCDD(){
    $db = getConnexionBD();
      
      $sql1="SELECT *  FROM prospect WHERE typecontrat='CDD'";
      $req1=$db->query($sql1);
      $s=$req1->rowCount();
      return $req1->rowCount();

}
  function getChartCDI(){
    $db = getConnexionBD();
      
      $sql1="SELECT *  FROM prospect WHERE typecontrat='CDI'";
      $req1=$db->query($sql1);
      $s=$req1->rowCount();
      return $req1->rowCount();

}

function getNbProspects(){
    $db = getConnexionBD();
     $sql="SELECT * FROM prospect  WHERE date !='' and nom !=''";
      $req=$db->query($sql);
     
      $s=$req->rowCount();
      return $req->rowCount();
}

function getNbCDD(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect where typecontrat = 'CDD'";
      $req=$db->query($sql);
      $s=$req->rowCount();
      return $req->rowCount();
    }
    function getNbCDI(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect where typecontrat = 'CDI'";
      $req=$db->query($sql);
      $s=$req->rowCount();
      return $req->rowCount();
    }

 function getSansBanque(){
       $db = getConnexionBD();
      $sql="SELECT * FROM prospect where banque = ''";
      $req=$db->query($sql);
      $s=$req->rowCount();
      return $req->rowCount();
    }

    function getAvecBanque(){
    $db = getConnexionBD();
      $sql="SELECT distinct Banque FROM prospect where banque != ''";
      $req=$db->query($sql);
      $s=$req->rowCount();
      return $req->rowCount();
    }

 function listSansBanque(){
       $db = getConnexionBD();
      $sql="SELECT * FROM prospect where banque = ''";
      $req=$db->query($sql);
      return $req->fetchAll();
    }

    function listAvecBanque(){
    $db = getConnexionBD();
      $sql="SELECT distinct Banque FROM prospect where banque != ''";
      $req=$db->query($sql);
      return $req->fetchAll();
    }
  
   include 'chartbanque.php'; 
    include 'listechartbanque.php' 
    ?>