<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Notes de synthèses</b></h1>
</div>
<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <a href="create_note_synthese" class="btn btn-outline-dark float-right mr-2 ml-2 mt-4"><b><i>ajouter une Note de synthèse</i></b></a>
<?php
}
?>

<?php
$count = 0;
if (!empty($list_note_syntheses)) {
    for ($i = 0; $i < count($list_note_syntheses); $i++) {
        $counti = $i;
?>
        <div class="row mt-5 mb-3">
            <?php
            if ($counti == 0 || $counti != $count + 2 && $counti != $count - 1) {
                $date = $list_note_syntheses[$i]->getDate_publication();
            ?>
                <div class="col-md-6 col-sm-12 margin-textleft-cb">

                    <h3><?php echo implode('/', array_reverse(explode('-', $date)));
                        ?></h3>
                    <!-- <a href="#" class=" link-actus h3 text-uppercase"><b><?php //echo $list_carte_blanches[$i]->getTitre();  
                                                                                ?></b></a> -->
                    <form action="note_synthese" method="post" class="">
                        <input name="id_note_synthese" type="hidden" value="<?php echo $list_note_syntheses[$i]->getId(); ?>" class="">

                        <!--  <input type="submit" value="" class="btn btn-link link-actus ">-->
                        <button type="submit" class="btn btn-link link-actus ">
                            <p class="text-left"><b><?php echo $list_note_syntheses[$i]->getTitre(); ?></b></p>
                        </button>
                    </form>
                </div>

                <div class="col-md-4 col-sm-12">
                    <img src="../public/images/note_synthese/<?php echo $list_note_syntheses[$i]->getId(); ?>-<?php echo $list_note_syntheses[$i]->getImage_principal(); ?>" class="img-fluid img-cb" alt="<?php echo $list_note_syntheses[$i]->getTitre(); ?>">
                </div>


            <?php

            } else {

            ?>


                <h3><?php echo implode('/', array_reverse(explode('-', $date)));
                    ?></h3>
                <!-- <a href="#" class=" link-actus h3 text-uppercase"><b><?php //echo $list_carte_blanches[$i]->getTitre();  
                                                                            ?></b></a> -->
                <form action="note_synthese" method="post" class="">
                    <input name="id_note_synthese" type="hidden" value="<?php echo $list_note_syntheses[$i]->getId(); ?>" class="">

                    <!--  <input type="submit" value="" class="btn btn-link link-actus ">-->
                    <button type="submit" class="btn btn-link link-actus ">
                        <p class="text-left"><b><?php echo $list_note_syntheses[$i]->getTitre(); ?></b></p>
                    </button>
                </form>
        </div>

        <div class="col-md-4 col-sm-12">
            <img src="../public/images/note_synthese/<?php echo $list_note_syntheses[$i]->getId(); ?>-<?php echo $list_note_syntheses[$i]->getImage_principal(); ?>" class="img-fluid img-cb" alt="<?php echo $list_note_syntheses[$i]->getTitre(); ?>">
        </div>
    <?php
            }
    ?>
    </div>

<?php

    }
} else {
?>
<h2 class=" ml-5 mr-5 mt-5 mb-3 text-white bg-dark text-center"><b> Pas encore de Note de synthese proposer sur le site !</b></h2>

<?php
}
?>



<?php
$content = ob_get_clean();
$titre = "Liste note de synthèses";
require "template.view.php";
?>