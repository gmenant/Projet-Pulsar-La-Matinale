   <?PHP
  include('../Modele/model.php');

  $Nom       = $_POST['nom'];
  $Prenom    = $_POST['prenom'];
  $Annee_diff = $_POST['annee_diff'];
  $Mail      = $_POST['mail'];
  $Password  = $_POST['password'];
  $Lundi   = 0;
  $Mardi   = 0;
  $Mercredi= 0;
  $Jeudi   = 0;
  $Vendredi= 0;
  $Samedi  = 0;
  $Dimanche= 0;

  if(isset($_POST['joursDiff']) && !empty($_POST['joursDiff'])){

  $joursDiff = $_POST['joursDiff'];
    foreach ($joursDiff as $v) {
        var_dump($v);
        echo $v;
        $$v = $v;
        $$v = true;

      }
  }

creatUser($Nom,$Prenom,$Mail,$Annee_diff,$Password,$Lundi,$Mardi,$Mercredi,$Jeudi,$Vendredi,$Samedi,$Dimanche);

  ?>
