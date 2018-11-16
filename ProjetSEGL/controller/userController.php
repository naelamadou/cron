<?php 
	session_start();
	require_once '../model/userModel.php';
	require_once '../model/liste_erreurModel.php';
	require_once '../model/agenceModel.php';
	require_once '../model/roleModel.php';
	require_once '../model/uniteCommerciale.php';
	require_once '../model/commentaireModel.php';
	require_once '../model/grilleModel.php';
	require_once '../model/listeTraiteModel.php';
	require_once '../model/poursuiteModel.php';
	$base_url ="http://localhost/mesprojets/ProjetSEGL/controller/userController.php";
			$nbList = getNbErreur();
			$nbAgence = getNbAgence();
			$listErreur = getlisteErreur50mil();
			$nbgrille=nbgrille();
			// $listeErreurAll = getlistErreurAll();
			$listeAgenceByErreur = getlisteAgenceByErreur();
			$listeAgence = listeAgence();
			$listeUser = listeUser();
			$listeRole=listeRole();
			$listeUC = listeUC();
			$role = getlisterole();
			$nbCommentaire= getNBCommentaire();
			$getlisteCommentaire=getlisteCommentaire();
			$getlisteUserByResponsable=getlisteUserByResponsable();
			$getlisteErreurCommente=getlisteErreurCommente();
			$listeAgenceByUcByUsers=listeAgenceByUcByUsers();
			$getNblisteNonTraite=getNblisteNonTraite();
			$getlisteUserByIGAD=getlisteUserByIGAD();
			$nbErreurSup50mil=nbErreurSup50mil();
			$nbErreurInf50mil=nbErreurInf50mil();
			$NBErreurBetween50and300=NBErreurBetween50and300();
			//$editer=updateUC();

			if (isset($_POST['envoyerCommentaire'])) {
				$_POST['envoyerCommentaire']=strip_tags($_POST['envoyerCommentaire']);
				extract($_POST);
				//var_dump($_POST);
				$desc_com=addslashes($desc_com);
				$exe=AjouterCommentaire($id_users,$id_erreur,$desc_com,$status,$id_agence);
				//var_dump($exe);
				$update=UpdateErreurByStatus($id_erreur);
				//include '../view/agent/listeErreur.php';
				
				header("location:$base_url?page=8&envoyer=1");   
			}
			if (isset($_POST['envoyerPoursuite'])) {
			extract($_POST);
			var_dump($_POST);
			$desc_com=addslashes($desc_com);
			$exe=AjouterPoursuite($fichier,$desc_com,$id_users,$id_listeErreur);
			//var_dump($exe);
			$update=UpdateErreurByStatusGrillIGAD($id_listeErreur);
			//include '../view/agent/listeErreur.php';
			header("location:$base_url?page=12&envoyer=1");   
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
			/* Ajouter Agence*/
			if (isset($_POST['addAgence'])) {
				extract($_POST);
				//var_dump($_POST);
				$exe=AjouterAgence($codeAgence_UC,$libelleAgence,$id_unite,$id_resp);
				//var_dump($exe);
				header("location:$base_url?page=3&envoyer=1");	
				
			}
			/** Modifier Agence*/

			if (isset($_POST['Modifieragence'])) {
				extract($_POST);
				//var_dump($_POST);
				$exe=ModifierAgence($id,$codeAgence_UC,$libelleAgence,$id_unite,$id_resp);
				//var_dump($exe);
				//require_once '../view/admin/listeagence.php';	
				header("location:$base_url?page=3&modifier=1");
			}
			/*Supprimer une Agence */
			if (isset($_POST['Supprimeragence'])) {
				extract($_POST);
				//var_dump($_POST);
				$exe=SupprimerAgence($id);
				var_dump($exe);
				//require_once '../view/admin/listeagence.php';	
				//header("location:$base_url?page=3&modifier=1");
			}
			

			if (isset($_POST['addGrille'])) {
				extract($_POST);
				var_dump($_POST);
				if(isset($_FILES['fichier']))
				{ 
						var_dump($_FILES);
				     $dossier = '../upload/';
				     $fichier = basename($_FILES['fichier']['name']);
				     if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				     {
				          $exe=AjouterGrille($fichier,$id_responsable,$id_listeErreur);
				          //var_dump($exe);
						//require_once '../view/responsableAgence/listeErreur.php';
				          $UpdateErreurByStatusGrille=UpdateErreurByStatusGrille($id_listeErreur);
				          header("location:$base_url?page=11&envoyer=1"); 
				     }
				     else //Sinon (la fonction renvoie FALSE).
				     {
				          echo 'Echec de l\'upload !';
				     }
				}
				
				//$exe=AjouterGrille($fichier,$id_responsable);
				//require_once '../view/responsableAgence/listeErreur.php';	
			}
			// magic code de graficart 
			foreach ($_POST as $key => $value) {
				$_POST[$key]=stripslashes($value);
			}

if (isset($_POST['connect']) && !empty($_POST['email']) && !empty($_POST['password'])) {
	
	 extract($_POST);
	 $password=md5($password);
	 $email=addslashes($email);
	$user = getConnexion($email,$password);

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
		}elseif($user['id_role'] == 5){
		 require_once '../view/IGAD/index.php';
		}
		} else {
			require_once '../view/error/error.php';
		}
}

if (isset($_GET['page'])) {
	 switch ( $_GET['page']) {
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
	 	case '9':
			require_once '../view/agent/listeErreurTraitee.php';
	 	break;
	 	case '12':
			require_once '../view/agent/listeGrille.php';
	 	break;
	 	case '13':
			require_once '../view/agent/listeErreurInf50.php';
	 	break;

	 		//responsable agence
	 	case '10':
			require_once '../view/responsableAgence/index.php';
	 	break;
	 	case '11':
			require_once '../view/responsableAgence/listeErreur.php';
	 	break;
	 			/*IGAD*/
 		case '14':
		require_once '../view/IGAD/index.php';
	 	break;
	 	case '15':
		require_once '../view/IGAD/listeErreur.php';
	 	break;

	 	/*case 'decon':
	 		$_SESSION =array();
	 		session_destroy();
			require_once './../index.php';
	 	break;*/
	 	
	 	default:
	 	require_once '../view/error/error.php';
	 		break;
	 }
				
	} 

?>