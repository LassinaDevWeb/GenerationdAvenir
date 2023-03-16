<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Liste de candidature pour nous rejoindre</b></h1>
</div>

<div class="row">
    <?php
    if (!empty($list_rejoindre)) {
        for ($i = 0; $i < count($list_rejoindre); $i++) :
    ?>
            <div class="col-md-12 col-lg-12 col-sm-12 mt-12 ml-12 mb-12">
                <div class="jumbotron mt-3 container " id="jum">

                    <button type="submit" class="close" aria-label="Close" data-toggle="modal" data-target="#Modal<?php echo $list_rejoindre[$i]->getId();  ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal fade" id="Modal<?php echo $list_rejoindre[$i]->getId();  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression du dossier de <?php echo $list_rejoindre[$i]->getNom(); ?>
                                                <?php echo $list_rejoindre[$i]->getPrenom();  ?></i></b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer le dossier de <?php echo $list_rejoindre[$i]->getNom(); ?>
                                                <?php echo $list_rejoindre[$i]->getPrenom();   ?> ?</i></b></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="suppr_rejoindre" method="post">
                                        <input name="id_jumb_rejoindre" type="hidden" value="<?php echo $list_rejoindre[$i]->getId(); ?>">
                                        <input type="submit" name="search" value="Supprimer" class="btn btn-outline-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1 class="display-4 text-left "><u><?php echo $list_rejoindre[$i]->getNom(); ?></u></h1>
                    <h2 class="display-6 text-left "><u><?php echo $list_rejoindre[$i]->getPrenom(); ?></u></h2>

                    <label class="text-secondary font-weight-bold font-italic " for="date_naissance">Date de naissance</label>
                    <p class="lead" id="date_naissance"><?php echo implode('/', array_reverse(explode('-', $list_rejoindre[$i]->getDate_naissance()))); ?></p>
                    <label class="text-secondary font-weight-bold font-italic " for="telephone">Numero de télèphone</label>
                    <p class="lead" id="telephone"><b><?php echo $list_rejoindre[$i]->getTelephone(); ?></b></p>
                    <label class="text-secondary font-weight-bold font-italic " for="niveau_etude">Niveau d'étude</label>
                    <p class="lead" id="niveau_etude"><b><?php echo $list_rejoindre[$i]->getNiveau_etude(); ?></b></p>
                    <label class="text-secondary font-weight-bold font-italic " for="domaine">Domaine</label>
                    <p class="lead" id="domaine"><b><?php echo $list_rejoindre[$i]->getDomaine();  ?></b></p>
                    <a href="public/rejoindre_cv/<?php echo $list_rejoindre[$i]->getId(); ?>-<?php echo $list_rejoindre[$i]->getLettre_motivation(); ?>" class="btn btn-outline-secondary mb-2"><b>Telecharger cv</b></a>
                    <a href="mailto:<?php echo $list_rejoindre[$i]->getEmail(); ?>?subject=Generation d'avenir" class="btn btn-outline-secondary col-6 col-sm-12 col-md-12 "><b>Cliquez ici pour envoyer un e-mail !</b></a>

                </div>

            </div>
</div>
<?php
        endfor;
    } elseif (empty($list_rejoindre)) {
?>
<h2 class=" ml-5 mr-5 mt-5 mb-3 text-white bg-dark "><b> Aucun dossier pour le moment !</b></h2>
<?php
    }
?>
</div>


<?php

$content = ob_get_clean();
$titre = "Liste de candidature pour nous rejoindre";
require "template.view.php";
?>