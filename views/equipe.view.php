<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Nos équipe</b></h1>
</div>


<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <a href="create_equipe" class="btn btn-outline-dark float-right mr-2 ml-2 mt-5"><b><i>ajouter un membre</i></b></a>
<?php
}
?>


<div class="row zone-img mb-3 row-cols-1 row-cols-md-3 mt-5 g-4">
    <?php
    if (!empty($list_equipe)) {
        for ($i = 0; $i < count($list_equipe); $i++) {

    ?>



            <div class="col">
                <div class="card h-100">
                    <img src="../public/images/equipe/<?php echo $list_equipe[$i]->getId(); ?>-<?php echo $list_equipe[$i]->getPhoto(); ?>" class="card-img-top" alt='<?php echo $list_equipe[$i]->getNom(); ?>'>
                    <div class=" card-body">
                        <h5 class="card-title"><u><b><?php echo $list_equipe[$i]->getNom(); ?></b></u></h5>
                        <h5 class="card-text  text-uppercase"><u><b><?php echo $list_equipe[$i]->getSection(); ?></b></u></h5>
                        <p class="card-text"><?php echo $list_equipe[$i]->getRole(); ?></p>
                        <p class="card-text"><?php echo $list_equipe[$i]->getEmail(); ?></p>
                        <?php if (!empty($list_equipe[$i]->getReseau_principal())) { ?>
                            <a class="mr-3" href="<?php echo $list_equipe[$i]->getReseau_principal(); ?>"><i class="bi bi-twitter"></i></a>
                        <?php } ?>
                        <?php if (!empty($list_equipe[$i]->getReseau_secondaire())) { ?>
                            <a href="<?php echo $list_equipe[$i]->getReseau_secondaire(); ?>"><i class="bi bi-linkedin"></i></a>
                        <?php
                        }
                        if (!empty($_SESSION['prenom'])) {
                            // Affichage d'un menu si un utilisateur est connecté 
                        ?>
                            <button type="submit" data-toggle="modal" class="btn btn-outline-dark btn-supp float-left ml-2 mt-3" data-target="#Modal<?php echo $list_equipe[$i]->getId(); ?>">
                                suppression
                            </button>

                            <div class="modal fade" id="Modal<?php echo $list_equipe[$i]->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression de l'équipier' <?php echo $list_equipe[$i]->getNom(); ?></i></b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer l'équipier <?php echo $list_equipe[$i]->getNom(); ?> ?</i></b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="suppr_equipe" method="post">
                                                <input name="id_equipe" type="hidden" value="<?php echo $list_equipe[$i]->getId(); ?>">
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
    <h2 class=" ml-5 mr-5 mt-5 text-white bg-dark text-center"><b> Pas encore d'équipier !</b></h2>

<?php
    }
?>

<br>
<br>

<?php
$content = ob_get_clean();
$titre = "Nos equipe";
require "template.view.php";
?>