<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Vos contributions</b></h1>
</div>

<div class="zone_contribution">
    <p>Partagez vos <strong> constats</strong>, vos <strong>craintes</strong>, les <strong> attentes</strong> et <strong>problématiques</strong> que vous vivez ou avez vécues dans votre vie quotidienne, votre emploi, votre rapport aux autres…
        <br>
        <br>

        Proposez le cas échéant des <strong>solutions concrètes </strong> applicables à différents niveaux (international, national, local…) ou dans le monde réel directement (associations, entreprises, familles…) <br><br>

        Via ce formulaire, vous pouvez proposer une contribution détaillée, notamment si vous disposez d’une analyse précise de votre proposition (étude de la faisabilité, informations chiffrés, comparaison avec un autre pays…).
    </p>

    <h6 class="etape mt-5">ÉTAPE 3 DE 5</h6>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
    </div>


    <form action="contribu_etape4" method="POST" enctype="multipart/form-data" class="mt-5">
        <div class="row mr-5 ml-5">

            <div class="form-group col-12 mb-3">
                <label class="text-secondary font-weight-bold font-italic" for="mise_en_place">Facilité de mise en place*</label>
                <select class="form-control" name="mise_en_place" id="mise_en_place" required>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <small class="form-text text-muted">De 1 la mesure la moins facile à mettre en place à 5 la mesure la plus facile à mettre en place.</small>
            </div>



            <div class="form-group col-12 mb-3">
                <label class="text-secondary font-weight-bold font-italic" for="juridique">Faisabilité juridique</label>
                <select class="form-control" name="juridique" id="juridique" required>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <small class="form-text text-muted">Du plus facilement réalisable (1) au plus difficilement réalisable (5).</small>
            </div>


            <div class="form-group col-12 mb-3">
                <label class="text-secondary font-weight-bold font-italic" for="budgetaire">Impact budgétaire*</label>
                <select class="form-control" name="budgetaire" id="budgetaire" required>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <small class="form-text text-muted">De 1 la mesure la moins couteuse à 5 la mesure la plus couteuse.</small>
            </div>


            <div class="form-group col-12 mb-3">
                <label class="text-secondary font-weight-bold font-italic" for="impact_social">Impact social</label>
                <select class="form-control" name="impact_social" id="impact_social" required>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <small class="form-text text-muted">De 1 la moins impactante sur la société à 5 la mesure la plus impactante sur la société.</small>
            </div>



            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="impact_environnement">Impact environnemental*</label>
                <select class="form-control" name="impact_environnement" id="impact_environnement" required>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <small class="form-text text-muted">De 1 la moins impactante sur l'environnement à 5 la mesure la plus impactante sur l'environnement.</small>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="application">Application de ma proposition par le passé ou à l'étranger</label>
                <textarea name="application" class="form-control" id="application" maxlength="2048" wrap cols="30" rows="10"></textarea>
                <small class="form-text text-muted">Y-a-t-il eu des exemples similaires à l'étranger ou des précédents dans notre passé ?</small>

            </div>


        </div>

        <div class="form-group col-12 mt-2 mb-5">
            <div class="container">
                <input type="hidden" name="nom" class="form-control input" id="nom" value="<?php echo $nom ?>">
                <input type="hidden" name="prenom" class="form-control input" id="prenom" value="<?php echo $prenom ?>">
                <input type="hidden" name="date_naissance" class="form-control input" id="date_naissance" value="<?php echo $date_naissance ?>">
                <input type="hidden" name="email" class="form-control input" id="email" value="<?php echo $email ?>">
                <input type="hidden" name="activite" class="form-control input" id="activite" value="<?php echo $activite ?>">
                <input type="hidden" name="responsabilite" class="form-control input" id="responsabilite" value="<?php echo $responsabilite ?>">
                <input type="hidden" name="theme" class="form-control input" id="theme" value="<?php echo $theme ?>">
                <input type="hidden" name="constat" class="form-control input" id="constat" value="<?php echo $constat ?>">
                <input type="hidden" name="proposition" class="form-control input" id="proposition" value="<?php echo $proposition ?>">
                <input type="hidden" name="niveau_actions" class="form-control input" id="niveau_actions" value="<?php echo $niveau_actions ?>">
                <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Suivant </button>
            </div>
        </div>

    </form>




</div>



<?php
$content = ob_get_clean();
$titre = "Vos contributions";
require "template.view.php";
?>