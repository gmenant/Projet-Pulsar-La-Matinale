
<link rel="stylesheet" href="../View/index.css">
<?PHP

//verif semaine en cours
if (isset($_GET["semaine"]))
{	$numSemSelec = $_GET["semaine"];}
else
{	$numSemSelec = $numSemCours;}


echo $anneeEnCours;
echo $numSemCours;
echo $numSemSelec;
$mois= jeudi_semaine($anneeEnCours,$numSemSelec);

//semainier avec contenu
semainier($numSemSelec,$anneeEnCours,$mois);
?>

<div name="" class="container-fluid" id="choixHSemaine">
	<nav aria-label="Page navigation example">
 		<ul class="pagination pagination-sm flex-wrap">
<?PHP

//liste des semaines
listeNumSem($numSemCours,$numSemSelec);



?>
		</ul>
	</nav>
</div>
<div id="test"></div>