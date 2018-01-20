<?PHP

require("../Modele/commun.inc");

function connexion(){
        global $DB_SERVER, $HTTP_HOST, $DB_LOGIN, $DB_PASSWORD, $DB, $DOCROOT, $idcom ;
     try{
         $idcom = new PDO("mysql:host=$HTTP_HOST;dbname=$DB;charset=utf8", $DB_LOGIN, $DB_PASSWORD);
         }
        catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
         }
        return $idcom;
    }

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function SupprimeSession(){

        session_destroy();

    }
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function creatUser($nom1,$prenom1,$mail1,$annee_diff1,$mdp1,$lundi1,$mardi1,$mercredi1,$jeudi1,$vendredi1,$samedi1,$dimanche1){
        connexion();
        global $idcom,$compteur;
        $requeteEnregistre="INSERT INTO chroniqueur (`nom`, `prenom`,`mail`, `annee_diff`, `password`,`lundi`,`mardi`,`mercredi`,`jeudi`,`vendredi`,`samedi`,`dimanche`) VALUES ('$nom1','$prenom1','$mail1','$annee_diff1','$mdp1','$lundi1','$mardi1','$mercredi1','$jeudi1','$vendredi1','$samedi1','$dimanche1');";
         $compteur=$idcom->exec($requeteEnregistre);
        return $compteur;
     }

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

$page="";
if (isset($_GET["page"]))
{$page = ($_GET["page"]);}


$id_utilisateur ="";
if (isset($_POST["id"]))
  {$id_utilisateur = ($_POST["id"]);}

$motdepasse ="";
if (isset($_POST["psw"]))
  {$motdepasse = ($_POST["psw"]);}


