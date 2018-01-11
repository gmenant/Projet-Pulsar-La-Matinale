
<link rel="stylesheet" href="../View/index.css">
<?PHP
if (isset($_GET["semaine"]))
{	$numSemSelec = $_GET["semaine"];}
else
{	$numSemSelec = $numSemCours;}

echo $anneeEnCours;
echo $numSemCours;
//Affiche le semainier
//JourParNrSemaine($numSemSelec,$anneeEnCours);

semainier($numSemSelec,$anneeEnCours);
?>

<div name="" id="choixHSemaine">

<?PHP
listeNumSem($numSemCours,$numSemSelec);
?>

</div>

