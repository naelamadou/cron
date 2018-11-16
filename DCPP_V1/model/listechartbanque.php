<?php
function getlistBanqueAtlantique(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Banque Atlantique'";
      $req=$db->query($sql);
      return $req->fetchAll();

}

function getlistCBAO(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='CBAO'";
      $req=$db->query($sql);
      return $req->fetchAll();

}

function getlistBanqueBCAO(){
    $db = getConnexionBD();
      
      $sql="SELECT * FROM prospect WHERE banque='BCAO'";
      $req=$db->query($sql);
      return $req->fetchAll();

}


function getlistBanqueBHS(){
    $db = getConnexionBD();

      $sql="SELECT * FROM prospect WHERE banque='BHS'";
      $req=$db->query($sql);
      return $req->fetchAll();

}


function getlistBanqueBOA(){
    $db = getConnexionBD();
      
      $sql="SELECT * FROM prospect WHERE banque='BOA'";
      $req=$db->query($sql);
      return $req->fetchAll();

}


function getlistDiamondBank(){
    $db = getConnexionBD();
      
      $sql="SELECT * FROM prospect WHERE banque='Diamond Bank'";
      $req=$db->query($sql);
      return $req->fetchAll();

}


function getlistBanqueCMS(){
    $db = getConnexionBD();
      
      $sql="SELECT * FROM prospect WHERE banque='CMS'";
      $req=$db->query($sql);
      return $req->fetchAll();

}


function getlistBanqueMicrocred(){
    $db = getConnexionBD();
      
      $sql="SELECT * FROM prospect WHERE banque='Microcred'";
      $req=$db->query($sql);
      return $req->fetchAll();

}


function getlistBanqueEcobank(){
    $db = getConnexionBD();
      
      $sql="SELECT * FROM prospect WHERE banque='Ecobank'";
      $req=$db->query($sql);
      return $req->fetchAll();

}

function getlistBanquePamecas(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Pamecas'";
     $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBicis(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Bicis'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistMECTRANS(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='MECTRANS'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistCreditAgricol(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Credit Agricol'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistLaPOSTE(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='La POSTE'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistUBA(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='UBA'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBanqueIslamique(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Banque Islamique'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistCNCAS(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='CNCAS'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBSIC(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BSIC'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBNDE(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BNDE'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBAD(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BAD'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistOrabank(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Orabank'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBRM(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BRM'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBDK(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BDK'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistCitibankSenegal(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Citibank Sénégal'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBIS(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BIS'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBIMAO(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BIMAO'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistAliosFinance(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Alios Finance'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBGFI(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BGFI'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistLocafrique(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='Locafrique'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistCISA(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='CI-SA'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistFNB(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='FNB'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistCDS(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='CDS'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
function getlistBOAD(){
    $db = getConnexionBD();
      $sql="SELECT * FROM prospect WHERE banque='BOAD'";
      $req=$db->query($sql);
      return $req->fetchAll();

}
  ?>