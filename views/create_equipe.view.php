<?php ob_start(); ?>

<div class="bg-title text-center ">
    <h1 class="pt-5 pb-5 titre-article"><b>Ajout d'une personne qui va rejoindre l'equipe</b></h1>
</div>

<section class="col-11 ml-5 mr-3 mt-5">
    <?php if (!empty($_SESSION['no_admin'])) {
        // Affichage d'un menu si un utilisateur est connecté 
    ?>

        <p class="text-center text-danger"><?php echo $_SESSION['echec_rencontre'] ?></p>


    <?php } ?>
    <form action="publi_equipe" method="POST" enctype="multipart/form-data">
        <div class="row">

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="nom">Nom complet *</label>
                <input type="text" name="nom" class="form-control input" id="nom" required>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="role">Email *</label>
                <input type="email" name="email" class="form-control input" id="email" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="reseau_principal"> Lien du profil Twitter</label>
                <input type="text" name="reseau_principal" class="form-control input" id="reseau_principal">
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="reseau_principal">Lien du profil Indeed</label>
                <input type="text" name="reseau_secondaire" class="form-control input" id="reseau_secondaire">
            </div>


            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="role">Role *</label>
                <input type="text" name="role" class="form-control input" id="role" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="section">Section *</label>
                <input type="text" name="section" class="form-control input" id="section" required>
            </div>

            <div class="form-group col-12">
                <input type="file" class="custom-file-input input" name="image" id="image" required>
                <label class="custom-file-label" for="image">Choisir une Photo de la personne qui va rejoindre l'equipe</label>

                <div class="container">
                    <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Ajout</button>
                </div>
            </div>

    </form>

</section>

<?php
$content = ob_get_clean();
$titre = "Create note de synthese";
require "template.view.php";
?>