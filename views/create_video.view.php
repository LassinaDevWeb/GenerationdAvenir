<?php ob_start(); ?>

<div class="bg-title text-center ">
    <h1 class="pt-5 pb-5 titre-article"><b>Publication de la video (youtube)</b></h1>
</div>

<section class="col-11 ml-5 mr-3 mt-5">
    <?php if (!empty($_SESSION['no_admin'])) {
        // Affichage d'un menu si un utilisateur est connecté 
    ?>

        <p class="text-center text-danger"><?php echo $_SESSION['echec_carte_blanche'] ?></p>


    <?php } ?>
    <form action="publi_video" method="POST" enctype="multipart/form-data">
        <div class="row">

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="titre">Titre *:</label>
                <input type="text" name="titre" class="form-control input" id="titre" required>
            </div>
            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="date_publication">Date Publication *:</label>
                <input type="date" class="form-control" name="date_publication" class="form-control input" id="date_publication" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="description">Description de la video youtube :</label>
                <textarea name="description" class="form-control default-editor" id="description" maxlength="1024" wrap cols="30" rows="10"></textarea>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="lien">Lien de la video youtube *:</label>
                <input type="url" pattern="https://www.youtube.com/embed/*" name="lien" class="form-control input" id="lien" required>
            </div>

            <div class="form-group col-12">
                <input type="file" class="custom-file-input input" name="image" id="image" required>
                <label class="custom-file-label" for="image">Choisir une Photo de la video </label>

                <div class="container">
                    <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Création</button>
                </div>
            </div>

    </form>

</section>

<?php
$content = ob_get_clean();
$titre = "Create carte blanche";
require "template.view.php";
?>