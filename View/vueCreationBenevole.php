<html>
  <head>

<meta charset="UTF-8">
    <style type="text/css">

SELECT, INPUT[type="text"] {
    width: 160px;
    box-sizing: border-box;
}
SECTION {
    width:400px;
    padding: 8px;
    background-color: #f0f0f0;
    overflow: auto;
}
SECTION > DIV {
    float: left;
    padding: 4px;
}
SECTION > DIV + DIV {
    width: 40px;
    text-align: center;
}

.boum{
  color:red;
}

    </style>


  </head>
  <body>

 <form action="../View/vueEnreg.php" method="post">
  <table>
      <tr><td><h1>Création Bénévole</h1></td></tr>
      <tr><td>Entrez nom</td><td>
      <input type="text" name="nom" required></td></tr>
      <tr><td>Entrez prenom</td><td>
      <input type="text" name="prenom" required></td></tr>
      <tr><td>année diff</td><td>
      <input type="text" name="annee_diff" required></td></tr>
      <tr><td>Mail</td><td>
      <input type="text" name="mail" required></td></tr>
      <tr><td>Password</td><td>
      <input type="text" name="password" required></td></tr>
      <tr><td>Informations complementaires</td><td>

      <textarea type="text" name="InfosComp" required></textarea></td></tr>


      <tr><td colspan="2">


   <section class="container">

    <div>
        <select id="leftValues" size="7" name="joursDiff[]" multiple></select>
    </div>

    <div>
        <input type="button" id="btnLeft" value="&lt;&lt;" />
        <input type="button" id="btnRight" value="&gt;&gt;" />
    </div>

    <div>
        <select id="rightValues" size="7" multiple>
            <option name="Lundi">     Lundi     </option>
            <option name="Mardi">     Mardi     </option>
            <option name="Mercredi">  Mercredi  </option>
            <option name="Jeudi">     Jeudi     </option>
            <option name="Vendredi">  Vendredi  </option>
            <option name="Samedi">    Samedi    </option>
            <option name="Dimanche">  Dimanche  </option>
        </select>


    </div>
</section>
    </td><td>
  </td></tr>
        <tr><td>
          <input type="submit" name=""></td></tr>

        </table>
        </form>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>
        <script>

                $("#btnLeft").click(function () {
                    var selectedItem = $("#rightValues option:selected");
                    $("#leftValues").append(selectedItem);
                  });

                $("#btnRight").click(function () {
                    var selectedItem = $("#leftValues option:selected");
                    $("#rightValues").append(selectedItem);
                });

                $("#rightValues").change(function () {
                    var selectedItem = $("#rightValues option:selected");
                    $("#txtRight").val(selectedItem.text());
                });


        </script>

  </body>
</html>
