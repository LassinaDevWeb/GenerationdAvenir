<?php
session_start();
require_once "controllers/controller.php";
$generationdavenirController = new generationdavenirController;

if (empty($_GET['page'])) {
    $generationdavenirController->accueil();
} else {
    switch ($_GET['page']) {
        case "accueil":
            $generationdavenirController->accueil();
            break;

        case "list_cartes_blanches":
            $generationdavenirController->list_carte_blanches();
            break;

        case "list_note_syntheses":
            $generationdavenirController->list_note_syntheses();
            break;

        case "list_rapports":
            $generationdavenirController->list_rapports();
            break;

        case "list_videos":
            $generationdavenirController->list_videos();
            break;

        case "list_rejoindre":
            $generationdavenirController->list_rejoindre();
            break;

        case "list_contribution":
            $generationdavenirController->list_contribution();
            break;

        case "podcast":
            $generationdavenirController->podcast();
            break;

        case "create_carte_blanche":
            $generationdavenirController->create_carte_blanche();
            break;

        case "a_propos":
            $generationdavenirController->a_propos();
            break;

        case "rencontrer":
            $generationdavenirController->rencontrer();
            break;

        case "equipe":
            $generationdavenirController->equipe();
            break;

        case "nous_rejoindre":
            $generationdavenirController->nous_rejoindre();
            break;

        case "vos_contribution":
            $generationdavenirController->vos_contribution();
            break;

        case "publi_carte_blanche":
            $generationdavenirController->publi_carte_blanche();
            break;

        case "connexion":
            $generationdavenirController->connexion();
            break;

        case "deconnexion":
            $generationdavenirController->deconnexion();
            break;

        case "carte_blanche":
            $generationdavenirController->carte_blanche();
            break;
        case "modif_carte_blanche":
            $generationdavenirController->modif_carte_blanche();
            break;

        case "verif_modif_carte_blanche":
            $generationdavenirController->verif_modif_carte_blanche();
            break;

        case "create_note_synthese":
            $generationdavenirController->create_note_synthese();
            break;

        case "note_synthese":
            $generationdavenirController->note_synthese();
            break;

        case "publi_note_synthese":
            $generationdavenirController->publi_note_synthese();
            break;

        case "modif_note_synthese":
            $generationdavenirController->modif_note_synthese();
            break;

        case "verif_modif_note_synthese":
            $generationdavenirController->verif_modif_note_synthese();
            break;

        case "suppr_carte_blanche":
            $generationdavenirController->suppr_carte_blanche();
            break;

        case "suppr_note_synthese":
            $generationdavenirController->suppr_note_synthese();
            break;

        case "create_rencontre":
            $generationdavenirController->create_rencontre();
            break;

        case "publi_rencontre":
            $generationdavenirController->publi_rencontre();
            break;


        case "publi_rejoindre":
            $generationdavenirController->publi_rejoindre();
            break;

        case "suppr_contribution":
            $generationdavenirController->suppr_contribution();
            break;

        case "suppr_rejoindre":
            $generationdavenirController->suppr_rejoindre();
            break;

        case "create_equipe":
            $generationdavenirController->create_equipe();
            break;

        case "publi_equipe":
            $generationdavenirController->publi_equipe();
            break;

        case "mention_legal":
            $generationdavenirController->mention_legal();
            break;

        case "suppr_equipe":
            $generationdavenirController->suppr_equipe();
            break;

        case "suppr_rencontre":
            $generationdavenirController->suppr_rencontre();
            break;

        case "create_video":
            $generationdavenirController->create_video();
            break;

        case "publi_video":
            $generationdavenirController->publi_video();
            break;

        case "video":
            $generationdavenirController->video();
            break;

        case "modif_video":
            $generationdavenirController->modif_video();
            break;

        case "verif_modif_video":
            $generationdavenirController->verif_modif_video();
            break;

        case "suppr_video":
            $generationdavenirController->suppr_video();
            break;


        case "contribu_etape2":
            $generationdavenirController->contribu_etape2();
            break;

        case "contribu_etape3":
            $generationdavenirController->contribu_etape3();
            break;

        case "contribu_etape4":
            $generationdavenirController->contribu_etape4();
            break;

        case "publi_contribution":
            $generationdavenirController->publi_contribution();
            break;

        case "modif_number":
            $generationdavenirController->modif_number();
            break;
    }
}
