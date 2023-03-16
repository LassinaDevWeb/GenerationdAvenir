<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Rapports</b></h1>
</div>
<?php if (!empty($_SESSION['prenom'])) {
    // Affichage d'un menu si un utilisateur est connecté 
?>
    <a href="create_rapport" class="btn btn-outline-dark float-right mr-2 "><b><i>ajouter un rapport</i></b></a>
<?php
}
?>





<?php
$content = ob_get_clean();
$titre = "Liste rapport";
require "template.view.php";
?>