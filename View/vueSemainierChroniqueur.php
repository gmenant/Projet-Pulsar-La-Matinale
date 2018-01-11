
<link rel="stylesheet" href="../View/semainierChroniqueur.css">
<?PHP
$infosJours = identifieJours($_SESSION['id']);
var_dump($infosJours);
foreach ($infosJours as $v) {
       // var_dump($v);
       // echo $v;
        $$v = $v;
        $$v = true;

      }


?>

<!-- Champ Input Pour la date -->

<script type="text/javascript">

var lundi    = 1;
var mardi    = 2;
var mercredi = 3;
var jeudi    = 4;
var vendredi = 5;
var samedi   = 6;
var dimanche = 0;
var joursARetirer = "";



			$( function() {
				//var lundi    = 'date.getDay() == 1 ';
			    $( "#champs" ).datepicker({
			      showWeek: true,
			      firstDay: 1,
			      altFormat: 'yy-mm-dd',
			      altField: ".actualDate",
			      beforeShowDay: function (date) {
			      	if (!(date.getDay() == mardi)) { // La semaine commence à 0 = Dimanche
                return [false, ''];
            } else {
                return [true, ''];
            }
      	  }
			      });
			  } );



</script>

<div type="text" id="champs"></div></p>

	<fieldset>
    	<legend id="leg">Chronique du </legend>

			<table>
				<tr>
					<td><table>
				<tr>
					<td>Titre de la chronique</td>
				</tr>
				<tr>
					<td><input type="hidden" id="id_chroniqueur" name="dateSelec" value="<?PHP echo $_SESSION['id'] ?>">
						<input type="hidden" class="actualDate" id="dateSelec" name="dateSelec">
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

	</table>
		</form>
	</fieldset>


