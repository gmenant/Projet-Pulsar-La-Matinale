
<?php
include('../Modele/model.php');
include('../View/enteteAdmin.php');

switch("$page"){
  case 'semainier':
    include('../View/vueSemainierAdmin.php');
  break;

  case 'enregChronique';
    include('../View/vueCreationBenevole.php');
  break;

  default:
    include('../View/vueSemainierAdmin.php');
    }
include('../View/pied.php');
?>

