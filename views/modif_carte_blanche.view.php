<?php ob_start(); ?>

<div class="bg-title text-center ">
    <h1 class="pt-5 pb-5 titre-article"><b>Modification de la Carte Blanche</b></h1>
</div>

<section class="col-11 ml-5 mr-3 mt-5">
    <?php if (!empty($_SESSION['no_admin'])) {
        // Affichage d'un menu si un utilisateur est connecté 
    ?>

        <p class="text-center text-danger"><?php echo $_SESSION['echec_carte_blanche'] ?></p>


    <?php } ?>
    <form action="verif_modif_carte_blanche" method="POST" enctype="multipart/form-data">
        <div class="row">

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="titre">Titre</label>
                <input type="text" name="titre" class="form-control input" value="<?php echo $carte_blanche->getTitre(); ?>" id="titre">
            </div>
            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="date_publication">Date Publication :</label>
                <input type="date" class="form-control" name="date_publication" value="<?php $carte_blanche->getDate_publication(); ?>" class="form-control input" id="date_publication" required>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="description">Description de la Carte Blanche :</label>
                <textarea name="description" class="form-control default-editor" id="description" maxlength="1024" wrap cols="30" rows="10"><?php echo nl2br($carte_blanche->getDescription()) ?></textarea>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="constat">constat :</label>
                <textarea name="constat" class="form-control default-editor" id="constat" maxlength="6000" wrap cols="30" rows="10"><?php echo nl2br($carte_blanche->getConstat()) ?></p></textarea>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="objectif">objectif :</label>
                <textarea name="objectif" class="form-control default-editor" id="objectif" maxlength="6000" wrap cols="30" rows="10"><?php echo nl2br($carte_blanche->getObjectif()) ?></textarea>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="realisation">Realisation : </label>
                <textarea name="realisation" class="form-control default-editor" id="realisation" maxlength="6000" wrap cols="30" rows="10"><?php echo nl2br($carte_blanche->getRealisation()) ?></textarea>
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" for="redacteur_principale">Rédacteur principale :</label>
                <input name="redacteur_principale" value="<?php echo $carte_blanche->getRedacteur_principale() ?>" class="form-control" id="redacteur_principale">
            </div>

            <div class="form-group col-6">
                <label class="text-secondary font-weight-bold font-italic" class="text-danger font-weight-bold font-italic" for="redacteur_secondaire">Rédacteur secondaire :</label>
                <input name="redacteur_secondaire" value="<?php echo $carte_blanche->getRedacteur_secondaire() ?>" class="form-control" id="redacteur_secondaire">
            </div>

            <div class="form-group col-12">
                <input type="file" class="custom-file-input input" name="image" id="image">
                <label class="custom-file-label" for="image">Choisir une Photo de la carte blanche</label>

                <div class="container">
                    <input id="id_carte_blanche" name="id_carte_blanche" type="hidden" value="<?php echo $carte_blanche->getId(); ?>">
                    <input id="old_photo" name="old_photo" type="hidden" value="<?php echo $carte_blanche->getPhoto(); ?>">
                    <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Modification</button>
                </div>
            </div>

    </form>

</section>

<?php
$content = ob_get_clean();
$titre = "Modification carte blanche";
require "template.view.php";
