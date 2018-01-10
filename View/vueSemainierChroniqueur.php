<link rel="stylesheet" href="../View/semainierChroniqueur.css">

<!-- Champ Input Pour la date -->

<script type="text/javascript">

			$( function() {
			    $( "#champs" ).datepicker({
			      showWeek: true,
			      firstDay: 1,
			      altFormat: 'yy-mm-dd',
			      altField: ".actualDate",
			      beforeShowDay: function (date) {
            if (date.getDay() == 5 || date.getDay() == 4) { // La semaine commence à 0 = Dimanche
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
			</td></tr><tr><td id="zone_dialogue" class="message">&nbsp;</td></tr>
			</table>

		</td>
			<td>
				<table>
				<tr>
					<td></td><td><div name></div></td>
				</tr>
				<tr><td><input type="hidden" class="actualDate" name="dateSelec">
				<button type="submit" onclick="recuperation()">Informations déjà entrées</button>

			</tr>
			</table></td></tr>

	</table>
		</form>
	</fieldset>


