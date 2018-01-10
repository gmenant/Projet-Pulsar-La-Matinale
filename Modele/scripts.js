function validation() { // contrôle les champs du formulaire avant d'envoyer les données au serveur

                 var AJAXid_chroniqueur = encodeURIComponent($("#id_chroniqueur").val());
                 var AJAXtitre = encodeURIComponent($("#titre").val());
                 var AJAXtexte = encodeURIComponent($("#texte").val());
                 var AJAXdateSelec = encodeURIComponent($("#dateSelec").val());
                 var xhr = $.ajax({
                         url: "../View/ajout_chronique.php",
                         type: 'POST',
                         data: {
                             titre: AJAXtitre,
                             texte: AJAXtexte,
                             dateSelec: AJAXdateSelec,
                             id_chroniqueur: AJAXid_chroniqueur
                        },
                         dataType: 'html'
                     })
                     .done(function (message) {
                         $("#zone_dialogue").html(message);
                         var rep = message;
                         console.log(rep);
                         var retour = rep.substr(0, 6);
                         if (retour == 'Erreur') {
                             $("#zone_dialogue").html(rep);
                             $("#nom").focus();
                             $("#zone_dialogue").css('color', 'tomato');
                         } else {
                             $("#zone_dialogue").css('color', 'darkgreen').css('background-color', 'lightblue');
                             $("#zone_dialogue").html("La chronique  " + AJAXtitre + " a été ajoutée!");
                         }
                     })
                     .fail(function (xhr, erreur) {
                         $("#zone_dialogue").html('Une erreur système ' + erreur + 's\'est produite ');
                     })
 }

function recuperation(){
                 var AJAXid_chroniqueur = encodeURIComponent($("#id_chroniqueur").val());
                 var AJAXdateSelec = encodeURIComponent($("#dateSelec").val());
                 var xhr = $.ajax({
                         url: "../View/lecture_chronique.php",
                         type: 'POST',
                         data: {
                             dateSelec: AJAXdateSelec,
                             id_chroniqueur: AJAXid_chroniqueur
                        },
                         dataType: 'html'
                     })
                     .done(function (message) {
                         $("#zone_dialogue").html(message);
                         var rep = message;
                         console.log(rep);
                         var retour = rep.substr(0, 6);
                         if (retour == 'Erreur') {
                             $("#zone_dialogue").html(rep);
                             $("#nom").focus();
                             $("#zone_dialogue").css('color', 'tomato');
                         } else {
                            var donnees=rep.split('|');
                            $('#titre').val(donnees[0]);
                             $('#texte').val(donnees[1]);

                             $("#zone_dialogue").css('color', 'darkgreen').css('background-color', 'lightblue');
                             $("#zone_dialogue").html("Voici le contenu de l'emission selectionnée ");
                         }
                     })
                     .fail(function (xhr, erreur) {
                         $("#zone_dialogue").html('Une erreur système ' + erreur + 's\'est produite ');
                     })

}
