<?php ob_start(); ?>

<div class="text-center padding_actus mb-5" style=" background-repeat:no-repeat; background-size: cover;
 background-image: url('../public/images/note_synthese/<?php echo $note_synthese->getId(); ?>-<?php echo $note_synthese->getImage_principal(); ?>')">

    <h2 class=" titre-cb pt-5 text-capitalize"><b><?php echo $note_synthese->getTitre(); ?></b></h2>
</div>
<br>
<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <form action="modif_note_synthese" method="post">
        <input name="id_note_synthese" type="hidden" value="<?php echo $note_synthese->getId(); ?>">
        <button value="button" id="submit" class="btn btn-outline-dark float-right mr-2">Modifier</button>
    </form>

    <button type="submit" data-toggle="modal" class="btn btn-outline-dark btn-supp ml-2" data-target="#Modal<?php echo $note_synthese->getId(); ?>">
        suppression
    </button>
<?php } ?>

<div class="modal fade" id="Modal<?php echo $note_synthese->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression de la note de synthese <?php echo $note_synthese->getTitre(); ?></i></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer la note de synthese <?php echo $note_synthese->getTitre(); ?> ?</i></b></p>
            </div>
            <div class="modal-footer">
                <form action="suppr_note_synthese" method="post">
                    <input name="id_note_synthese" type="hidden" value="<?php echo $note_synthese->getId(); ?>">
                    <input type="submit" name="search" value="Supprimer" class="btn btn-outline-danger">
                </form>
            </div>
        </div>
    </div>
</div>

<br>


<div class="margin-actu mb-5">
    <?php echo $note_synthese->getNote() ?>
    <?php
    if (!empty($note_synthese->getImage_note())) {
    ?>
        <img src="../public/images/note_synthese/<?php echo $note_synthese->getId(); ?>-<?php echo $note_synthese->getTitre(); ?>-<?php echo $note_synthese->getImage_note(); ?>" alt="<?php echo $note_synthese->getTitre(); ?>" class="image-secondaire rounded float-left">
    <?php }
    ?>
</div>





<?php
$content = ob_get_clean();
$titre = "note de synthese";
require "template.view.php";
?>