<?PHP
//Projet pour la matinale PULSAR

// Récupérer infos de google agenda

// planning semainier

//Decide pour le benevole des jours de sa chronique
//($id benevole + récupérer les n° semaines + les jours [lundi Mardi Mercredi...])

// Benevole peut inscrire dans une emission le titre de sa chronique
// Benevole peut evoyer un fichier (contenant sa chronique)

// Faire des rappels pour certaines emissions.
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

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//Semainier
/*	function JourParNrSemaine($Semaine,$Annee){
//Définir la date du Lundi de la semaine
 // si le 1er janvier est un jeudi -> S53 possible
 $PremierJeudi=date("d",strtotime('First Thursday January '.$Annee));
 if($PremierJeudi=='08'){$PremierJeudi=1;}
 //si le 1er janvier est avant le jeudi
 if($PremierJeudi>4){$JourSemaine[1]=date("Y-m-d",strtotime('First Monday January '.$Annee.' +'.($Semaine-1).' Week'));}
 //si le 1er janvier est apres le jeudi
 if($PremierJeudi<4){$JourSemaine[1]=date("Y-m-d",strtotime('Last Monday January '.$Annee.' +'.($Semaine-1).' Week'));}
 //si le 1er janvier est un lundi
 if($PremierJeudi==4){$JourSemaine[1]=date("Y-m-d",strtotime('First Thursday January '.$Annee.' +'.($Semaine-1).' Week - 3Days'));}
//remplissage de la semaine
 for($i=1; $i<=36;$i++){$JourSemaine[$i]=date("Y-m-d"",strtotime($JourSemaine[1].' +'.($i-1).'Day'));}

 var_dump($JourSemaine);
echo "<br>";
echo $JourSemaine['1'];
echo "<br>";
echo $JourSemaine['2'];
echo "<br>";
echo $JourSemaine['3'];
echo "<br>";
echo $JourSemaine['4'];
echo "<br>";

 return $JourSemaine;
}
*/
	function semainier($semaine,$annee){

		//Ecrit un tableau semainier en fonction de la semaine, du mois et de l'année indiquée
		//Recupere le numero des jours de la semaine
		$Lundi =    date("d", strtotime('First Monday January '.$annee.' +'.($semaine-1).' Week'));
		$Mardi =    date("d", strtotime('First Monday January '.$annee.' +'.($semaine-1).' Week +1 day'));
		$Mercredi = date("d", strtotime('First Monday January '.$annee.' +'.($semaine-1).' Week +2 day'));
		$Jeudi =    date("d", strtotime('First Monday January '.$annee.' +'.($semaine-1).' Week +3 day'));
		$Vendredi = date("d", strtotime('First Monday January '.$annee.' +'.($semaine-1).' Week +4 day'));
		$Samedi =   date("d", strtotime('First Monday January '.$annee.' +'.($semaine-1).' Week +5 day'));
		$Dimanche = date("d", strtotime('First Monday January '.$annee.' +'.$semaine.' Week -1 day'));

		$joursDeLaSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
		$joursDeLaSemaineVariables = [$Lundi, $Mardi, $Mercredi, $Jeudi, $Vendredi, $Samedi, $Dimanche];
		echo $semaine;
		/*
		$semainePrec = --$semaine;
		$semaineSui = $semaine = $semaine+2;
		*/
		echo $semaine;
		$j = 1;
		$champ = '<div class="chron">	Nom du Chroniqueur<textarea>En attente du titre de la chronique</textarea><!--<input type="file" name="nom" />--></div>';

			echo '<table>
			<tr>
				<td id="semainePrec">
				<a   href="index.php?semaine='.$semainePrec.'"></a>
				</td>
				<td colspan="5" id="semaineCours"> Semaine '.$semaine.' du '.$Lundi.' au '.$Dimanche.'
				</td>
				<td id="semaineSui">
				<a  href="index.php?semaine='.$semaineSui.'"></a>
				</td>
			</tr>
			<tr id="lnJoursSemaine">';

			for($i = 0 ; $i < 7 ; $i++)
				{
					echo '<td class="nomJours">'.$joursDeLaSemaine[$i]." ". $joursDeLaSemaineVariables[$i].'</td>';
					$j++;
				}
				echo '</tr><tr>';
			for($i = 0 ; $i < 7 ; $i++)
				{
					echo '<td class="contenuJours"><input type="button" value="chronique"></td>';
				}
			echo '</table>';
			}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	function ajoutChroniqueur(){
			echo '<td>'.$champ.'</td>';
	}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	function listeNumSem($numSemCours,$numSemSelec){
		for ($i=1; $i < 53; $i++) {
		 	if ($i==$numSemCours){
				echo '<a href="index_admin.php?page=semainier&semaine='.$i.'"><div class="num" value="idS'.$i.'" name="nameS'.$i.'" id="numSemCours">'.$i.'</div><a>';
				}
			else if ($i==$numSemSelec){
				echo '<a href="index_admin.php?page=semainier&semaine='.$i.'"><div class="num" value="idS'.$i.'" name="nameS'.$i.'" id="numSemSelec">'.$i.'</div><a>';
				}
			else{
				echo '<a href="index_admin.php?page=semainier&semaine='.$i.'"><div class="num" value="idS'.$i.'" name="nameS'.$i.'" name="nameS'.$i.'">'.$i.'</div><a>';}
				}
	}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	 function identifieUtilisateur($id){
        connexion();
        global $infosUser,$idcom;
        $requeteUserExist=" SELECT id_chroniqueur, nom, prenom, password, annee_diff, mail,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche FROM chroniqueur WHERE nom = '$id'; ";
        var_dump($requeteUserExist);
        $resultatExiste=$idcom->query($requeteUserExist);
        $infosUser=$resultatExiste->fetch();
        var_dump($infosUser);
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


    function recupEmissionsId($dateSelected){
    	connexion();
    	global $idcom,$compteur;
    	$requeteRecupIdEmision="SELECT id_emission FROM emissions WHERE date_diff='$dateSelected';";
    	$EmissionId=$idcom->query($requeteRecupIdEmision);
    	$EmId1=$EmissionId->fetch();
        return $EmId1;
    }

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

// foreach ($_POST as $id => $valeur){
// 	$cmd1='$'.$id.'="";'; //	echo $cmd1.'<br/>';
// 	eval($cmd1);
// 	$cmd2 = 'if (isset($_POST["'.$id.'"])) {$'.$id.'=$_POST["'.$id.'"]; unset($_POST["'.$id.'"]); } '; //	echo $cmd2.'<br/>';
// 	eval($cmd2);
// }

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
// function PourChroniqueur($jourselectionne,$idChroniqueur){

// //affiche tout ce qu'il faut
// echo '<a href=""><div><textarea></textarea></div><a>';

// }



//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
?>
