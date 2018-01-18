$(document).ready(function () {
    
    /*date_input.datepicker(options).on('changeDate', function (ev) {
        console.log('ok')
    });*/
})

$(document).ready(function () {

   afficheChroniquer();
})



function afficheChroniquesAdmin(){
    var xhr = $.ajax({
             url: "../View/AJAXaffiche_chronique_Admin.php",
             type: 'POST',
             dataType: 'html'
         })
         .done(function (message) {
            var rep = message;
            
            $("#chroniqueursEx").html(rep);
         })
         .fail(function (xhr, erreur) {
             $("#chroniqueursEx").html('Une erreur système ' + erreur + 's\'est produite ');
         })
  
}


function afficheChroniquer(){ 
    var xhr = $.ajax({
             url: "../View/AJAXaffiche_chroniqueur.php",
             type: 'POST',
             dataType: 'html'
         })
         .done(function (message) {
            var rep = message;
            $("#chroniqueursEx").html(rep);
         })
         .fail(function (xhr, erreur) {
             $("#chroniqueursEx").html('Une erreur système ' + erreur + 's\'est produite ');
         })}


$(document).ready(function($){
    afficheChroniquePourAdmin();
});


function afficheChroniquePourAdmin(){
    var AJAXdateSelec = encodeURIComponent($("#dateSelec").val());
    //var AJAXdateSelec = encodeURIComponent($("#"));
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

function validationCreaChron() { // contrôle les champs du formulaire avant d'envoyer les données au serveur


                 var AJAXnom1 = encodeURIComponent($("#nom1").val());
                 var AJAXprenom1 = encodeURIComponent($("#prenom1").val());
                 var AJAXanee_diff1 = encodeURIComponent($("#anee_diff1").val());
                 var AJAXmail1 = encodeURIComponent($("#mail1").val());
                 var AJAXpassword1 = encodeURIComponent($("#password1").val());
                 var xhr = $.ajax({
                         url: "../View/AJAXcreation-chroniqueur.php",
                         type: 'POST',
                         data: {
                             nom1: AJAXnom1,
                             prenom1: AJAXprenom1,
                             anee_diff1: AJAXanee_diff1,
                             mail1: AJAXmail1,
                             password1: AJAXpassword1
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
                             $("#zone_dialogue").html("Le chroniqueur " + AJAXnom1 + " a été ajoutée");
                             afficheChroniquer();
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

                //if (){

                $('#titre1').empty().append(donnees[0]);
                $('#texte1').empty().append(donnees[1]);

                if(donnees[1].length > 0 ){
                    $('#infoPresente').show('slow');
                    $('#buttonModif').show('slow');
                    $('#buttonValid').hide('slow');
                }
                else{
                    $('#infoPresente').hide('slow');
                    $('#buttonModif').hide('slow');
                    $('#buttonValid').show('slow');
                }


                 $("#zone_dialogue").css('color', 'darkgreen').css('background-color', 'lightblue');
                 $("#zone_dialogue").html("Voici les informations que vous avez envoyé concernant l'emission selectionnée ");
             }
         })
         .fail(function (xhr, erreur) {
             $("#zone_dialogue").html('Une erreur système ' + erreur + 's\'est produite ');
         })

}
function modification(){
    var AJAXid_chroniqueur = encodeURIComponent($("#id_chroniqueur").val());
    var AJAXdateSelec = encodeURIComponent($("#dateSelec").val());
    var AJAXtitreRecup = encodeURIComponent($("#titre1").val());
    var AJAXtexteRecup = encodeURIComponent($("#texte1").val());
    var AJAXtitre = encodeURIComponent($("#titre").val());
    var AJAXtexte = encodeURIComponent($("#texte").val());
        var xhr = $.ajax({
                         url: "../View/AJAXmodification_chronique.php",
                         type: 'POST',
                         data: {
                             titre: AJAXtitre,
                             texte: AJAXtexte,
                             titreRecup: AJAXtitreRecup,
                             texteRecup: AJAXtexteRecup,
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


                            recuperation();
                     })
                     .fail(function (xhr, erreur) {
                         $("#zone_dialogue").html('Une erreur système ' + erreur + 's\'est produite ');
                     })


}
