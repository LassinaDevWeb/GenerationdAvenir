<?php ob_start(); ?>
<?php

if (!empty($list_carte_blanches)) {
?>
    <div class="row img-acceuil">
        <div class="col-md-5 col-lg-5 col-sm-12 text-center cb-back" style=" background-repeat:no-repeat; background-size: cover;
 background-image: url('../public/images/carte_blanche/<?php echo $list_carte_blanches[0]->getId(); ?>-<?php echo $list_carte_blanches[0]->getPhoto(); ?>')">
            <form action="carte_blanche" method="post">
                <input name="id_carte_blanche" type="hidden" value="<?php echo $list_carte_blanches[0]->getId(); ?>" class="">

                <!--  <input type="submit" value="" class="btn btn-link link-actus ">-->
                <button type="submit" class="btn btn-link link-actus ">
                    <p class="text-center text-light text-uppercase"><b><?php echo $list_carte_blanches[0]->getTitre(); ?></b></p>
                </button>
            </form>
            <p class="text-light"><?php echo implode('/', array_reverse(explode('-', $list_carte_blanches[0]->getDate_publication()))); ?> , Dans Actualité , Cartes Blanches</p>
        </div>

        <?php

        if (!empty($list_carte_blanches[1])) {
        ?>
            <div class="col-md-5 col-lg-5 col-sm-12  text-center cb-back" style=" background-repeat:no-repeat; background-size: cover;
 background-image: url('../public/images/carte_blanche/<?php echo $list_carte_blanches[1]->getId(); ?>-<?php echo $list_carte_blanches[1]->getPhoto(); ?>')">
                <form action="carte_blanche" method="post">
                    <input name="id_carte_blanche" type="hidden" value="<?php echo $list_carte_blanches[1]->getId(); ?>" class="">

                    <!--  <input type="submit" value="" class="btn btn-link link-actus ">-->
                    <button type="submit" class="btn btn-link link-actus ">
                        <p class="text-center text-light text-uppercase"><b><?php echo $list_carte_blanches[1]->getTitre(); ?></b></p>
                    </button>
                </form>
                <p class="text-light"><?php echo implode('/', array_reverse(explode('-', $list_carte_blanches[1]->getDate_publication()))); ?> , Dans Actualité , Cartes Blanches</p>
            </div>
        <?php }
        if (!empty($list_carte_blanches[2])) { ?>
            <div class="col-md-5 col-lg-5 col-sm-12  text-center cb-back" style=" background-repeat:no-repeat; background-size: cover;
background-image: url('../public/images/carte_blanche/<?php echo $list_carte_blanches[2]->getId(); ?>-<?php echo $list_carte_blanches[2]->getPhoto(); ?>')">
                <form action="carte_blanche" method="post">
                    <input name="id_carte_blanche" type="hidden" value="<?php echo $list_carte_blanches[2]->getId(); ?>" class="">

                    <!--  <input type="submit" value="" class="btn btn-link link-actus ">-->
                    <button type="submit" class="btn btn-link link-actus ">
                        <p class="text-center text-light text-uppercase"><b><?php echo $list_carte_blanches[2]->getTitre(); ?></b></p>
                    </button>
                </form>
                <p class="text-light"><?php echo implode('/', array_reverse(explode('-', $list_carte_blanches[2]->getDate_publication()))); ?> , Dans Actualité , Cartes Blanches</p>
            </div>

        <?php
        }
        if (!empty($list_carte_blanches[3])) {
        ?>
            <div class="col-md-5 col-lg-5 col-sm-12   text-center cb-back" style=" background-repeat:no-repeat; background-size: cover;
 background-image: url('../public/images/carte_blanche/<?php echo $list_carte_blanches[3]->getId(); ?>-<?php echo $list_carte_blanches[3]->getPhoto(); ?>')">
                <form action="carte_blanche" method="post">
                    <input name="id_carte_blanche" type="hidden" value="<?php echo $list_carte_blanches[3]->getId(); ?>" class="">

                    <!--  <input type="submit" value="" class="btn btn-link link-actus ">-->
                    <button type="submit" class="btn btn-link link-actus ">
                        <p class="text-center text-light text-uppercase"><b><?php echo $list_carte_blanches[3]->getTitre(); ?></b></p>
                    </button>
                </form>
                <p class="text-light"><?php echo implode('/', array_reverse(explode('-', $list_carte_blanches[3]->getDate_publication()))); ?> , Dans Actualité , Cartes Blanches</p>
            </div>
        <?php
        }
        ?>
    </div>
<?php } ?>

