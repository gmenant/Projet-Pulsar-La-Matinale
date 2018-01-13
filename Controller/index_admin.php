
<?php
include('../Modele/model.php');
include('../View/enteteAdmin.php');
?>
<button onclick="window.location.href='../Controller/index_admin.php?page=enregChronique'">Ajouter Chroniqueur</button>
<button onclick="window.location.href='../Controller/index_admin.php?page=semainier'">Semainier</button>
<?PHP

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