date_default_timezone_set('Europe/Paris');
$date_test = date('Y-m-d');
$good_format=strtotime($date_test);
$numSemCours = date('W',$good_format);
$anneeEnCours = date('Y',$good_format);
$moisEnCours = date('m',$good_format);

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////


	function premier_jour($annee)
		{
		$jeudi = "Thursday";
		$jour = 1;
		while(date("l",mktime(0,0,0,1,$jour,$annee)) != $jeudi)
		     {
		        $jour++;
		     }
		$nb_jour = 7 - $jour;
		return ($nb_jour);
		}

	function jeudi_semaine($annee,$semaine)
	     {
	     $mois = date("m",mktime(0,0,0,1,(($semaine)*7)-premier_jour($annee),$annee));//tu cas remplace ici pour avoir le mois
	     return $mois;
	     }




	function semainier($semaine,$annee,$mois){

		//Ecrit un tableau semainier en fonction de la semaine, du mois et de l'année indiquée
		//Recupere le numero des jours de la semaine
		$Lundi =    date("d", strtotime('Monday January '.$annee.' +'.($semaine-1).' Week'));
		$Mardi =    date("d", strtotime('Monday January '.$annee.' +'.($semaine-1).' Week +1 day'));
		$Mercredi = date("d", strtotime('Monday January '.$annee.' +'.($semaine-1).' Week +2 day'));
		$Jeudi =    date("d", strtotime('Monday January '.$annee.' +'.($semaine-1).' Week +3 day'));
		$Vendredi = date("d", strtotime('Monday January '.$annee.' +'.($semaine-1).' Week +4 day'));
		$Samedi =   date("d", strtotime('Monday January '.$annee.' +'.($semaine-1).' Week +5 day'));
		$Dimanche = date("d", strtotime('Monday January '.$annee.' +'.$semaine.' Week -1 day'));

		$joursDeLaSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
		$joursDeLaSemaineVariables = [$Lundi, $Mardi, $Mercredi, $Jeudi, $Vendredi, $Samedi, $Dimanche];


		//$semainePrec = --$semaine;
		//$semaineSui = $semaine = $semaine+2;




		$j = 1;
		$champ = '<div class="chron">	Nom du Chroniqueur<textarea>En attente du titre de la chronique</textarea><!--<input type="file" name="nom" />--></div>';

			echo '
			<tr><th id="semainePrec">
			
			</td>
			
			
			<tr>
			<td colspan="5" id="semaineCours"> Semaine '.$semaine.' du '.$Lundi.' au '.$Dimanche.'</td>
			</tr>
			
			<td id="semaineSui">
			
						
			<tr id="lnJoursSemaine">
			
			<table class="table table-bordered table-striped">
				<thead class="thead-light">';

					for($i = 0 ; $i < 7 ; $i++)
						{
							echo '<th class="nomJours">'.$joursDeLaSemaine[$i]." ". $joursDeLaSemaineVariables[$i].'</th>';
							$j++;
						}	

			echo '</thead>
			  	<tbody>
					<tr>';
				for($i = 0 ; $i < 7 ; $i++)
					{	
						$dateAffiche = $annee .'-'. $mois .'-'. $joursDeLaSemaineVariables[$i];
						$retour_affichage=AfficheChroniqueAdmin($dateAffiche);

						echo '<td class="contenuJours">
							    <div id="'.$dateAffiche.'" value="'.$dateAffiche.'">
							    	<input type="" value="'.$dateAffiche.'">
							    </div>
							    '.$retour_affichage;

    					
							$informations=recupInfos1($dateAffiche);
							var_dump($informations);
						echo '</td>';
						      
					}
			echo '</tr>
				</tbody>
			</table>';
			}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	function AfficheChroniqueAdmin($bim){
			return $bim;
	}

	function ajoutChroniqueur(){
			echo '<td>'.$champ.'</td>';
	}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	function listeNumSem($numSemCours,$numSemSelec){

		for ($i=1; $i < 53; $i++) {

		 	if ($i==$numSemCours){
				echo '<li class="page-item">
						<a value="idS'.$i.'" class="num page-link" id="numSemCours" href="index_admin.php?page=semainier&semaine='.$i.'">
						'.$i.'
						</a>
					</li>';
				}
			else if ($i==$numSemSelec){
				echo '<li class="page-item">
						<a value="idS'.$i.'" class="num page-link"  id="numSemSelec" href="index_admin.php?page=semainier&semaine='.$i.'">
							'.$i.'
						</a>
					</li>';
				}
			else{
				echo '<li class="page-item">
						<a value="idS'.$i.'" class="num page-link" href="index_admin.php?page=semainier&semaine='.$i.'">
							'.$i.'
						</a>
					</li>';
				}
			}
	}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	 function identifieUtilisateur($id){
        connexion();
        global $infosUser,$idcom;
        $requeteUserExist=" SELECT id_chroniqueur, nom, prenom, password, annee_diff, mail,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche FROM chroniqueur WHERE nom = '$id'; ";
        $resultatExiste=$idcom->query($requeteUserExist);
        $infosUser=$resultatExiste->fetch();
        return $infosUser;
    }
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
    function identifieJours($id){
		connexion();
		global $infosUser,$idcom;
		$requette=" SELECT lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche FROM chroniqueur WHERE id_chroniqueur = '$id';";
		$resultatExiste=$idcom->query($requette);
		$infosJours=$resultatExiste->fetch();

        return $infosJours;

}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
    function creatContenu($titre1,$texte1,$id_chroniqueur1,$id_emission1){
    	 connexion();
        global $idcom,$compteur;
        $requeteEnregistreContenu="INSERT INTO contenu (`titre`, `texte`,`id_chroniqueur`,`id_emission`) VALUES ('$titre1','$texte1','$id_chroniqueur1','$id_emission1');";
        $compteur=$idcom->exec($requeteEnregistreContenu);
        return $compteur;
    }

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

    function recupEmissionsId($dateSelected){
    	connexion();
    	global $idcom,$compteur;
    	$requeteRecupIdEmision="SELECT id_emission FROM emissions WHERE date_diff='$dateSelected';";
    	$EmissionId=$idcom->query($requeteRecupIdEmision);
    	$EmId1=$EmissionId->fetch();
        return $EmId1;
    }
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

    function recupInfos($id_em1,$id_chroniqueur1){
    	connexion();
    	global $idcom,$compteur;
    	$requeteRecupIdEmision="SELECT titre, texte, contenu.id_emission FROM contenu INNER JOIN emissions ON emissions.id_emission=contenu.id_emission WHERE emissions.id_emission='$id_em1' AND contenu.id_chroniqueur='$id_chroniqueur1';";
    	$EmissionId=$idcom->query($requeteRecupIdEmision);
        $EmId1=$EmissionId->fetch();
        return $EmId1;
    }

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

 function recupInfos1($dateEmission){
    	connexion();
    	global $idcom,$compteur;
    	$requeteRecupIdEmision="SELECT texte, titre, date_diff, emissions.id_emission FROM emissions INNER JOIN contenu ON emissions.id_emission=contenu.id_emission WHERE date_diff='$dateEmission'";
    	$EmissionId=$idcom->query($requeteRecupIdEmision);
        $EmId1=$EmissionId->fetch();
        return $EmId1;
    }