<?php

include('../Modele/model.php');
include('../View/enteteChroniqueur.php');
session_start();

$id_utilisateur ="";
if (isset($_POST["nom"]))
  {$id_utilisateur = ($_POST["nom"]);}

$motdepasse ="";
if (isset($_POST["psw"]))
  {$motdepasse = ($_POST["psw"]);}

if (isset($_GET["semaine"]))
{	$numSemSelec = $_GET["semaine"];}
else
{	$numSemSelec = $numSemCours;}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

switch("$page"){

	case('identifier'):
		identifieUtilisateur($id_utilisateur);

		if($infosUser and $infosUser['password'] == $motdepasse){
			$_SESSION['id']                 = $infosUser['id_chroniqueur'];
	        $_SESSION['nom']     			= $id_utilisateur;
	        $_SESSION['password']     		= $motdepasse;
	        $_SESSION['prenom']             = $infosUser['prenom'];
	        $_SESSION['annee_diff']         = $infosUser['annee_diff'];
	        $_SESSION['lundi']              = $infosUser['lundi'];
	        $_SESSION['mardi']              = $infosUser['mardi'];
	        $_SESSION['mercredi']           = $infosUser['mercredi'];
	        $_SESSION['jeudi']              = $infosUser['jeudi'];
	        $_SESSION['vendredi']           = $infosUser['vendredi'];
	        $_SESSION['samedi']             = $infosUser['samedi'];
	        $_SESSION['dimanche']           = $infosUser['dimanche'];

	        
	        echo "<meta http-equiv='refresh' content='1;URL=../Controller/index_chroniqueur.php?page=semainier'>";
		     }
		     else
		     {
		     	echo "<br/> Identifiant introuvable ...";
		        include '../View/vueLogin.php';
		     }
	break;
	case 'semainier':
		include('../View/vueSemainierChroniqueur.php'); 
	break;

	case 'Login';
		include('../View/vueLogin.php');
	break;

	case 'enregChronique';
		include('../View/vueEnregChronique.php');
	break;

	case 'afficheChronique';
		include('../View/afficheChronique.php');
	break;

	default:
		include '../View/vueLogin.php';
		     
		}
include('../View/pied.php');
?>

