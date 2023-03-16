<?php

require "models/Carte_BlancheManager.class.php";
require "models/AdminManager.class.php";
require "models/Note_syntheseManager.class.php";
require "models/RencontreManager.class.php";
require "models/RejoindreManager.class.php";
require "models/EquipeManager.class.php";
require "models/VideoManager.class.php";
require "models/ContributionManager.class.php";

class generationdavenirController
{

    public function __construct()
    {
        $this->carte_blancheManager = new Carte_blancheManager;
        $this->carte_blancheManager->chargementCarteblanche();

        $this->adminManager = new AdminManager();
        $this->adminManager->chargementAdmin();

        $this->note_syntheseManager = new Note_syntheseManager();
        $this->note_syntheseManager->chargementNote_synthese();

        $this->rencontreManager = new RencontreManager();
        $this->rencontreManager->chargementRencontre();

        $this->rejoindreManager = new RejoindreManager();
        $this->rejoindreManager->chargementRejoindre();

        $this->equipeManager = new  EquipeManager();
        $this->equipeManager->chargementEquipe();

        $this->videoManager = new  VideoManager();
        $this->videoManager->chargementVideo();

        $this->contributionManager = new  ContributionManager();
        $this->contributionManager->chargementContribution();
    }

    public function accueil()
    {
        $admin = $this->adminManager->getAdmin();
        $list_carte_blanches = $this->carte_blancheManager->getCarteblanche();
        unset($_SESSION['email_contribution']);

        require "views/accueil.view.php";
    }

    public function mention_legal()
    {
        require "views/mention_legal.view.php";
    }

    public function list_carte_blanches()
    {
        $list_carte_blanches = $this->carte_blancheManager->getCarteblanche();
        require "views/list_carte_blanche.view.php";
    }

    public function carte_blanche()
    {
        $id = $_POST['id_carte_blanche'];
        $carte_blanche = $this->carte_blancheManager->getCarteblancheById($id);
        require "views/carte_blanche.view.php";
    }

    public function list_note_syntheses()
    {
        $list_note_syntheses = $this->note_syntheseManager->getNote_synthese();
        require "views/list_note_synthese.view.php";
    }
    public function note_synthese()
    {
        $id = $_POST['id_note_synthese'];
        $note_synthese = $this->note_syntheseManager->getNote_syntheseById($id);
        require "views/note_synthese.view.php";
    }
    public function list_rapports()
    {

        require "views/list_rapport.view.php";
    }
    public function list_videos()
    {
        $list_videos = $this->videoManager->getVideo();
        require "views/list_video.view.php";
    }
    public function podcast()
    {

        require "views/podcast.view.php";
    }
    public function a_propos()
    {
        require "views/a_propos.view.php";
    }

    public function rencontrer()
    {
        $list_rencontre = $this->rencontreManager->getRencontre();
        require "views/rencontrer.view.php";
    }

    public function equipe()
    {
        $list_equipe = $this->equipeManager->getEquipe();
        require "views/equipe.view.php";
    }

    public function nous_rejoindre()
    {
        require "views/nous_rejoindre.view.php";
    }

    public function vos_contribution()
    {
        require "views/vos_contribution.view.php";
    }

    public function video()
    {
        $id = $_POST['id_video'];
        $video = $this->videoManager->getVideoById($id);
        require "views/video.view.php";
    }

