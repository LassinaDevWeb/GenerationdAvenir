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

    <h6 class="etape mt-5">ÉTAPE 1 DE 5</h6>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
    </div>

    <h2 class=" ml-5 mr-5 mt-5 mb-3 text-white bg-dark text-center"><b> <?php echo $_SESSION['email_contribution'];  ?></b></h2>

    <form action="contribu_etape2" method="POST" enctype="multipart/form-data" class="mt-5">
        <div class="row mr-5 ml-5">

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="nom">Nom *</label>
                <input type="text" name="nom" class="form-control input" id="nom" required>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="prenom">Prenom *</label>
                <input type="text" name="prenom" class="form-control input" id="prenom" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="titre">Date de naissance *</label>
                <input type="date" name="date_naissance" class="form-control input" id="date_naissance">
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="email">Email*</label>
                <input type="email" name="email" class="form-control input" id="email" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="activite">Activité *</label>
                <input type="text" name="activite" class="form-control input" id="activite" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="responsabilite">Responsabilité(s)</label>
                <input type="text" name="responsabilite" class="form-control input" id="responsabilite">
            </div>

            <div class="form-group col-12 mt-2 mb-5">
                <div class="container">
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