<?PHP
header('Content-Type: text/html; charset=utf-8');

include_once("getallparams.php");
include_once("connexion.php");

//$nom='LEMOINE';
//$prenom='Bertrand';

//  vérification de l'absence de l'adhérent
$bd_date=utf8_decode($date);
$rq_recherche="	SELECT texte, titre, nom_fichier, id_chroniqueur, id_emission, id_contenu FROM contenu 
				INNER JOIN chroniqueur ON chroniqueur.id_chroniqueur=contenu.id_chroniqueur 
				INNER JOIN diffuse ON chroniqueur.id_chroniqueur=diffuse.id_chroniqueur 
				INNER JOIN emissions ON emissions.id_emission=diffuse.id_emission
				INNER JOIN fichier ON contenu.id_contenu=fichier.id_contenu
				WHERE id_chroniqueur='' AND id_emission='';";
$rc="<br/>\n";									// passe à la ligne
//echo $flag_connect.$rc;
//$rq_verif.$rc;
$resultat=$db->query($rq_recherche);	// lance la requête
//var_dump($resultat);
$enreg=$resultat->fetch();				// récupère le premier enregistrement trouvé
if (is_array($enreg)) {					// l'adhérent existe déjà
		$mess = $enreg['nom'] .' | '.$enreg['prenom'] .' | '.$enreg['adresse1'] .' | '.$enreg['adresse2'] .' | '.$enreg['cp'] .' | '.$enreg['ville'] .' | '.$enreg['section'] .' | '.$enreg['tel_dom'] .' | '.$enreg['sexe'];
//		$mess= "L'adhérent ".$prenom.$nom." existe déjà. Ajout impossible.".$rc;
			$mess=utf8_encode($mess);
}
else {													// l'adhérent n'existe pas dans la table
	$mess="Erreur : l'emission du $bd_date n'a pas été trouvé";
}
$resultat->closeCursor();
echo $mess;
?>
