<?php 
function getChartBanqueAtlantique(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Banque Atlantique'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}


function getChartBanqueBHS(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BHS'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}


function getChartBanqueBOA(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BOA'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}


function getChartBanqueCBAO(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='CBAO'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}

function getChartBanqueIslamique(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BanqueIslamique'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}

function getChartBanqueBicis(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Bicis'";
      $req2=$db->query($sql2);
      return $req2->rowCount();

}

function getChartBanqAtlantique(){
    $db = getConnexionBD();
      $sql2="SELECT * FROM prospect WHERE banque='Banque Atlantique'";
      $req2=$db->query($sql2);
      return $req2->rowCount();
}

function getChartBanqueMECTRANS(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='MECTRANS'";
      $req2=$db->query($sql2);
      return $req2->rowCount();
}

function getChartBanquePamecas(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Pamecas'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}

function getChartBanqueBSIC(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BSIC'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartBanqueCMS(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='CMS'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartBanqueCNCAS(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='CNCAS'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartBanqueBCAO(){
   $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BCAO'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartBanqueCreditAgricol(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Credit Agricol'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartBanqueDiamondBank(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Diamond Bank'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartEcobank(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Ecobank'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartLaPOSTE(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='La POSTE'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartMicrocred(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Microcred'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

}
function getChartUBA(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='UBA'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBanqueNationalepourleDeveloppementEconomique (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BNDE'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBanqueAfricainedeDéveloppement (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BAD'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartOrabank(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Orabank'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBanqueRegionaledeMarches (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BRM'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBanquedeDakar (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BDK'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartCitibankSenegal(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Citibank Sénégal'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBanqueIslamiqueduSénégal (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BIS'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBanquedesInstitutionsMutualistesdAfriquedelOuest (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BIMAO'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartAliosFinance(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Alios Finance'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBGFIBank (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BGFI'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartCompagnieOuestAfricainedeCréditBail (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='Locafrique'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartCreditInternationalSénégal (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='CI-SA'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartFirstNigerianBankSenegal (){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='FNB'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartCréditduSénégal(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='CDS'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 
function getChartBankOuestAfricainedeDeveloppement(){
    $db = getConnexionBD();
      
      $sql2="SELECT * FROM prospect WHERE banque='BOAD'";
      $req2=$db->query($sql2);
      $s=$req2->rowCount();
      return $req2->rowCount();

} 































 ?>