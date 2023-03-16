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

    <h6 class="etape mt-5">ÉTAPE 4 DE 4</h6>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>


    <form action="publi_contribution" method="POST" enctype="multipart/form-data" class="mt-5">
        <div class="row mr-5 ml-5">

            <div class="form-group col-12">
                <input type="file" class="custom-file-input input" name="fichier" id="fichier">
                <label class="custom-file-label" for="fichier">Choisir un fichier</label>
                <small class="form-text text-muted">Option facultative. Si vous souhaitez partager en annexe de votre proposition un rapport, schéma, graphique, tableau ou tout autre document en facilitant la compréhension, veuillez les joindre ci-dessus.</small>
            </div>


            <div class="form-group col-12 mt-5">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="recontacte" id="recontacte" required>J'accepte d'être recontacté par Génération d'Avenir *
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="utilise" id="utilise" required> J'accepte que mes travaux soient utilisés dans le cadre de travaux liés à Génération d'Avenir *
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="mention_legale" id="mention_legale" required>J'accepte les mentions légales du site internet de Génération d'Avenir *
                </div>
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
                <input type="hidden" name="mise_en_place" class="form-control input" id="mise_en_place" value="<?php echo $mise_en_place ?>">
                <input type="hidden" name="juridique" class="form-control input" id="juridique" value="<?php echo $juridique ?>">
                <input type="hidden" name="budgetaire" class="form-control input" id="budgetaire" value="<?php echo $budgetaire ?>">
                <input type="hidden" name="impact_social" class="form-control input" id="impact_social" value="<?php echo $impact_social ?>">
                <input type="hidden" name="impact_environnement" class="form-control input" id="impact_environnement" value="<?php echo $impact_environnement ?>">
                <input type="hidden" name="application" class="form-control input" id="application" value="<?php echo $application ?>">


                <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Envoyer</button>
            </div>
        </div>

    </form>




</div>



<?php
$content = ob_get_clean();
$titre = "Vos contributions";
require "template.view.php";
?>