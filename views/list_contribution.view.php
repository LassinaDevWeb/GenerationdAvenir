<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Liste des contributions</b></h1>
</div>

<div class="row">
    <?php
    if (!empty($list_contribution)) {
        for ($i = 0; $i < count($list_contribution); $i++) :
    ?>
            <div class="col-md-12 col-lg-12 col-sm-12 mt-12 ml-12 mb-12">
                <div class="jumbotron mt-3 container " id="jum">

                    <button type="submit" class="close" aria-label="Close" data-toggle="modal" data-target="#Modal<?php echo $list_contribution[$i]->getId();  ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal fade" id="Modal<?php echo $list_contribution[$i]->getId();  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Suppression du dossier de <?php echo $list_contribution[$i]->getNom(); ?>
                                                <?php echo $list_contribution[$i]->getPrenom();  ?></i></b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-danger"><b><i>Etes vous sur de vouloir supprimer le dossier de <?php echo $list_contribution[$i]->getNom(); ?>
                                                <?php echo $list_contribution[$i]->getPrenom();   ?> ?</i></b></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="suppr_contribution" method="post">
                                        <input name="id_jumb_contribution" type="hidden" value="<?php echo $list_contribution[$i]->getId(); ?>">
                                        <input type="submit" name="search" value="Supprimer" class="btn btn-outline-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1 class="display-4 text-left "><u><?php echo $list_contribution[$i]->getNom(); ?></u></h1>
                    <h2 class="display-6 text-left "><u><?php echo $list_contribution[$i]->getPrenom(); ?></u></h2>

                    <label class="text-secondary font-weight-bold font-italic " for="date_naissance">Date de naissance</label>
                    <p class="lead" id="date_naissance"><?php echo implode('/', array_reverse(explode('-', $list_contribution[$i]->getDate_naissance()))); ?></p>

                    <label class="text-secondary font-weight-bold font-italic " for="activite">Activité</label>
                    <p class="lead" id="activite"><b><?php echo $list_contribution[$i]->getActivite(); ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="Responsabilite">Responsabilité(s)</label>
                    <p class="lead" id="Responsabilite"><b><?php echo $list_contribution[$i]->getResponsabilite(); ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="theme">thème de l'un des 3 prochains travaux à paraitre </label>
                    <p class="lead" id="theme"><b><?php echo $list_contribution[$i]->getTheme();  ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="niveau_action">Niveau d'action de la proposition </label>
                    <p class="lead" id="niveau_action"><b><?php echo $list_contribution[$i]->getNiveau_action();  ?></b></p>


                    <label class="text-secondary font-weight-bold font-italic " for="constat">Constat/Problème à l'origine de la proposition</label>
                    <p class="lead" id="constat"><b><?php echo $list_contribution[$i]->getConstat(); ?></b></p>


                    <label class="text-secondary font-weight-bold font-italic " for="proposition">Proposition/Idée/Solution</label>
                    <p class="lead" id="proposition"><b><?php echo $list_contribution[$i]->getProposition();  ?></b></p>


                    <label class="text-secondary font-weight-bold font-italic " for="mise_en_place">Facilité de mise en place</label>
                    <p class="lead" id="mise_en_place"><b><?php echo $list_contribution[$i]->getMise_en_place();  ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="juridique">Faisabilité juridique</label>
                    <p class="lead" id="juridique"><b><?php echo $list_contribution[$i]->getJuridique();  ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="budgetaire">Impact budgétaire</label>
                    <p class="lead" id="budgetaire"><b><?php echo $list_contribution[$i]->getBudgetaire();  ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="impact_social">Impact social</label>
                    <p class="lead" id="impact_social"><b><?php echo $list_contribution[$i]->getImpact_social(); ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="impact_environnemental">Impact environnemental</label>
                    <p class="lead" id="impact_environnemental"><b><?php echo $list_contribution[$i]->getImpact_environnement(); ?></b></p>

                    <label class="text-secondary font-weight-bold font-italic " for="application">Application de la proposition par le passé ou à l'étranger</label>
                    <p class="lead" id="application"><b><?php echo $list_contribution[$i]->getApplication(); ?></b></p>

                    <a href="public/contribution_fichier/<?php echo $list_contribution[$i]->getId(); ?>-<?php echo $list_contribution[$i]->getFichier(); ?>" class="btn btn-outline-secondary mb-2"><b>Telecharger cv</b></a>
                    <a href="mailto:<?php echo $list_contribution[$i]->getEmail(); ?>?subject=Generation d'avenir" class="btn btn-outline-secondary col-6 col-sm-12 col-md-12 "><b>Cliquez ici pour envoyer un e-mail !</b></a>

                </div>

            </div>
</div>
<?php
        endfor;
    } elseif (empty($list_rejoindre)) {
?>
<div class="text-center">
    <h2 class=" ml-5 mr-5 mt-5 mb-3 text-white bg-dark "><b> Aucun dossier de contribution pour le moment !</b></h2>
</div>
<?php
    }
?>
</div>


<?php

$content = ob_get_clean();
$titre = "Liste de candidature pour nous rejoindre";
require "template.view.php";
?>