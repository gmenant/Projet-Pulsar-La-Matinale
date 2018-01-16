<?PHP
$dateSelec = $_POST['dateSelec'];

$EmId = recupEmissionsId($dateSelec);

$infos = recupInfos($EmId['id_emission'],$_SESSION['id']);
//var_dump($infos);
echo $infos['titre'];
echo "<br> ";
echo $infos['texte'];
?>