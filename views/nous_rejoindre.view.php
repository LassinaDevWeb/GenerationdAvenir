<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Nous rejoindre</b></h1>
</div>



<form action="publi_rejoindre" method="POST" enctype="multipart/form-data">
    <div class="row mr-5 ml-5">

        <div class="form-group col-6">
            <label class="text-secondary font-weight-bold font-italic" for="nom">Nom</label>
            <input type="text" name="nom" class="form-control input" id="nom" required>
        </div>

        <div class="form-group col-6">
            <label class="text-secondary font-weight-bold font-italic" for="prenom">Prenom </label>
            <input type="text" name="prenom" class="form-control input" id="prenom" required>
        </div>

        <div class="form-group col-7">
            <label class="text-secondary font-weight-bold font-italic" for="titre">Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control input" id="date_naissance">
        </div>

        <div class="form-group col-6">
            <label class="text-secondary font-weight-bold font-italic" for="email">Email*</label>
            <input type="email" name="email" class="form-control input" id="email" required>
        </div>

        <div class="form-group col-6">
            <label class="text-secondary font-weight-bold font-italic" for="telephone">Telephone</label>
            <input type="text" name="telephone" class="form-control input" id="telephone" required>
        </div>

        <div class="form-group col-12">
            <label class="text-secondary font-weight-bold font-italic " for="niveau_etude">Niveau d'étude</label>
            <br>
            <select class="form-control" name="niveau_etude" id="niveau_etude" required>
                <option selected value="Secondaire">Secondaire</option>
                <option value="Diplôme d'études secondaires">Diplôme d'études secondaires</option>
                <option value="Bachelier(e)">Bachelier(e)</option>
                <option value="Diplôme d'étude supérieures ou diplôme proféssionel">Diplôme d'étude supérieures ou diplôme proféssionel</option>
                <option value="Collège/CÉGEP">Collège/CÉGEP</option>
                <option value="Autre">Autre</option>
                <option value="Autre">Préfère ne pas répondre</option>
            </select>
        </div>
        <br>



        <div class="form-group col-12">
            <label class="text-secondary font-weight-bold font-italic" for="domaine">Domaine</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Culture" checked>Culture
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Relations Internationales">Relations Internationales
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Environnement">Environnement
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Numérique">Numérique
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Audiovisuel">Audiovisuel
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Sport">Sport
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Justice">Justice
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Agriculture">Agriculture
                </label>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Santé">Santé
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="domaine[]" id="domaine" value="Économie">Économie
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group col-12 mt-5">
            <input type="file" class="custom-file-input input" name="fichier" id="fichier" required>
            <label class="custom-file-label" for="fichier">Lettre de motivation</label>

            <div class="container">
                <button type="submit" value="button" id="submit" class="btn btn-secondary btn-lg btn-block mt-3">Envoyer</button>
            </div>
        </div>

</form>



<?php
$content = ob_get_clean();
$titre = "Nous rejoindre";
require "template.view.php";
?>