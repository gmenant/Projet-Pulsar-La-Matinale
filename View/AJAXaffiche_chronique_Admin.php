   <?PHP
include_once("../Modele/connexion.php");
include_once("../Modele/getallparams.php");

$requeteRecupChroniqueurs="SELECT * FROM chroniqueur Ch INNER JOIN contenu Co ON Co.id_chroniqueur=Ch.id_chroniqueur INNER JOIN emissions E ON E.id_emission=Co.id_emission;";
$requeteRecupChroniqueursQuery=$db->query($requeteRecupChroniqueurs);
$mess='<div class="card"><div class="card-header"><h5>Chroniqueurs inscrits</h5></div><div class="card_body container-fluid">';


while ($res = $requeteRecupChroniqueursQuery->fetch()){
      $mess=$mess.'<div class="row" id='.$res['date_diff'].'><div class="col">'.$res['nom'].' '.$res['prenom'].'</div></div>';

}
$mess=$mess.'</div></div>';
echo $mess;


?>