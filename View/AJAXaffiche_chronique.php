<?PHP
header('Content-Type: text/html; charset=utf-8');
include_once("../Modele/getallparams.php");
include_once("../Modele/connexion.php");



$bd_dateSelec=utf8_decode(urldecode($dateSelec));

//$bd_prenom=str_replace('%20',' ',$bd_prenom);
//$bd_nom=str_replace('%20',' ',$bd_nom);


$requeteRecupIdEmission="SELECT id_emission FROM emissions WHERE date_diff='$bd_dateSelec';";
$resultatDate=$db->query($requeteRecupIdEmission);
$res = $resultatDate -> fetch();
$dateEm=$res['id_emission'];


$requeteRecupIdEmision="SELECT titre, texte, contenu.id_emission FROM contenu INNER JOIN emissions ON emissions.id_emission=contenu.id_emission WHERE emissions.id_emission='$dateEm';";
$EmissionId=$db->query($requeteRecupIdEmision);
$EmId1=$EmissionId->fetch();
$mess=$EmId1['titre'].'|'.$EmId1['texte'].'|'.$bd_dateSelec;

$mess=utf8_encode($mess);


echo $mess;
?>
