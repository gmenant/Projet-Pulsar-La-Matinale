<?PHP
  include('../Modele/model.php');

  $Nom       = $_POST['nom1'];
  $Prenom    = $_POST['prenom1'];
  $Annee_diff = $_POST['anee_diff1'];
  $Mail      = $_POST['mail1'];
  $Password  = $_POST['password1'];
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