<div class="row mt-5 mb-5">
    <div class="col-lg-6 col-md-6 col-sm-12 text-right">
        <img id="photo_accueil" class="img-fluid" src="../public/images/accueil/photo_accueil.jpg" alt="generationdavenir.fr">
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 padding_text text-center    ">
        <h3 id="titre_accueil_propos" class="text-center">NOTRE AMBITION</h3>
        <hr>
        <h4 id="titre_second_accueil_propos" class="text-center"> Redonner à tous les moyens et l’envie de s’investir dans la vie politique et civique</h4>
        <p class="text-center" id="text_accueil"><b>Le but du Think-Tank est de rassembler les différents points de vue afin d’en tirer le meilleur et de proposer des textes dont l’application peut apporter une réelle évolution sociale. Il est donc important de mettre en place un système de communication efficace permettant à chaque membre d’être informé des propositions et du travail des autres membres.</b></p>
        <a href="a_propos" class="btn btn-outline-dark pl-4 pr-4 pb-3 pt-3 btn-rond ">A PROPOS</a>
    </div>

</div>



<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6  mt-5 text-center">
        <img class="img-fluid img-assoc" src="../public/images/accueil/nos_assoc.jpg" alt="generationdavenir.fr">

    </div>

    <div class="col-md-6 col-sm-12 col-lg-6 text-left">
        <br>
        <h3 id="titre_accueil_propos" class="text-center mb-5">NOTRE ASSOCIATION</h3>
        <div id="accordion">
            <div class="card border_accueil">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <div class="text-center ">
                            <button class="btn btn-link titre_assoc" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="bi bi-gear-wide-connected"></i> Pourquoi GDA ?
                            </button>
                        </div>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body text_assoc">
                        La diversité des références, des idées, des styles de vie et des centres d’intérêt des jeunes apporte une véritable richesse culturelle et intellectuelle à la société. Nous voulons représenter cette jeunesse, dans toute sa diversité. Nos propositions ne pourront être recevables que si elles émanent d’un large spectre de jeunes, unis par leur volonté d’agir.
                    </div>
                </div>
            </div>
            <div class="card border_accueil">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <div class="text-center ">
                            <button class="btn btn-link collapsed titre_assoc" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bi bi-pc-display-horizontal"></i> Ayons confiance en nos idées
                            </button>
                        </div>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body text_assoc">
                        Notre vocation est de faire des propositions par le biais de rapports, de soutenir des projets solides auprès de parlementaires, et de participer à l’amendement de lois afin de favoriser l’engagement de la jeunesse dans la vie publique.
                    </div>
                </div>
            </div>
            <div class="card border_accueil">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <div class="text-center ">
                            <button class="btn btn-link collapsed titre_assoc " data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="bi bi-pencil-fill"></i> Une association transpartisane
                            </button>
                        </div>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body text_assoc">
                        Nous ne sommes pas un parti, et ne sommes affiliés à une quelconque entité politique. Quelle que soit votre adhésion ou non à un parti ou une certaine idéologie, la diversité des avis et tendances politiques de chacun des membres du Think-Tank est une force.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="row mt-5 bg-dark pt-5  pb-5">
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class=" text-center">
                <img class="img-fluid mb-5 " src="../public/images/accueil/page.png" alt="generationdavenir.fr">
                <h4 class="titre_last_accueil"><b>SIMPLIFIER ET ÉTENDRE LA RÉFLEXION POLITIQUE</b></h4>
                <p class="text_last_accueil">Souvent perçue comme une sphère privée et restreinte, parfois hors d’atteinte, nous voulons simplifier et étendre la réflexion politique. Le manque de sensibilisation politique entrainent trop souvent un désintérêt et une perte de confiance en la politique française.
                </p>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="text-center">
                <img class="img-fluid mb-5" src="../public/images/accueil/rond.png" alt="generationdavenir.fr">
                <h4 class="titre_last_accueil"><b>RÉCONCILIER LA JEUNESSE AVEC LA POLITIQUE</b></h4>
                <p class="text_last_accueil">Très majoritairement formée de jeunes étudiants sensibilisés à l’action collective, politique et civique, nous voulons faire de GdA un premier pas vers la réconciliation entre la jeunesse et la pensée politique.
                </p>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="text-center">
                <img class="img-fluid mb-5" src="../public/images/accueil/coupe.png" alt="generationdavenir.fr">
                <h4 class="titre_last_accueil"><b>SOUTENIR DES PROJETS PARLEMENTAIRES</b></h4>
                <p class="text_last_accueil">Notre vocation est de faire des propositions par le biais de rapports, de soutenir des projets solides auprès de parlementaires, et de participer à l’amendement de lois afin de favoriser l’engagement de la jeunesse dans la vie publique</p>
            </div>
        </div>
    </div>
    <br>
    <br>


    <br>

    <div class="row text-center">
        <div class="col-12 mt-5 mb-5">
            <h3 id="titre_chiffre">GENERATION D'AVENIR EN CHIFFRES</h3>
        </div>
        <?php if (!empty($_SESSION['prenom'])) { ?>
            <div class="col-12 ml-5">
                <button type="submit" data-toggle="modal" class="btn btn-outline-secondary btn-supp float-left ml-2" data-target="#Modal">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><b><i>Modification des chiffre </i></b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="modif_number" method="post">
                                <div class="form-group">
                                    <label class="text-connexion ml-1" for="membre_actif">MEMBRES ACTIFS:</label>
                                    <input name="membre_actif" type="number" value="<?php echo $admin[0]->getMembre_actif(); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="text-connexion ml-1" for="soutien">SOUTIENS:</label>
                                    <input name="soutien" type="number" value="<?php echo $admin[0]->getSoutien(); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="text-connexion ml-1" for="rapport_ecrit">RAPPORTS ÉCRITS:</label>
                                    <input name="rapport_ecrit" type="number" value="<?php echo $admin[0]->getRapport_ecrit(); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="text-connexion ml-1" for="annee_travaux">ANNÉES DE TRAVAUX:</label>
                                    <input name="annee_travaux" type="number" value="<?php echo $admin[0]->getAnnee_travaux(); ?>">
                                </div>
                                <input name="id_admin" type="hidden" value="<?php echo $admin[0]->getId(); ?>" class="">
                                <input type="submit" name="search" value="Modifier" class="btn btn-outline-dark">
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-3 col-lg-3 col-sm-12">
            <h1 class="chiffre"><?php echo $admin[0]->getMembre_actif(); ?></h1>
            <p class="text_chiffre">MEMBRES ACTIFS</p>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-12">
            <h1 class="chiffre"><?php echo $admin[0]->getSoutien(); ?></h1>
            <p class="text_chiffre">SOUTIENS</p>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-12">
            <h1 class="chiffre"><?php echo $admin[0]->getRapport_ecrit(); ?></h1>
            <p class="text_chiffre">RAPPORTS ÉCRITS </p>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-12">
            <h1 class="chiffre"><?php echo $admin[0]->getAnnee_travaux(); ?></h1>
            <p class="text_chiffre">ANNÉES DE TRAVAUX</p>
        </div>
    </div>

    <br>
    <br>

    <div class="row mt-5 bg-dark pt-5  pb-5">
        <div class="col-12">
            <div class=" text-center">
                <h1 class="text-white" id="rejoint_accueil_titre"><b>Rejoignez </b>nous</h1>
                <p class="text_last_accueil"><b>L’adhésion à GdA est gratuite. Toutefois, nous comptons sur votre générosité au travers de dons. Ces dons nous permettent d’assurer des fonds de roulement annuels, d’assurer au mieux la préparation des évènements, et d’innover en continu.</b>
                </p>
            </div>
        </div>
    </div>

    <div class="row  bg-dark pt-5 mt-5 w-100  pb-5">
        <div class="col-12">
            <div class=" text-left ml-4">
                <img class="img-fluid" style="width: 157px; height: 78px;" src="../public/images/accueil/GDA.png" alt="generationdavenir.fr">
                <p class="text_last_accueil">GdA est un Think-Tank créé par des étudiants qui a vocation de recentrer l’action publique autour de la jeunesse. Rejoignez-nous !
                </p>
                <p class="text-white"><i class="bi bi-envelope"></i> <u>contact@generationdavenir.fr</u></p>
            </div>
        </div>
    </div>




    <?php
    $content = ob_get_clean();
    $titre = "Accueil";
    require "template.view.php";
    ?>