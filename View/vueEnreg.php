   <?PHP
  include('../Modele/model.php');

  $Nom       = $_POST['nom'];
  $Prenom    = $_POST['prenom'];
  $Annee_diff = $_POST['annee_diff'];
  $Mail      = $_POST['mail'];
  $Password  = $_POST['password'];

/*
  if(isset($_POST['joursDiff']) && !empty($_POST['joursDiff'])){
  
  $joursDiff = $_POST['joursDiff'];
    foreach ($joursDiff as $v) {
        echo $v;
        $$v = $v;
        $$v = true;
      }
  }
 */
// echo $Jeudi;   
 
// creatUser($nom,$prenom,$mail,$annee_diff,$password,$Lundi,$Mardi,$Mercredi,$Jeudi,$Vendredi,$Samedi,$Dimanche);
creatUser($Nom,$Prenom,$Mail,$Annee_diff,$Password);

  ?>