
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
	      appendText: "(yyyy-mm-dd)",
	      onSelect: function(dateText, inst) { recuperation(); },
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
var appendText = $( "#champs" ).datepicker( "option", "appendText" );
 $('#leg').empty().append(appendText);
 console.log(appendText);


</script>



<div class="container-fluid">
	<button onclick="location.href='index_chroniqueur.php?page=deconnexion';" class="btn" href="index_chroniqueur.php?page=deconnexion">Deconnexion</button><br>

	Session appartenant à  <?PHP echo $_SESSION['nom'].' '.$_SESSION['prenom'] ?>
</div>
<div class="container-fluid">
<div class="row no-gutters justify-content-start">


<div class="picker col-12 col-sm-5 col-md-4 col-lg-3 float-left pull-left container-fluid">
			<div class="card ">
			<div class="card-header">
					<h2>Date à selectionner</h2>
				</div>

				<div type="text" id="champs"></div>
			</div>
</div>

<div class="col container-fluid" id="infoPresente" style="display:none;">
			<div class="card">
				<div class="card-header">
					<h2>Chronique déjà enregistrée</h2>
				</div>
				<div class="card-body">
					<input type="" class="actualDate form-control" >
				<div class="card">
					<div class="card-header">
						Titre de la chronique
					</div>
					<div class="card-body">
						<div id="titre1""></div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						Texte de la chronique
					</div>
					<div class="card-body">
						<div id="texte1"></div>
					</div>
				</div>
				</div>
			</div>
			<!--<div id="zone_dialogue" class="message"></div>-->

</div>

<div class="col container-fluid" id="chronAAj">
			<div class="card">
				<div class="card-header">
					<h2>Chronique à ajouter</h2>
				</div>
				<div class="card-body">
						<h8>Titre de la chronique</h8>
						<input type="hidden" id="id_chroniqueur"  value="<?PHP echo $_SESSION['id'] ?>">
						<input type="hidden" onhaschange="recup()" class="actualDate form-control" id="dateSelec" name="dateSelec">
						<input id="titre" name ="titre" class="form-control" type="text">
						<h8>Contenu de la chronique</h8>
						<textarea name="texte" id="texte" class="form-control" rows="10"></textarea>
						<p>&nbsp;</p>
						<button class="btn" id="buttonValid" onclick="validation()">Envoyer informations</button>
						<button class="btn" id="buttonModif" style="display:none;" onclick="modification()">Remplacer informations</button>
				</div>
			</div>
</div>


</div>
</div>

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



