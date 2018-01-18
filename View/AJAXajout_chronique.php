    <?PHP
include_once("../Modele/getallparams.php");
include_once("../Modele/connexion.php");

//include_once("../Modele/model.php");
//$nom='LEMOINE';
//$prenom='Bertrand';

//  vérification de l'absence de l'adhérent
$bd_titre=utf8_decode(urldecode($titre));
$bd_texte=utf8_decode(urldecode($texte));
$bd_dateSelec=utf8_decode(urldecode($dateSelec));
$bd_id_chroniqueur=utf8_decode(urldecode($id_chroniqueur));
//$bd_prenom=str_replace('%20',' ',$bd_prenom);
//$bd_nom=str_replace('%20',' ',$bd_nom);
$bd_titre=str_replace("'", "\'", $bd_titre);
$bd_texte=str_replace("'", "\'", $bd_texte);
$bd_titre=str_replace('"', '\"', $bd_titre);
$bd_texte=str_replace('"', '\"', $bd_texte);

$requeteRecupIdEmission="SELECT id_emission FROM emissions WHERE date_diff='$bd_dateSelec';";
$resultatDate=$db->query($requeteRecupIdEmission);
$res = $resultatDate -> fetch();
$dateEm=$res['id_emission'];


$verifEmissionExiste="SELECT id_emission FROM contenu WHERE id_emission='$dateEm' AND id_chroniqueur='$bd_id_chroniqueur';";
$resVerif=$db->query($verifEmissionExiste);
$res = $resVerif -> fetch();

if (!($res == false)){
	$mess="Il y a déjà un contenu";
}else{

$rq_recherche="INSERT INTO contenu (titre, texte,id_chroniqueur,id_emission) VALUE ('$bd_titre','$bd_texte','$bd_id_chroniqueur','$dateEm');";
$resultat=$db->exec($rq_recherche);  // lance la requête

if (strlen($resultat)<1) {
  $mess="Erreur ça marche pas";

  }else{
    $mess="Enregistrement effectué";
  }
}
echo $mess;

?>
