
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

  case 'creation';
    include('../View/vueEnreg.php');
   echo "<meta http-equiv='refresh' content='1;URL=../Controller/index_admin.php?page=enregChronique'>";
  break;

  default:
    include('../View/vueSemainierAdmin.php');
    }
include('../View/pied.php');
?>

