<?php 
	session_start();
require_once '../model/usermodel.php';
require_once '../model/prospectModel.php';
require_once '../model/gestionnaireModel.php';
require_once '../model/AgenceModel.php';
 
$Prospect = getNbProspects();

$CDD = getNbCDD();
$CDI = getNbCDI();
$SansBque = getSansBanque();

$listgest=listeGest();

$listeProspet=listeProspet();

$listeProspetT=listeProspetT();
$listeProsNT=listeProspetNT();

$nbrprosCDD=getChartCDD();
$nbrprosCDI=getChartCDI();
$listeUtilisateurs=listeUtilisateurs();
$listcdd=getlistCDD();
$listcdi=getlistCDI();

$nbrSB=getSansBanque();
$nbrAB=getAvecBanque();

$listSB=listSansBanque();
$listAB=listAvecBanque();

/*afficher la liste de tout les agences*/
$listAgence=listeAgence();





$nbrAvecBanque = getAvecBanque();
$nbrAucuneBanque=getSansBanque();
$nbrBanquePAMECAS=getChartBanquePamecas();
$nbrBanqueAth=getChartBanqueAtlantique();
$nbrBanqueBCAO=getChartBanqueBCAO();
$nbrBanqueBHS=getChartBanqueBHS();
$nbrBanqueBOA=getChartBanqueBOA();
$nbrBanqueCBAO=getChartBanqueCBAO();
$nbrBanqueCMS=getChartBanqueCMS();
$nbrBanqueCNCAS=getChartBanqueCNCAS();
$nbrBanqueECOBANK=getChartEcobank();
$nbrBanqueBicis=getChartBanqueBicis();
$nbrBanqueMECTRANS=getChartBanqueMECTRANS();
$nbrBanqueBSIC=getChartBanqueBSIC();
$nbrBanqueCreditAgricol=getChartBanqueCreditAgricol();
$nbrBanqueDiamondBank=getChartBanqueDiamondBank();
$nbrBanqueLaPOSTE=getChartLaPOSTE();
$nbrBanqueMicrocred=getChartMicrocred();
$nbrBanqueUBA=getChartBanquePamecas();
$nbrBanqueBNDE=getChartBanqueNationalepourleDeveloppementEconomique();
$nbrBanqueBAD=getChartBanqueAfricainedeDéveloppement();
$nbrBanqueOrabank=getChartOrabank();
$nbrBanqueBRM=getChartBanqueRegionaledeMarches();
$nbrBanqueBDK=getChartBanquedeDakar();
$nbrBanqueCitibankSénégal=getChartCitibankSenegal();
$nbrBanqueBIS=getChartBanqueIslamiqueduSénégal();
$nbrBanqueBIMAO=getChartBanquedesInstitutionsMutualistesdAfriquedelOuest();
$nbrBanqueAliosFinance=getChartAliosFinance();
$nbrBanqueBGFIBank=getChartBGFIBank();
$nbrBanqueLocafrique=getChartCompagnieOuestAfricainedeCréditBail();
$nbrBanqueCISA=getChartCreditInternationalSénégal();
$nbrBanqueFNB=getChartFirstNigerianBankSenegal();
$nbrBanqueCDS=getChartCréditduSénégal();
$nbrBanqueBOAD=getChartBankOuestAfricainedeDeveloppement ();

// $listBA=getlistBanqueAtlantique();
// $listAB=getlistAucuneBanque();
// $listBCAO=getlistBanqueBCAO();
// $listBHS=getlistBanqueBHS();
// $listBOA=getlistBanqueBOA();
// $listCBA0=getlistBanqueCBA0();
// $listCMS=getlistBanqueCMS();
// $listCNCAS=getlistBanqueCNCAS();
// $listECOBANK=getlistBanqueECOBANK();
// $listPAMECAS=getlistBanquePAMECAS();


if (isset($_POST['connect'])) {
	 extract($_POST);
	 //$pw = md5($pwd);

	$user = getConnexion($email, $pwd);
	if ($user) {
		
		$_SESSION['nom'] = $user['nom'];
		$_SESSION['idUser'] = $user['idU'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['pwd'] = $user['password'];
		$_SESSION['role'] = $user['idrole'];
		if ($user['idrole'] == 1) {
		require_once '../views/admin/index.php';
		}else{
			require_once '../views/gestionnaire/index.php';
		} 

		}else {
			die("erreur");
		}
}
if (isset($_GET['page'])) {
	 switch ($_GET['page']) {
	 	case 'admin':
		require_once '../views/admin/index.php';
	 		break;
	 		case 'dpab':
		require_once '../views/admin/detailProspectAvecBank.php';
	 		break;
	 		case 'listeProspect':
		require_once '../views/admin/listeProspect.php';
	 		break;
	 		case 'detailProspect':
		require_once '../views/admin/detailProspect.php';
	 		break;
	 		case 'CDDCDI':
		require_once '../views/admin/detaillisteCDDCDI.php';
	 		break;
	 		case 'SBAB':
	 		require_once '../views/admin/detaillistprostectSBAB.php';
	 		break;
	 		case 'listeProstrait':
		require_once '../views/admin/listeProspectTrait.php';
	 		break;
	 		case 'listeNonProstrait':
		require_once '../views/admin/listeProspectNonTrait.php';
	 		break;
	 		case 'listeClient':
		require_once '../views/admin/listeClient.php';
	 		break;
	 		case 'listuser':
		require_once '../views/admin/listeUsers.php';
	 		break;
	 		case 'listGestionaire':
		require_once '../views/admin/listeGestionnaire.php';
	 		break;
	 		case 'EnvoyerFV':
		require_once '../views/admin/EnvoyerFV.php';
	 		break;
	 	default:
	 		break;
	 		
	 /************************Directeur*************************/
	 case 'dir':
		require_once '../views/directeur/index.php';
	 		break;
	 		case 'listeProspect_D':
		require_once '../views/directeur/listeProspect.php';
	 		break;
	 		case 'listeProstrait_D':
		require_once '../views/directeur/listeProspectTrait.php';
	 		break;
	 		case 'listeNonProstrait_D':
		require_once '../views/directeur/listeProspectNonTrait.php';
	 		break;
	 		case 'listeClient_D':
		require_once '../views/directeur/listeClients.php';
	 		break;
	 		case 'listGestionaire_D':
		require_once '../views/directeur/listeGestionnaire.php';
	 		break;
	 	/************************Gestionnaire*************************/
			 case 'gest':
		require_once '../views/gestionnaire/index.php';
	 		break;
	 		case 'listeProspect_G':
		require_once '../views/gestionnaire/listeProspect.php';
	 		break;
	 		case 'listeProstrait_G':
		require_once '../views/gestionnaire/listeProspectTrait.php';
	 		break;
	 		case 'listeNonProstrait_G':
		require_once '../views/gestionnaire/listeProspectNonTrait.php';
	 		break;
	 		case 'listeClient_G':
		require_once '../views/gestionnaire/listeClients.php';
	 		break;
	 }
				
	} else {
		die("erreur");
	}
?>