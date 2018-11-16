<?php 
	session_start();
	require_once '../model/userModel.php';
	require_once '../model/liste_erreurModel.php';
	require_once '../model/agenceModel.php';
	require_once '../model/roleModel.php';
	require_once '../model/uniteCommerciale.php';
	require_once '../model/commentaireModel.php';
			$nbList = getNbErreur();
			$nbAgence = getNbAgence();
			$listErreur = getlisteErreur50mil();
			// $listeErreurAll = getlistErreurAll();
			$listeAgenceByErreur = getlisteAgenceByErreur();
			$listAgence = listeAgence();
			$listeUser = listeUser();
			$listeRole = listeRole();
			$listeUC = listeUC();
			$role = getlisterole();
			$nbCommentaire= getNBCommentaire();
			//$editer=updateUC();
			if (isset($_POST['envoyer'])) {
				extract($_POST);
				$exe=AjouterCommentaire($id_com,$commentaire,$status);
				var_dump($exe);
				require_once '../view/agent/listeErreur.php';

			}
			if (isset($_POST['addUC'])) {
				extract($_POST);
				$exe=ajouterUC($Code_UC,$Nom_UC);
				require_once '../view/admin/listeUC.php';
			}
			if (isset($_POST['modifUC'])) {
				extract($_POST);
				$exe=updateUC($id,$Code_UC,$Nom_UC);
				require_once '../view/admin/listeUC.php';
			}
			if (isset($_POST['addAgence'])) {
				extract($_POST);	
				$exe=AjouterAgence($codeAgence_UC,$libelleAgence,$id_unite);
				require_once '../view/admin/listeagence.php';
			}

if (isset($_POST['connect'])) {
	
	 extract($_POST);
	 //$password=md5($password);
	$user = getConnexion($username, $password);

	if ($user) {

        $_SESSION['id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['password'] = $user['password'];
		$_SESSION['id_role'] = $user['id_role'];
		if ($user['id_role'] == 1) {	
		require_once '../view/admin/index.php';
		//die("oki");
		}elseif ($user['id_role'] == 2) {
			require_once '../view/agent/index.php';
		}elseif ($user['id_role'] == 3) {
			require_once '../view/responsableAgence/index.php';
		}elseif ($user['id_role'] == 4) {
			require_once '../view/responsableGerantCaisse/index.php';
		}else{
		 require_once '../view/IGAD/index.php';
		}
		} else {
			require_once '../view/error/error.php';
		}
}

if (isset($_GET['page'])) {
	 switch ($_GET['page']) {
	 	case '1':
		require_once '../view/admin/index.php';
	 		break;
	 		case '2':
		require_once '../view/admin/liste.php';
	 		break;
	 		case '3':
		require_once '../view/admin/listeagence.php';
	 		break;
	 		case '4':
		require_once '../view/admin/listeutilisateurs.php';
	 		break;
	 		case '5':
		require_once '../view/admin/listeroles.php';
	 		break;
	 		case '6':
		require_once '../view/admin/listeUC.php';
	 		break;
	 		// Risque Operationnelle 
	 		case '7':
		require_once '../view/agent/index.php';
	 		break;
	 		case '8':
		require_once '../view/agent/listeErreur.php';
	 		break;
	 	
	 	default:
	 		break;
	 }
				
	} else {
		die("die error");
	}

?>