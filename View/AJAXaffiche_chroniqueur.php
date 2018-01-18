    <?PHP
include_once("../Modele/connexion.php");
include_once("../Modele/getallparams.php");

$requeteRecupChroniqueurs="SELECT * FROM chroniqueur;";
$requeteRecupChroniqueursQuery=$db->query($requeteRecupChroniqueurs);
$mess='<div class="card"><div class="card-header"><h5>Chroniqueurs inscrits</h5></div><div class="card_body container-fluid">';
while ($res = $requeteRecupChroniqueursQuery->fetch()){
      $mess=$mess.'<div>'.$res['nom'].' '.$res['prenom'].'</div>';

}
$mess=$mess.'</div></div>';
echo $mess;


?>
