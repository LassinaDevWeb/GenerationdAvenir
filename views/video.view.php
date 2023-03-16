<div class="text-center padding_actus" style=" background-repeat:no-repeat; background-size: cover;
 background-image: url('../public/images/video/<?php echo $video->getId(); ?>-<?php echo $video->getPhoto(); ?>')">

    <h2 class=" titre-cb pt-5"><b><?php echo $video->getTitre(); ?></b></h2>
</div>
<br>
<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <form action="modif_video" method="post">
        <input name="id_video" type="hidden" value="<?php echo $video->getId(); ?>">
        <button value="button" id="submit" class="btn btn-outline-dark float-right mr-2">Modifier</button>
    </form>

    <button type="submit" data-toggle="modal" class="btn btn-outline-dark btn-supp float-left ml-2" data-target="#Modal<?php echo $video->getId(); ?>">
        suppression
    </button>

    <div class="modal fade" id="Modal<?php echo $video->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression de la video <?php echo $video->getTitre(); ?></i></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer la video <?php echo $video->getTitre(); ?> ?</i></b></p>
                </div>
                <div class="modal-footer">
                    <form action="suppr_video" method="post">
                        <input name="id_video" type="hidden" value="<?php echo $video->getId(); ?>">
                        <input type="submit" name="search" value="Supprimer" class="btn btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<br>
<div class="margin-actu">
    <?php echo $video->getDescription() ?>
    <br>
    <br>
    <div class="text-center">

        <iframe width="560" height="315" src="<?php echo $video->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

</div>





<?php
$content = ob_get_clean();
$titre = "carte blanche";
require "template.view.php";
?>