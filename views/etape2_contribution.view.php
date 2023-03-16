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

    <h6 class="etape mt-5">ÉTAPE 2 DE 5</h6>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
    </div>


    <form action="contribu_etape3" method="POST" enctype="multipart/form-data" class="mt-5">
        <div class="row mr-5 ml-5">


            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="theme">Je souhaite déposer une proposition sur le thème de l'un des 3 prochains travaux à paraitre : *</label>
                <select class="form-control" name="theme" id="theme" required>
                    <option selected value="La société post-confinement">La société post-confinement</option>
                    <option value="Éducation et Mixité Sociale">Éducation et Mixité Sociale</option>
                    <option value="Bioéthique">Bioéthique</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="niveau_action">Niveau d'action de ma proposition*</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="niveau_action[]" id="niveau_action" value="Politique nationale" checked>Politique nationale
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="niveau_action[]" id="niveau_action" value="Politique locale">Politique locale
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="niveau_action[]" id="niveau_action" value="Monde du travail, scolaire et universitaire">Monde du travail, scolaire et universitaire
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="niveau_action[]" id="niveau_action" value="Secteur associatif">Secteur associatif
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="niveau_action[]" id="niveau_action" value="Cercle familial">Cercle familial
                    </label>
                </div>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="constat">Constat/Problème à l'origine de ma proposition*</label>
                <textarea name="constat" class="form-control" id="constat" maxlength="2048" wrap cols="30" rows="10" required></textarea>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="proposition">Proposition/Idée/Solution*</label>
                <textarea name="proposition" class="form-control" id="proposition" maxlength="2048" wrap cols="30" rows="10" required> <?php $nom ?>   </textarea>
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