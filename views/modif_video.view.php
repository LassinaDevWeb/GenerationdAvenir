<?php ob_start(); ?>

<div class="bg-title text-center ">
    <h1 class="pt-5 pb-5 titre-article"><b>Modification de la video</b></h1>
</div>

<section class="col-11 ml-5 mr-3 mt-5">
    <?php if (!empty($_SESSION['no_admin'])) {
        // Affichage d'un menu si un utilisateur est connecté 
    ?>

        <p class="text-center text-danger"><?php echo $_SESSION['echec_video'] ?></p>


    <?php } ?>
    <form action="verif_modif_video" method="POST" enctype="multipart/form-data">
        <div class="row">

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="titre">Titre</label>
                <input type="text" name="titre" class="form-control input" id="titre" value="<?php echo $video->getTitre(); ?>">
            </div>
            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="date_publication">Date Publication :</label>
                <input type="date" class="form-control" name="date_publication" value="<?php $video->getDate_publication(); ?>" class="form-control input" id="date_publication" required>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="description">Description de la video :</label>
                <textarea name="description" class="form-control default-editor" id="description" maxlength="1024" wrap cols="30" rows="10"><?php echo $video->getDescription(); ?></textarea>
            </div>

            <div class="form-group col-12">
                <label class="text-secondary font-weight-bold font-italic" for="lien">lien :</label>
                <input type="url" pattern="https://www.youtube.com/embed/*" name="lien" class="form-control input" id="lien" value="<?php echo $video->getLien(); ?>">
            </div>


            <div class="form-group col-12">
                <input type="file" class="custom-file-input input" name="image" id="image">
                <label class="custom-file-label" for="image">Choisir une Photo de la video</label>

                <div class="container">
                    <input id="id_video" name="id_video" type="hidden" value="<?php echo $video->getId(); ?>">
                    <input id="old_photo" name="old_photo" type="hidden" value="<?php echo $video->getPhoto(); ?>">
                    <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Modification</button>
                </div>
            </div>

    </form>

</section>

<?php
$content = ob_get_clean();
$titre = "Modification carte blanche";
require "template.view.php";
