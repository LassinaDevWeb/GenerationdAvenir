<?php ob_start(); ?>

<div class="text-center padding_actus" style=" background-repeat:no-repeat; background-size: cover;
 background-image: url('../public/images/carte_blanche/<?php echo $carte_blanche->getId(); ?>-<?php echo $carte_blanche->getPhoto(); ?>')">

    <h2 class=" titre-cb pt-5"><b><?php echo $carte_blanche->getTitre(); ?></b></h2>
</div>
<br>
<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <form action="modif_carte_blanche" method="post">
        <input name="id_carte_blanche" type="hidden" value="<?php echo $carte_blanche->getId(); ?>">
        <button value="button" id="submit" class="btn btn-outline-dark float-right mr-2">Modifier</button>
    </form>

    <button type="submit" data-toggle="modal" class="btn btn-outline-dark btn-supp float-left ml-2" data-target="#Modal<?php echo $carte_blanche->getId(); ?>">
        suppression
    </button>

    <div class="modal fade" id="Modal<?php echo $carte_blanche->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression de la carte blanche <?php echo $carte_blanche->getTitre(); ?></i></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer la carte blanche <?php echo $carte_blanche->getTitre(); ?> ?</i></b></p>
                </div>
                <div class="modal-footer">
                    <form action="suppr_carte_blanche" method="post">
                        <input name="id_carte_blanche" type="hidden" value="<?php echo $carte_blanche->getId(); ?>">
                        <input type="submit" name="search" value="Supprimer" class="btn btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<br>
<div class="margin-actu">
    <?php echo $carte_blanche->getDescription() ?>
    <br>
    <br>
    <h4 class="parti-cb mb-3"><b>I. C O N S T A T</b></h4>

    <?php echo $carte_blanche->getConstat() ?>
    <h4 class="parti-cb mb-3"><b>I I. O B J E C T I F S</b></h4>
    <?php echo $carte_blanche->getObjectif() ?>
    <h4 class="parti-cb mb-3">
        <mb-3b>I I I. R É A L I S A T I ON</b>
    </h4>
    <?php echo $carte_blanche->getRealisation() ?>
    <br>
    <p class="text-cb text-right mr-5"><?php echo nl2br($carte_blanche->getRedacteur_principale()) ?></p>
    <p class="text-cb text-right mr-5"><?php echo nl2br($carte_blanche->getRedacteur_secondaire()) ?></p>
</div>





<?php
$content = ob_get_clean();
$titre = "carte blanche";
require "template.view.php";
?>