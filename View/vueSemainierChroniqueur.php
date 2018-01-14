
<link rel="stylesheet" href="../View/semainierChroniqueur.css">
<?PHP
$infosJours = identifieJours($_SESSION['id']);
foreach ($infosJours as $v) {
       // var_dump($v);
       // echo $v;
        $$v = $v;
        $$v = true;

      }
?>

<!-- Champ Input Pour la date -->

<script type="text/javascript">

//variables pour limiter les choix de jours possibles	
var lundi    = 0;
var mardi    = 0;
var mercredi = 0;
var jeudi    = 0;
var vendredi = 0;
var samedi   = 0;
var dimanche = 0;

//recuperations variables jours choisis chroniqueur
var lun = <?PHP echo $_SESSION['lundi']; ?>;
var mar = <?PHP echo $_SESSION['mardi']; ?>;
var mer = <?PHP echo $_SESSION['mercredi']; ?>;
var jeu = <?PHP echo $_SESSION['jeudi']; ?>;
var ven = <?PHP echo $_SESSION['vendredi']; ?>;
var sam = <?PHP echo $_SESSION['samedi']; ?>;
var dim = <?PHP echo $_SESSION['dimanche']; ?>;

//transformation variables en numeros compatibles datepicker UI
if (lun == 1){
	var lundi = 1;
}
if (mar == 1){
	var mardi = 2;
}
if (mer == 1){
	var mercredi = 3;
}
if (jeu == 1){
	var jeudi = 4;
}
if (ven == 1){
	var vendredi = 5;
}
if (sam == 1){
	var samedi = 6;
}
if (dim == 1){
	var dimanche = 0;
}

	$( function() {
		//var lundi    = 'date.getDay() == 1 ';
	    $( "#champs" ).datepicker({
	      showWeek: true,
	      firstDay: 1,
	      altFormat: 'yy-mm-dd',
	      altField: ".actualDate",
	      onSelect: function(dateText, inst) { recuperation() },
	      beforeShowDay: function (date) {
	      	if (!(date.getDay() == lundi) && 
	      		!(date.getDay() == mardi) && 
	      		!(date.getDay() == mercredi) && 
	      		!(date.getDay() == jeudi) && 
	      		!(date.getDay() == vendredi) && 
	      		!(date.getDay() == samedi) && 
	      		!(date.getDay() == dimanche)
	      		) { // La semaine commence à 0 = Dimanche
		    return [false, ''];
			} else {
		    return [true, ''];
			}


		  }
	    });
	  });

</script>

<div type="text" id="champs"></div></p>

	<fieldset>
    	<legend id="leg">Chronique du </legend>

			
			<div>
				<h3>Titre de la chronique</h3>
				<input type="hidden" id="id_chroniqueur"  value="<?PHP echo $_SESSION['id'] ?>">
				<input type="hidden" class="actualDate" id="dateSelec" name="dateSelec" onchange="recuperationTest()">
				<input id="titre" name ="titre" type="text">
			</div>
			<div>
				<h3>Contenu de la chronique</h3>
				<textarea name="texte" id="texte" cols="30" rows="10"></textarea>
				<button onclick="validation()">Envoyer informations</button>
				<button onclick="recuperation()">Informations déjà entrées</button>
			</div>
			<div id="zone_dialogue" class="message"></div>
			<div id="titre1"></div>
			<div id="texte1"></div>



			<!--<table>
				<tr>
					<td><table>
				<tr>
					<td>Titre de la chronique</td>
				</tr>
				<tr>
					<td><input type="hidden" id="id_chroniqueur"  value="<?PHP //echo $_SESSION['id'] ?>">
						<input type="hidden" class="actualDate" id="dateSelec" name="dateSelec" onchange="recuperationTest()">
						<input id="titre" name ="titre" type="text"></td>
				</tr>
				<tr>
					<td>
					Contenu de la chronique</td>
				</tr><tr>
					<td>
					<textarea name="texte" id="texte" cols="30" rows="10"></textarea>
					</td>
				</tr><tr><td>
				<button type="submit" onclick="validation()">Envoyer informations</button>
				<button type="submit" onclick="recuperation()">Informations déjà entrées</button>
			</td></tr><tr><td id="zone_dialogue" class="message">&nbsp;</td></tr>
			</table></td></tr>

	</table>-->
			</fieldset>


