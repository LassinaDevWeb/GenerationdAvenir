<?php
require_once "Model.class.php";
require_once "Video.class.php";


class VideoManager extends Model
{

    private $videos;

    public function ajoutVideo($video)
    {

        $this->videos[] = $video;
    }

    public function getVideo()
    {
        return $this->videos;
    }

    public function chargementVideo()
    {

        $sql = $this->getBdd()->prepare("SELECT id,titre,date_publication,description,lien,photo FROM  VIDEO ORDER BY date_publication DESC");
        $sql->execute();
        $mesVideos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesVideos as $video) {
            $video = new Videos($video['id'], $video['titre'], $video['date_publication'], $video['description'], $video['lien'], $video['photo']);
            $this->ajoutVideo($video);
        }
    }

    public function ajoutVideoBD($titre, $date_publication, $description, $lien, $photo)
    {

        $sql = '
        INSERT INTO VIDEO (titre,date_publication,description,lien,photo)
        VALUES (:TITRE,:DATE_PUBLICATION,:DESCRIPTION,:LIEN,:PHOTO)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":TITRE", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_PUBLICATION", $date_publication, PDO::PARAM_STR);
        $stmt->bindValue(":DESCRIPTION", $description, PDO::PARAM_STR);
        $stmt->bindValue(":LIEN", $lien, PDO::PARAM_STR);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $video = new Videos($this->getBdd()->lastInsertId(), $titre, $date_publication, $description, $lien, $photo);
            $this->ajoutVideo($video);
        }
    }

    public function getVideoBytitle($titre)
    {
        for ($i = 0; $i < count($this->videos); $i++) {
            if ($this->videos[$i]->getTitre() === $titre) {
                return $this->videos[$i];
            }
        }
    }

    public function getVideoById($id)
    {
        for ($i = 0; $i < count($this->videos); $i++) {
            if ($this->videos[$i]->getId() === $id) {
                return $this->videos[$i];
            }
        }
    }

    public function suppressionVideoBD($id)
    {
        $sql = '
        DELETE FROM VIDEO WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $video = $this->getVideoById($id);
            unset($video);
        }
    }

    public function modificationVideoBD($id, $titre, $date_publication, $description, $lien)
    {
        $sql = '
        UPDATE VIDEO
        SET TITRE=:TITRE,DATE_PUBLICATION=:DATE_PUBLICATION,DESCRIPTION=:DESCRIPTION,LIEN=:LIEN
        WHERE ID=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":TITRE", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_PUBLICATION", $date_publication, PDO::PARAM_STR);
        $stmt->bindValue(":DESCRIPTION", $description, PDO::PARAM_STR);
        $stmt->bindValue(":LIEN", $lien, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $this->getVideoById($id)->setTitre($titre);
            $this->getVideoById($id)->setDate_publication($date_publication);
            $this->getVideoById($id)->setDescription($description);
            $this->getVideoById($id)->setLien($lien);
        }
    }

    public function modificationPhotoVideo($id, $photo)
    {
        $sql = ' UPDATE VIDEO
        SET PHOTO=:PHOTO
        WHERE ID=:ID';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
