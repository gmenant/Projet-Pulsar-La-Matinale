    <?PHP
include_once("../Modele/getallparams.php");
include_once("../Modele/connexion.php");





$bd_dateSelec=utf8_decode(urldecode($dateSelec));
$bd_id_chroniqueur=utf8_decode(urldecode($id_chroniqueur));
$bd_titre=utf8_decode(urldecode($titre));
$bd_texte=utf8_decode(urldecode($texte));

$bd_titre=str_replace("'", "\'", $bd_titre);
$bd_texte=str_replace("'", "\'", $bd_texte);
$bd_titre=str_replace('"', '\"', $bd_titre);
$bd_texte=str_replace('"', '\"', $bd_texte);



$requeteRecupIdEmission="SELECT id_emission FROM emissions WHERE date_diff='$bd_dateSelec';";
$resultatDate=$db->query($requeteRecupIdEmission);
$res = $resultatDate -> fetch();
$dateEm=$res['id_emission'];

$requeteRecupIdEmision="UPDATE contenu INNER JOIN emissions ON emissions.id_emission=contenu.id_emission
          SET
            titre='$bd_titre',
            texte='$bd_texte'
          WHERE emissions.id_emission='$dateEm' AND contenu.id_chroniqueur='$bd_id_chroniqueur';";
var_dump($requeteRecupIdEmision);

$EmissionId=$db->query($requeteRecupIdEmision);
$EmId1=$EmissionId->fetch();

$mess=$EmId1['titre'].'|'.$EmId1['texte'];


$mess=utf8_encode($mess);
echo $mess;
?>
