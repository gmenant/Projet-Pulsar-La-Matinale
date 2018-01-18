<div class="container float-left">
  <div class=" row float-left">

  <div class="card col-9">
        <div class="card-header">
            <h5>Gestion Chroniqueurs</h5>
        </div>
        <div class="card_body container-fluid">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12 pull-left">
                         <form class="container float-left " method="post">
                          <div class="row">

                            <div class="col-5 ">
                                <div for="nom1">Entrez nom</div>
                                <input class="form-control" id="nom1" type="text" name="nom" required>
                                <div for="prenom1">Entrez prenom</div>
                                <input class="form-control" id="prenom1" type="text" name="prenom" required>
                                <div for="anee_diff1">année diff</div>
                                <input class="form-control" id="anee_diff1" type="text" name="annee_diff" required>
                                <div for="mail1">Mail</div>
                                <input class="form-control" id="mail1" type="text" name="mail" required>
                                <div for="password1">Password</div>
                                <input class="form-control" id="password1" type="text" name="password" required>
                          </div>

                          <div class="col">
                                 Informations complementaires
                                <textarea type="text" name="InfosComp" class="form-control" required></textarea>
                                 Selectionner jours de diffusion
                                 <section class="container">
                                  <div>
                                      <select class="form-control" id="leftValues" size="7" name="joursDiff[]" multiple></select>
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
                                <div>&nbsp</div>
                                <button class="btn" onclick="validationCreaChron()">Enregistrer Chroniqueur</button>
                          </div>
                        </div>
                      </form>
        </div>
        </div>
        </div>

        <div class="col-3" id="chroniqueursEx">
          Liste chroniqueurs existants
        </div>
        </div>
</div>



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
