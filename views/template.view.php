<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/x1ljlpfbs7qf60p021vovmmkec6ezrp8om3htb62vvnmprtj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light top">
            <a href="accueil"><img src="../public/images/logo/LogoGA.png" alt="Géneration d'avenir" class="rounded float-left navbar-brand" style="width: 150px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            LE THINK-TANK
                        </a>
                        <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdownMenuLink1">
                            <a class="dropdown-item text-light" href="a_propos">A propos</a>
                            <a class="dropdown-item text-light" href="rencontrer">On les a rencontrés</a>
                            <a class="dropdown-item text-light" href="equipe">Notre équipe</a>
                            <a class="dropdown-item text-light" href="nous_rejoindre">Nous rejoindre</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown   ">
                        <a class="nav-link dropdown-toggle pl-5 pr-5 text-dark" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NOS PUBLICATIONS
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink2">
                            <a class="dropdown-item text-light" href="list_cartes_blanches">Cartes blanches</a>
                            <a class="dropdown-item text-light" href="list_note_syntheses">Notes de synthèses</a>
                            <a class="dropdown-item  disabled" href="list_rapports">Rapports</a>
                            <a class="dropdown-item text-light" href="list_videos">Vidéos</a>
                            <a class="dropdown-item text-light" href="podcast">Podcast</a>

                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  pr-5 text-dark" href="vos_contribution"> VOS CONTRIBUTION </a>
                    </li>
                    <?php if (!empty($_SESSION['prenom'])) { ?>


                        <div class="dropdown dropleft ">
                            <a href="#" class="dropdown-toggle btn btn-light lien_nav  " data-toggle="dropdown" class="Text"><?php echo $_SESSION['prenom']; ?></a>
                            <ul class="dropdown-menu" role="menu">
                                <div class="container col-sm-12" style="padding: 5px;">

                                    <form action="deconnexion" method="POST">
                                        <input type="submit" name="btnDeco" value="Se deconnecter" class="btn btn-outline-danger">
                                    </form>

                                    <a href="list_rejoindre" class="btn btn-outline-dark">Liste de candidature pour nous rejoindre</a>
                                    <a href="list_contribution" class="btn btn-outline-dark">Liste des contribution</a>
                                </div>
                            </ul>
                        </div>
                    <?php
                    } else {
                    ?>
                        <li>
                            <a href="#" class="dropdown-toggle btn" id="connect_admin" data-toggle="dropdown">Connexion</a>
                            <div class="dropdown-menu bg-light dropdown-menu-right mr-3" aria-labelledby="connect_admin">
                                <form method="POST" action="connexion" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="text-connexion ml-1" for="indentifiant">Indentifiant:</label>
                                        <input type="text" class="form-control input" id="identifiant" placeholder="Entrer votre identifiant" name="identifiant" style="text-align : center;" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-connexion ml-1" for="password">Mot de passe:</label>
                                        <input type="password" class="form-control input" id="password" placeholder="Enter votre mot de passe" name="password" style="text-align : center;" required>
                                    </div>
                                    <button type="submit" class="btn btn-dark ml-1">Connexion</button>
                                </form>
                                <?php if (!empty($_SESSION['no_admin'])) {
                                    // Affichage d'un menu si un utilisateur est connecté 
                                ?>

                                    <p class="text-center text-danger"><?php echo $_SESSION['no_admin'] ?></p>


                                <?php } ?>

                            </div>
                        </li>
                    <?php
                    }
                    ?>
                    <!--  <ul class="dropdown-menu" role="menu">
                        <div class="container col-sm-12" style="padding: 5px;">

                            <form method="POST" action="connexion" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="text-danger" for="indentifiant">Indentifiant:</label>
                                    <input type="text" class="form-control input" id="identifiant" placeholder="Entrer votre identifiant" name="identifiant" style="text-align : center;" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-danger" for="password">Mot de passe:</label>
                                    <input type="password" class="form-control input" id="password" placeholder="Enter votre mot de passe" name="password" style="text-align : center;" required>
                                </div>
                                <button type="submit" class="btn btn-dark">Connexion</button>
                            </form>
                        </div>
                    </ul> -->
                </ul>
            </div>
        </nav>

    </header>
    <main>

        <?= $content ?>


    </main>

    <footer class="bg-dark">
        <div class="contenue_footer social">
            <ul class="ul_liste_social">

                <p class="text-light">© 2020 Génération d’Avenir | Tous droits réservés |<a href="mention_legal" class="text-light"> Mention légales</a></p>

                <p class="text-right text-light mr-5"> Par Traore Lassina</p>

            </ul>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../public/js/textarea.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v13.0" nonce="io1XcJIR"></script>
</body>

</html>