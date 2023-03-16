<?php ob_start(); ?>

<div class="bg-title text-center">
    <h1 class="pt-5 pb-5 titre-article"><b>Podcasts</b></h1>
</div>
<div class="row mt-5">
    <div class="col-md-6 col-lg-6 col-sm-12 text-right">
        <img src="../public/images/podcast/img_pod.jpg" alt="generationdavenir.fr" class="mb-3 img_podcast img-fluid">
        <img src="../public/images/podcast/microphone.jpg" alt="generationdavenir.fr" class="img_podcast img-fluid">
    </div>

    <div class="col-md-6 col-lg-6 col-sm-12 text-left">
        <h3 class="titre_podcast">PARLEMEN'TER</h3>
        <p class="text_podcast mt-5"><b>Parlemen’ter est un podcast hebdomadaire crée en 2019, entièrement dédié au décrytpage de l’actualité du Parlement français. Notre objectif est de vulgariser les complexités du milieu parlementaire à travers un médium au format ludique et pédagogique. Par Arnaud Giros et Elliot Eloire.</b></p>
        <iframe width="70%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/808200901&color=%2325173a&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
        <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/user-399929031" title="Parlemen&#x27;ter" target="_blank" style="color: #cccccc; text-decoration: none;">Parlemen&#x27;ter</a> · <a href="https://soundcloud.com/user-399929031/episode-4-benedicte-peyrol-revient-sur-la-loi-de-finances-rectificative-2" title="Épisode 4 - La députée Bénédicte Peyrol (LREM) revient sur la loi de finances rectificative 2" target="_blank" style="color: #cccccc; text-decoration: none;">Épisode 4 - La députée Bénédicte Peyrol (LREM) revient sur la loi de finances rectificative 2</a></div>
    </div>
</div>
<br>
<br>

<div class="row bg-title pt-5 pb-5">
    <div class="col-md-6 col-lg-6 col-sm-12 p_podcast">
        <h3 class="titre_podcast mb-5">POLITI'TALK</h3>
        <p class="text_podcast_second"><b>La première émission politique consacrée entièrement à la jeunesse. Tous les quinze jours, Léa Chamboncel, Martin Arnal, et leurs chroniqueurs donnent rendez-vous à une personnalité politique, pour dresser son portrait, ainsi que ses domaines d’actions.
            </b></p>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/6UYL01YEpFE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="col-md-6 col-lg-6 col-sm-12 text-left">
        <img src="../public/images/podcast/polititalk.jpg" class="img-fluid" alt="generationdavenir.fr">
    </div>
</div>


<?php
$content = ob_get_clean();
$titre = "Liste podcast";
require "template.view.php";
?>