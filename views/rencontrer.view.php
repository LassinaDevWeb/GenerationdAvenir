<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article mb-5"><b>On les a rencontrés</b></h1>
</div>
<br>
<div class="row">
    <div class="col-6 p-content">

        <p class="text-rencontre"><b> recensons ici la liste des personnes interrogées, ou qui ont participé à nos formats et évènements.</b></p>
    </div>

    <div class="col-6">
        <img src="../public/images/rencontre/rencontre_principal.jpg" class="img-rencontre" alt="rencontre genration d'avenir">
    </div>
</div>
<br>
<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <a href="create_rencontre" class="btn btn-outline-dark float-right mr-2 ml-2 mt-4"><b><i>ajouter une personne </i></b></a>
<?php
}
?>
<br>
<br>

<div class="row zone-img mb-3 row-cols-1 row-cols-md-3 g-4">
    <?php
    if (!empty($list_rencontre)) {
        for ($i = 0; $i < count($list_rencontre); $i++) {
    ?>
            <div class="col">
                <div class="card h-100">
                    <img src="../public/images/rencontre/<?php echo $list_rencontre[$i]->getId(); ?>-<?php echo $list_rencontre[$i]->getPhoto(); ?>" class="card-img-top" alt='<?php echo $list_rencontre[$i]->getNom(); ?>'>
                    <div class=" card-body">
                        <h5 class="card-title"><b><?php echo $list_rencontre[$i]->getNom(); ?></b></h5>
                        <p class="card-text"><?php echo $list_rencontre[$i]->getRole(); ?></p>
                        <?php if (!empty($_SESSION['prenom'])) {
                            // Affichage d'un menu si un utilisateur est connecté 
                        ?>
                            <button type="submit" data-toggle="modal" class="btn btn-outline-dark btn-supp float-left ml-2" data-target="#Modal<?php echo $list_rencontre[$i]->getId(); ?>">
                                suppression
                            </button>

                            <div class="modal fade" id="Modal<?php echo $list_rencontre[$i]->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression de la rencontre avec <?php echo $list_rencontre[$i]->getNom(); ?></i></b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer la rencontre avec <?php echo $list_rencontre[$i]->getNom(); ?> ?</i></b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="suppr_rencontre" method="post">
                                                <input name="id_rencontre" type="hidden" value="<?php echo $list_rencontre[$i]->getId(); ?>">
                                                <input type="submit" name="search" value="Supprimer" class="btn btn-outline-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
</div>
<?php
    } else {
?>
    <h2 class=" ml-5 mr-5 mt-5 text-white bg-dark text-center"><b> Pas encore de rencontre !</b></h2>
<?php
    }
?>


<?php
$content = ob_get_clean();
$titre = "On les a rencontres";
require "template.view.php";
?>