    public function create_carte_blanche()
    {
        if (!empty($_SESSION['prenom'])) {
            require "views/create_carte_blanche.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function create_video()
    {
        if (!empty($_SESSION['prenom'])) {
            require "views/create_video.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function create_equipe()
    {
        if (!empty($_SESSION['prenom'])) {
            require "views/create_equipe.view.php";
        } else {
            header("Location:accueil");
        }
    }
    public function list_rejoindre()
    {
        $list_rejoindre = $this->rejoindreManager->getRejoindre();
        if (!empty($_SESSION['prenom'])) {
            require "views/list_rejoindre.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function list_contribution()
    {
        $list_contribution = $this->contributionManager->getContribution();
        if (!empty($_SESSION['prenom'])) {
            require "views/list_contribution.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function publi_carte_blanche()
    {
        $titre = isset($_POST['titre']) ? $_POST['titre'] : ' ';

        $date_publication = isset($_POST['date_publication']) ? $_POST['date_publication'] : ' ';

        $description = $_POST['description'];

        $constat =  isset($_POST['constat']) ? $_POST['constat'] : ' ';

        $objectif = isset($_POST['objectif']) ? $_POST['objectif'] : ' ';

        $realisation = isset($_POST['realisation']) ? $_POST['realisation'] : ' ';

        $redacteur_principale = isset($_POST['redacteur_principale']) ? $_POST['redacteur_principale'] : ' ';

        $redacteur_secondaire = $_POST['redacteur_secondaire'];

        $nomficher = basename($_FILES["image"]["name"]);


        //   if (empty($redacteur_secondaire) || empty($description)) {
        if (
            !empty(!htmlentities(!htmlspecialchars($titre)))
            && !empty(!htmlentities(!htmlspecialchars($date_publication)))
            && !empty(!htmlentities(!htmlspecialchars($constat)))
            && !empty(!htmlentities(!htmlspecialchars($objectif)))
            && !empty(!htmlentities(!htmlspecialchars($realisation)))
            && !empty(!htmlentities(!htmlspecialchars($redacteur_principale)))

        ) {
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                }
                $this->carte_blancheManager->ajoutCarteblancheBD($titre, $date_publication, $description, $constat, $objectif, $realisation, $redacteur_principale, $redacteur_secondaire, $nomficher);

                $carte_blanchebytitre = $this->carte_blancheManager->getCarteblancheBytitle($titre);
                $id = $carte_blanchebytitre->getId();
                $img = $carte_blanchebytitre->getPhoto();


                if (in_array($extensionImage, $extensionsArray) && !empty($id) && !empty($img)) {  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $address = 'public/images/carte_blanche/' . $id . '-' . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre image avec une clé unique suivie du nom du fichier
                    unset($_SESSION['echec_carte_blanche']);
                    header("Location:list_cartes_blanches");
                    $error = 0;
                } else {
                    $_SESSION['echec_carte_blanche'] = "La carte blanche n'a pas pu etre ajouter !";
                    header("Location:create_carte_blanche");
                }
            }
        } else {
            $_SESSION['echec_carte_blanche'] = "La carte blanche n'a pas pu etre ajouter !";
            header("Location:create_carte_blanche");
        }
    }



    public function publi_video()
    {
        $titre = isset($_POST['titre']) ? $_POST['titre'] : ' ';

        $date_publication = isset($_POST['date_publication']) ? $_POST['date_publication'] : ' ';

        $description = $_POST['description'];

        $lien =  isset($_POST['lien']) ? $_POST['lien'] : ' ';

        $nomficher = basename($_FILES["image"]["name"]);


        //   if (empty($redacteur_secondaire) || empty($description)) {
        if (
            !empty(!htmlentities(!htmlspecialchars($titre)))
            && !empty(!htmlentities(!htmlspecialchars($date_publication)))
            && !empty(!htmlentities(!htmlspecialchars($lien)))
        ) {
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                }
                $this->videoManager->ajoutVideoBD($titre, $date_publication, $description, $lien, $nomficher);

                $videobytitre = $this->videoManager->getVideoBytitle($titre);
                $id = $videobytitre->getId();
                $img = $videobytitre->getPhoto();


                if (in_array($extensionImage, $extensionsArray) && !empty($id) && !empty($img)) {  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $address = 'public/images/video/' . $id . '-' . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre image avec une clé unique suivie du nom du fichier
                    unset($_SESSION['echec_video']);
                    header("Location:list_videos");
                    $error = 0;
                } else {
                    $_SESSION['echec_video'] = "La video n'a pas pu etre ajouter !";
                    header("Location:create_video");
                }
            }
        } else {
            $_SESSION['echec_video'] = "La video n'a pas pu etre ajouter !";
            header("Location:create_video");
        }
    }

    public function connexion()
    {

        $identifiant = isset($_POST['identifiant']) ? $_POST['identifiant'] : ' ';

        $password = isset($_POST['password']) ? $_POST['password'] : ' ';
        if (
            !empty(!htmlentities(!htmlspecialchars($identifiant)))
            && !empty(!htmlentities(!htmlspecialchars($password)))
        ) {
            $admin = $this->adminManager->getAdminByIdentifiantandpassword($identifiant, $password);
            if (!empty($admin)) {
                unset($_SESSION['no_admin']);
                $prenom = $this->adminManager->getNameByAdmin($identifiant);
                $_SESSION['prenom'] = $prenom;
                header("Location:accueil");
            } else {
                $_SESSION['no_admin'] = "Indentifiant ou Mot de passe Incorrect !";
                header("Location:accueil");
            }
        }
    }

    public function deconnexion()
    {
        unset($_SESSION['prenom']);
        header("Location:accueil");
    }

    public function modif_carte_blanche()
    {
        $id = $_POST['id_carte_blanche'];
        if (!empty($_SESSION['prenom'])) {
            $carte_blanche = $this->carte_blancheManager->getCarteblancheById($id);
            require "views/modif_carte_blanche.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function modif_video()
    {
        $id = $_POST['id_video'];
        if (!empty($_SESSION['prenom'])) {
            $video = $this->videoManager->getVideoById($id);
            require "views/modif_video.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function modif_note_synthese()
    {

        $id = $_POST['id_note_synthese'];
        if (!empty($_SESSION['prenom'])) {
            $note_synthese = $this->note_syntheseManager->getNote_syntheseById($id);
            require "views/modif_note_synthese.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function verif_modif_carte_blanche()
    {
        $id = isset($_POST['id_carte_blanche']) ? $_POST['id_carte_blanche'] : ' ';

        $old_photo =  isset($_POST['old_photo']) ? $_POST['old_photo'] : ' ';

        $titre = isset($_POST['titre']) ? $_POST['titre'] : ' ';

        $date_publication = isset($_POST['date_publication']) ? $_POST['date_publication'] : ' ';

        $description = $_POST['description'];

        $constat =  isset($_POST['constat']) ? $_POST['constat'] : ' ';

        $objectif = isset($_POST['objectif']) ? $_POST['objectif'] : ' ';

        $realisation = isset($_POST['realisation']) ? $_POST['realisation'] : ' ';

        $redacteur_principale = isset($_POST['redacteur_principale']) ? $_POST['redacteur_principale'] : ' ';

        $redacteur_secondaire = $_POST['redacteur_secondaire'];
        $redacteur_secondaire = isset($_POST['redacteur_secondaire']) ? $_POST['redacteur_secondaire'] : ' ';
        $nomficher = basename($_FILES["image"]["name"]);

        if (
            !empty(!htmlentities(!htmlspecialchars($titre)))
            && !empty(!htmlentities(!htmlspecialchars($date_publication)))
            && !empty(!htmlentities(!htmlspecialchars($constat)))
            && !empty(!htmlentities(!htmlspecialchars($objectif)))
            && !empty(!htmlentities(!htmlspecialchars($realisation)))
            && !empty(!htmlentities(!htmlspecialchars($redacteur_principale)))
        ) {


            $this->carte_blancheManager->modificationCarteblancheBD($id, $titre, $date_publication, $description, $constat, $objectif, $realisation, $redacteur_principale, $redacteur_secondaire);
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                    $old_fichier = $id . '-' . $old_photo;
                    unlink('public/images/carte_blanche/' . $old_fichier);
                    $this->carte_blancheManager->modificationPhotoCarteblanche($id, $nomficher);
                }
                if (in_array($extensionImage, $extensionsArray)) {  // le type du fichier correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $new_fichier = $id . '-' . $nomficher;
                    echo $new_fichier;
                    $address = 'public/images/carte_blanche/' . $new_fichier;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre fichier avec une clé unique suivie du nom du fichier
                    $error = 0;
                }
            }
            header("Location:list_cartes_blanches");
        }
    }

    public function verif_modif_video()
    {


        $id = isset($_POST['id_video']) ? $_POST['id_video'] : ' ';

        $old_photo =  isset($_POST['old_photo']) ? $_POST['old_photo'] : ' ';

        $titre = isset($_POST['titre']) ? $_POST['titre'] : ' ';

        $date_publication = isset($_POST['date_publication']) ? $_POST['date_publication'] : ' ';

        $description = $_POST['description'];

        $lien =  isset($_POST['lien']) ? $_POST['lien'] : ' ';

        $nomficher = basename($_FILES["image"]["name"]);

        if (
            !empty(!htmlentities(!htmlspecialchars($titre)))
            && !empty(!htmlentities(!htmlspecialchars($date_publication)))
            && !empty(!htmlentities(!htmlspecialchars($lien)))
        ) {


            $this->videoManager->modificationVideoBD($id, $titre, $date_publication, $description, $lien);
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                    $old_fichier = $id . '-' . $old_photo;
                    unlink('public/images/video/' . $old_fichier);
                    $this->videoManager->modificationPhotoVideo($id, $nomficher);
                }
                if (in_array($extensionImage, $extensionsArray)) {  // le type du fichier correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $new_fichier = $id . '-' . $nomficher;
                    echo $new_fichier;
                    $address = 'public/images/video/' . $new_fichier;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre fichier avec une clé unique suivie du nom du fichier
                    $error = 0;
                }
            }
            header("Location:list_videos");
        }
    }
    public function verif_modif_note_synthese()
    {
        $id = isset($_POST['id_carte_blanche']) ? $_POST['id_carte_blanche'] : ' ';

        $old_image =  isset($_POST['old_image']) ? $_POST['old_image'] : ' ';

        $old_image_secondaire =  isset($_POST['old_image_secondaire']) ? $_POST['old_image_secondaire'] : ' ';

        $titre = isset($_POST['titre']) ? $_POST['titre'] : ' ';

        $date_publication = isset($_POST['date_publication']) ? $_POST['date_publication'] : ' ';

        $note = $_POST['note'];


        $nomficher = basename($_FILES["image"]["name"]);
        $nomficher_secondaire = basename($_FILES["image_secondaire"]["name"]);

        if (
            !empty(!htmlentities(!htmlspecialchars($titre)))
            && !empty(!htmlentities(!htmlspecialchars($date_publication)))
            && !empty(!htmlentities(!htmlspecialchars($note)))
        ) {


            $this->note_syntheseManager->modificationNote_syntheseBD($id, $titre, $date_publication, $note);
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                    $old_fichier = $id . '-' . $old_image;
                    unlink('public/images/note_synthese/' . $old_fichier);
                    $this->note_syntheseManager->modificationPhotoNote_synthese($id, $nomficher);
                }
                if (in_array($extensionImage, $extensionsArray)) {  // le type du fichier correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $new_fichier = $id . '-' . $nomficher;

                    $address = 'public/images/note_synthese/' . $new_fichier;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre fichier avec une clé unique suivie du nom du fichier
                    $error = 0;
                }
            }
            if (isset($_FILES['image_secondaire']) && $_FILES['image_secondaire']['error'] == 0) {


                // verification de la taille de l'image
                if ($_FILES['image_secondaire']['size'] <= 3000000) {
                    $infoImage_secondaire = pathinfo($_FILES['image_secondaire']['name']);
                    $extensionImage_secondaire = $infoImage_secondaire['extension'];
                    $extensionsArray_secondaire = array('png', 'gif', 'jpg', 'jpeg');
                    $old_fichier_secondaire = $id . '-' . $titre . '-' . $old_image_secondaire;
                    unlink('public/images/note_synthese/' . $old_fichier_secondaire);
                    $this->note_syntheseManager->modificationPhoto_secondaire_Note_synthese($id, $nomficher_secondaire);
                }
                if (in_array($extensionImage_secondaire, $extensionsArray_secondaire)) {  // le type du fichier correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $new_fichier_secondaire = $id . '-' . $titre . '-' . $nomficher_secondaire;
                    $address = 'public/images/note_synthese/' . $new_fichier_secondaire;
                    move_uploaded_file($_FILES['image_secondaire']['tmp_name'], $address); // on renomme notre fichier avec une clé unique suivie du nom du fichier

                }
            }
            header("Location:list_note_syntheses");
        }
    }
    public function create_note_synthese()
    {
        if (!empty($_SESSION['prenom'])) {
            require "views/create_note_synthese.view.php";
        } else {
            header("Location:accueil");
        }
    }



    public function publi_note_synthese()
    {


        $titre = isset($_POST['titre']) ? $_POST['titre'] : ' ';

        $date_publication = isset($_POST['date_publication']) ? $_POST['date_publication'] : ' ';

        $note = isset($_POST['note']) ? $_POST['note'] : ' ';

        $nomficher = basename($_FILES["image"]["name"]);

        $nomficher_secondaire = basename($_FILES["image_secondaire"]["name"]);
        if (
            !empty(!htmlentities(!htmlspecialchars($titre)))
            && !empty(!htmlentities(!htmlspecialchars($date_publication)))
            && !empty(!htmlentities(!htmlspecialchars($note)))

        ) {
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                }

                $this->note_syntheseManager->ajoutNote_syntheseBD($titre, $date_publication, $note, $nomficher, $nomficher_secondaire);

                $note_synthesebytitre = $this->note_syntheseManager->getNote_syntheseBytitle($titre);
                $id = $note_synthesebytitre->getId();
                $img = $note_synthesebytitre->getImage_principal();


                if (in_array($extensionImage, $extensionsArray) && !empty($id) && !empty($img)) {  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $address = 'public/images/note_synthese/' . $id . '-' . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre image avec une clé unique suivie du nom du fichier

                    $error = 0;

                    if (isset($_FILES['image_secondaire']) && $_FILES['image_secondaire']['error'] == 0) {
                        if ($_FILES['image_secondaire']['size'] <= 3000000) {
                            $infoImage_secondaire = pathinfo($_FILES['image_secondaire']['name']);
                            $extensionImage_secondaire = $infoImage_secondaire['extension'];
                            $extensionsArray_secondaire = array('png', 'gif', 'jpg', 'jpeg');

                            if (in_array($extensionImage_secondaire, $extensionsArray_secondaire)) {
                                $address_secondaire = 'public/images/note_synthese/' . $id . '-' . $titre . '-' . $nomficher_secondaire;
                                move_uploaded_file($_FILES['image_secondaire']['tmp_name'], $address_secondaire);
                            }

                            unset($_SESSION['echec_note_synthese']);
                            header("Location:list_note_syntheses");
                        }
                    }
                } else {
                    $_SESSION['echec_note_synthese'] = "La note de synsthese n'a pas pu etre ajouter !";
                    header("Location:create_note_synthese");
                }
            }
        } else {
            $_SESSION['echec_note_synthese'] = "La note de synsthese n'a pas pu etre ajouter !";
            header("Location:create_note_synthese");
        }
    }

    public function  suppr_carte_blanche()
    {
        $id = $_POST['id_carte_blanche'];
        $carte_blanche = $this->carte_blancheManager->getCarteblancheById($id);
        $nom_fichier =  $carte_blanche->getPhoto();
        $fichier = $id . '-' . $nom_fichier;
        unlink('public/images/carte_blanche/' . $fichier);
        $this->carte_blancheManager->suppressionCarteblancheBD($id);
        header("Location:list_cartes_blanches");
    }

    public function suppr_video()
    {

        $id = $_POST['id_video'];
        $video = $this->videoManager->getVideoById($id);
        $nom_fichier =  $video->getPhoto();
        $fichier = $id . '-' . $nom_fichier;
        unlink('public/images/video/' . $fichier);
        $this->videoManager->suppressionVideoBD($id);
        header("Location:list_videos");
    }



    public function  suppr_note_synthese()
    {
        $id = $_POST['id_note_synthese'];
        $note_synthese = $this->note_syntheseManager->getNote_syntheseById($id);
        $nom_fichier =  $note_synthese->getImage_principal();
        $fichier = $id . '-' . $nom_fichier;
        unlink('public/images/note_synthese/' . $fichier);
        $this->note_syntheseManager->suppressionNote_syntheseBD($id);
        if (!empty($note_synthese->getImage_note())) {
            $titre  = $note_synthese->getTitre();
            $nomficher_secondaire = $note_synthese->getImage_note();
            $fichier_secondaire = $id . '-' . $titre . '-' . $nomficher_secondaire;
            unlink('public/images/note_synthese/' . $fichier_secondaire);
        }
        header("Location:list_note_syntheses");
    }

    public function suppr_rejoindre()
    {
        $id = $_POST['id_jumb_rejoindre'];
        $rejoindre = $this->rejoindreManager->getRejoindreById($id);
        $nom_fichier =  $rejoindre->getLettre_motivation();
        $fichier = $id . '-' . $nom_fichier;
        unlink('public/rejoindre_cv/' . $fichier);
        $this->rejoindreManager->suppressionRejoindreBD($id);
        header("Location:list_rejoindre");
    }

    public function suppr_contribution()
    {

        $id = $_POST['id_jumb_contribution'];
        $contribution = $this->contributionManager->getContributionById($id);
        $nom_fichier =  $contribution->getFichier();
        $fichier = $id . '-' . $nom_fichier;
        unlink('public/contribution_fichier/' . $fichier);
        $this->contributionManager->suppressionContributionBD($id);
        header("Location:list_contribution");
    }

    public function suppr_equipe()
    {
        $id = $_POST['id_equipe'];
        $equipe = $this->equipeManager->getEquipeById($id);
        $nom_photo =  $equipe->getPhoto();
        $fichier = $id . '-' . $nom_photo;
        unlink('public/images/equipe/' . $fichier);
        $this->equipeManager->suppressionEquipeBD($id);
        header("Location:equipe");
    }

    public function suppr_rencontre()
    {
        $id = $_POST['id_rencontre'];
        $rencontre = $this->rencontreManager->getRencontreById($id);
        $nom_photo =  $rencontre->getPhoto();
        $fichier = $id . '-' . $nom_photo;
        unlink('public/images/rencontre/' . $fichier);
        $this->rencontreManager->suppressionRencontreBD($id);
        header("Location:rencontrer");
    }

    public function create_rencontre()
    {
        if (!empty($_SESSION['prenom'])) {
            require "views/create_rencontre.view.php";
        } else {
            header("Location:accueil");
        }
    }

    public function publi_rencontre()
    {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $role = isset($_POST['role']) ? $_POST['role'] : ' ';

        $description = $_POST['description'];

        $nomficher = basename($_FILES["image"]["name"]);


        if (
            !empty(!htmlentities(!htmlspecialchars($nom)))
            && !empty(!htmlentities(!htmlspecialchars($role)))
        ) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                }

                $this->rencontreManager->ajoutRencontreBD($nom, $role, $description, $nomficher);

                $rencontrebyname = $this->rencontreManager->getRencontreByname($nom);
                $id = $rencontrebyname->getId();
                $img = $rencontrebyname->getPhoto();


                if (in_array($extensionImage, $extensionsArray) && !empty($id) && !empty($img)) {  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $address = 'public/images/rencontre/' . $id . '-' . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre image avec une clé unique suivie du nom du fichier
                    unset($_SESSION['echec_rencontre']);
                    header("Location:rencontrer");
                    $error = 0;
                } else {
                    $_SESSION['echec_rencontre'] = "La rencontre n'a pas pu etre ajouter !";
                    header("Location:create_rencontre");
                }
            }
        } else {
            $_SESSION['echec_rencontre'] = "La rencontre n'a pas pu etre ajouter !";
            header("Location:create_rencontre");
        }
    }

    public function publi_rejoindre()
    {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : ' ';

        $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ' ';

        $email = isset($_POST['email']) ? $_POST['email'] : ' ';

        $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : ' ';

        $niveau_etude = isset($_POST['niveau_etude']) ? $_POST['niveau_etude'] : ' ';

        $domaine = isset($_POST['domaine']) ? $_POST['domaine'] : ' ';

        $domaines = "";

        foreach ($domaine as $do) {

            $domaines .= $do . " ;";
        }

        $nomficher = basename($_FILES["fichier"]["name"]);


        if (
            !empty(!htmlentities(!htmlspecialchars($nom)))
            && !empty(!htmlentities(!htmlspecialchars($prenom)))
            && !empty(!htmlentities(!htmlspecialchars($date_naissance)))
            && !empty(!htmlentities(!htmlspecialchars($email)))
            && !empty(!htmlentities(!htmlspecialchars($telephone)))
            && !empty(!htmlentities(!htmlspecialchars($niveau_etude)))
            && !empty($domaine)
        ) {

            if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['fichier']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['fichier']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('pdf', 'word', 'doc', 'docx');
                }

                $this->rejoindreManager->ajoutRejoindreBD($nom, $prenom, $date_naissance, $email, $telephone, $niveau_etude,  $nomficher,  $domaines);
                $formationbyemail = $this->rejoindreManager->getRejoindreByemail($email);
                $id = $formationbyemail->getId();
                $fichier = $formationbyemail->getLettre_motivation();

                if (in_array($extensionImage, $extensionsArray) && !empty($id) && !empty($fichier)) {  // le type du fichier correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur

                    $address = 'public/rejoindre_cv/' . $id . '-' . $fichier;
                    move_uploaded_file($_FILES['fichier']['tmp_name'], $address); // on renomme notre fichier avec une clé unique suivie du nom du fichier
                    unset($_SESSION['echec_rejoindre']);
                    header("Location:accueil");
                    $error = 0;
                } else {
                    $_SESSION['echec_rejoindre'] = "Le dossier n'a pas pu etre envoyer !";
                    header("Location:nous_rejoindre");
                }
            }
        } else {
            $_SESSION['echec_rejoindre'] = "Le dossier n'a pas pu etre envoyer !";
            header("Location:nous_rejoindre");
        }
    }


    public function publi_equipe()
    {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $email =  isset($_POST['email']) ? $_POST['email'] : ' ';

        $reseau_principal = $_POST['reseau_principal'];

        $reseau_secondaire = $_POST['reseau_secondaire'];

        $role =  isset($_POST['role']) ? $_POST['role'] : ' ';

        $section = isset($_POST['section']) ? $_POST['section'] : ' ';

        $nomficher = basename($_FILES["image"]["name"]);

        if (
            !empty(!htmlentities(!htmlspecialchars($nom)))
            && !empty(!htmlentities(!htmlspecialchars($email)))
            && !empty(!htmlentities(!htmlspecialchars($role)))
            && !empty(!htmlentities(!htmlspecialchars($section)))
        ) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['image']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
                }

                $this->equipeManager->ajoutEquipeBD($nom, $email, $reseau_principal, $reseau_secondaire, $nomficher, $role, $section);

                $equipebyname = $this->equipeManager->getEquipeByname($nom);
                $id = $equipebyname->getId();
                $img = $equipebyname->getPhoto();


                if (in_array($extensionImage, $extensionsArray) && !empty($id) && !empty($img)) {  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    $address = 'public/images/equipe/' . $id . '-' . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $address); // on renomme notre image avec une clé unique suivie du nom du fichier
                    unset($_SESSION['echec_equipe']);
                    header("Location:equipe");
                    $error = 0;
                } else {
                    $_SESSION['echec_equipe'] = "L'équpier n'a pas pu etre ajouter !";
                    header("Location:create_equipe");
                }
            }
        } else {
            $_SESSION['echec_equipe'] = "L'équpier n'a pas pu etre ajouter !";
            header("Location:create_equipe");
        }
    }


    public function contribu_etape2()
    {

        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : ' ';

        $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ' ';

        $email =  isset($_POST['email']) ? $_POST['email'] : ' ';

        $activite =  isset($_POST['activite']) ? $_POST['activite'] : ' ';

        $responsabilite = $_POST['responsabilite'];

        if (
            !empty(!htmlentities(!htmlspecialchars($nom)))
            && !empty(!htmlentities(!htmlspecialchars($prenom)))
            && !empty(!htmlentities(!htmlspecialchars($date_naissance)))
            && !empty(!htmlentities(!htmlspecialchars($email)))
            && !empty(!htmlentities(!htmlspecialchars($activite)))
        ) {
            $contributionbyemail = $this->contributionManager->getContributionByemail($email);
            if (!empty($contributionbyemail)) {
                $_SESSION['email_contribution'] = "Le dossier déja envoyer !";
                header("Location:vos_contribution");
            } else {
                require "views/etape2_contribution.view.php";
                unset($_SESSION['email_contribution']);
            }
        } else {
            header("Location:vos_contribution");
        }
    }

    public function contribu_etape3()
    {

        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : ' ';

        $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ' ';

        $email =  isset($_POST['email']) ? $_POST['email'] : ' ';

        $activite =  isset($_POST['activite']) ? $_POST['activite'] : ' ';

        $responsabilite = $_POST['responsabilite'];

        $theme = isset($_POST['theme']) ? $_POST['theme'] : ' ';

        $constat =  isset($_POST['constat']) ? $_POST['constat'] : ' ';

        $proposition = isset($_POST['proposition']) ? $_POST['proposition'] : ' ';

        $niveau_action = isset($_POST['niveau_action']) ? $_POST['niveau_action'] : ' ';

        $niveau_actions = "";

        foreach ($niveau_action as $na) {

            $niveau_actions .= $na . " ;";
        }


        if (
            !empty(!htmlentities(!htmlspecialchars($theme)))
            && !empty(!htmlentities(!htmlspecialchars($constat)))
            && !empty(!htmlentities(!htmlspecialchars($proposition)))
            && !empty($niveau_action)

        ) {

            require "views/etape3_contribution.view.php";
        } else {
            header("Location:vos_contribution");
        }
    }

    public function contribu_etape4()
    {

        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : ' ';

        $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ' ';

        $email =  isset($_POST['email']) ? $_POST['email'] : ' ';

        $activite =  isset($_POST['activite']) ? $_POST['activite'] : ' ';

        $responsabilite = $_POST['responsabilite'];

        $theme = isset($_POST['theme']) ? $_POST['theme'] : ' ';

        $constat =  isset($_POST['constat']) ? $_POST['constat'] : ' ';

        $proposition = isset($_POST['proposition']) ? $_POST['proposition'] : ' ';

        $niveau_actions = isset($_POST['niveau_actions']) ? $_POST['niveau_actions'] : ' ';

        $mise_en_place = isset($_POST['mise_en_place']) ? $_POST['mise_en_place'] : ' ';

        $juridique = isset($_POST['juridique']) ? $_POST['juridique'] : ' ';

        $budgetaire = isset($_POST['budgetaire']) ? $_POST['budgetaire'] : ' ';

        $impact_social = isset($_POST['impact_social']) ? $_POST['impact_social'] : ' ';

        $impact_environnement = isset($_POST['impact_environnement']) ? $_POST['impact_environnement'] : ' ';

        $application = isset($_POST['application']) ? $_POST['application'] : ' ';



        if (
            !empty($mise_en_place)
            && !empty($juridique)
            && !empty($budgetaire)
            && !empty($impact_social)
            && !empty($impact_environnement)
        ) {

            require "views/etape4_contribution.view.php";
        } else {
            header("Location:vos_contribution");
        }
    }


    public function publi_contribution()
    {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : ' ';

        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : ' ';

        $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ' ';

        $email =  isset($_POST['email']) ? $_POST['email'] : ' ';

        $activite =  isset($_POST['activite']) ? $_POST['activite'] : ' ';

        $responsabilite = $_POST['responsabilite'];

        $theme = isset($_POST['theme']) ? $_POST['theme'] : ' ';

        $constat =  isset($_POST['constat']) ? $_POST['constat'] : ' ';

        $proposition = isset($_POST['proposition']) ? $_POST['proposition'] : ' ';

        $niveau_actions = isset($_POST['niveau_actions']) ? $_POST['niveau_actions'] : ' ';




        $mise_en_place = isset($_POST['mise_en_place']) ? $_POST['mise_en_place'] : ' ';

        $juridique =  isset($_POST['juridique']) ? $_POST['juridique'] : ' ';

        $budgetaire = isset($_POST['budgetaire']) ? $_POST['budgetaire'] : ' ';

        $impact_social = isset($_POST['impact_social']) ? $_POST['impact_social'] : ' ';

        $impact_environnement = isset($_POST['impact_environnement']) ? $_POST['impact_environnement'] : ' ';

        $application = $_POST['application'];


        $nomficher = basename($_FILES["fichier"]["name"]);

        if (
            !empty(!htmlentities(!htmlspecialchars($nom)))
            && !empty(!htmlentities(!htmlspecialchars($prenom)))
            && !empty(!htmlentities(!htmlspecialchars($date_naissance)))
            && !empty(!htmlentities(!htmlspecialchars($email)))
            && !empty(!htmlentities(!htmlspecialchars($activite)))
            && !empty(!htmlentities(!htmlspecialchars($constat)))
            && !empty(!htmlentities(!htmlspecialchars($proposition)))
        ) {



            $this->contributionManager->ajoutContributionBD($nom, $prenom, $email, $date_naissance, $activite, $responsabilite, $theme, $niveau_actions, $constat, $proposition, $mise_en_place, $juridique, $budgetaire, $impact_social, $impact_environnement, $application, $nomficher);

            $contributionbyemail = $this->contributionManager->getContributionByemail($email);
            $id = $contributionbyemail->getId();
            $fichier = $contributionbyemail->getFichier();

            if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
                $error = 1;

                // verification de la taille de l'image
                if ($_FILES['fichier']['size'] <= 3000000) {
                    $infoImage = pathinfo($_FILES['fichier']['name']);
                    $extensionImage = $infoImage['extension'];
                    $extensionsArray = array('pdf', 'word', 'doc', 'docx');
                }
                if (in_array($extensionImage, $extensionsArray)) {  // le type du fichier correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
                    echo $fichier;
                    $address = 'public/contribution_fichier/' . $id . '-' . $fichier;
                    move_uploaded_file($_FILES['fichier']['tmp_name'], $address); // on renomme notre fichier avec une clé unique suivie du nom du fichier
                    unset($_SESSION['echec_contribution']);
                    header("Location:accueil");
                    $error = 0;
                }
            }

            header("Location:accueil");
            unset($_SESSION['echec_contribution']);
        } else {
            $_SESSION['echec_contribution'] = "Le dossier n'a pas pu etre envoyer !";
            header("Location:vos_contribution");
        }
    }

    public function modif_number()
    {
        $id = isset($_POST['id_admin']) ? $_POST['id_admin'] : ' ';

        $membre_actif =  isset($_POST['membre_actif']) ? $_POST['membre_actif'] : ' ';

        $soutien = isset($_POST['soutien']) ? $_POST['soutien'] : ' ';

        $rapport_ecrit = isset($_POST['rapport_ecrit']) ? $_POST['rapport_ecrit'] : ' ';

        $annee_travaux =  isset($_POST['annee_travaux']) ? $_POST['annee_travaux'] : ' ';



        if (
            !empty(!htmlentities(!htmlspecialchars($membre_actif)))
            && !empty(!htmlentities(!htmlspecialchars($soutien)))
            && !empty(!htmlentities(!htmlspecialchars($rapport_ecrit)))
            && !empty(!htmlentities(!htmlspecialchars($annee_travaux)))
        ) {


            $this->adminManager->modificationInformationAdminBD($id, $membre_actif, $soutien, $rapport_ecrit, $annee_travaux);
            header("Location:accueil");
        }
    }
}
