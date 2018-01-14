$(document).ready(function () {
    var date_input = $('input[name="dateSelec"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options).on('changeDate', function (ev) {
        console.log('ok')
    });
})


$(document).ready(function($){
    afficheChroniquePourAdmin();
});


function afficheChroniquePourAdmin(){
    var AJAXdateSelec = encodeURIComponent($("#dateSelec").val());
    var AJAXdateSelec = encodeURIComponent("2018-1-14");
    console.log(AJAXdateSelec);
    var xhr = $.ajax({
             url: "../View/AJAXaffiche_chronique.php",
             type: 'POST',
              data: {
                 dateSelec: AJAXdateSelec
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
                //if ()
                console.log(donnees[2]);
                $('#2018-01-14').append(donnees[0],donnees[1],donnees[2]);
                //$('#'+donnees[2]+'').append(donnees[0],donnees[1],donnees[2]);
                 
                 //$('#titre1').replaceWith(donnees[0]);
                 //$('#texte1').replaceWith(donnees[1]);
                        
                 $("#zone_dialogue").css('color', 'darkgreen').css('background-color', 'lightblue');
                 $("#zone_dialogue").html("Voici les informations que vous avez envoyé concernant l'emission selectionnée ");
             }
         })
         .fail(function (xhr, erreur) {
             $("#zone_dialogue").html('Une erreur système ' + erreur + 's\'est produite ');
         })

}



function validation() { // contrôle les champs du formulaire avant d'envoyer les données au serveur
                

               
                 var AJAXid_chroniqueur = encodeURIComponent($("#id_chroniqueur").val());
                 var AJAXtitre = encodeURIComponent($("#titre").val());
                 var AJAXtexte = encodeURIComponent($("#texte").val());
                 var AJAXdateSelec = encodeURIComponent($("#dateSelec").val());
                 var xhr = $.ajax({
                         url: "../View/AJAXajout_chronique.php",
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
             url: "../View/AJAXlecture_chronique.php",
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
                 
                //if ()
                 $('#titre1').append(donnees[0]);
                 $('#texte1').append(donnees[1]);
                 
                 //$('#titre1').replaceWith(donnees[0]);
                 //$('#texte1').replaceWith(donnees[1]);
                        
                 $("#zone_dialogue").css('color', 'darkgreen').css('background-color', 'lightblue');
                 $("#zone_dialogue").html("Voici les informations que vous avez envoyé concernant l'emission selectionnée ");
             }
         })
         .fail(function (xhr, erreur) {
             $("#zone_dialogue").html('Une erreur système ' + erreur + 's\'est produite ');
         })

}
