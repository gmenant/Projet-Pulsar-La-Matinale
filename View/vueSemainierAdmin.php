
<link rel="stylesheet" href="../View/index.css">
<?PHP

//verif semaine en cours
if (isset($_GET["semaine"]))
{	$numSemSelec = $_GET["semaine"];}
else
{	$numSemSelec = $numSemCours;}


echo $anneeEnCours;
echo $numSemCours;


//semainier avec contenu
semainier($numSemSelec,$anneeEnCours,$moisEnCours);
?>

<div name="" id="choixHSemaine">

<?PHP

//liste des semaines
listeNumSem($numSemCours,$numSemSelec);
?>

</div>
<div id="test"></div>