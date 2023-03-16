<?php
require_once "Model.class.php";
require_once "Carte_blanche.class.php";


class Carte_blancheManager extends Model
{

    private $carte_blanches;

    public function ajoutCarteblanche($carte_blanche)
    {

        $this->carte_blanches[] = $carte_blanche;
    }

    public function getCarteblanche()
    {
        return $this->carte_blanches;
    }

    public function chargementCarteblanche()
    {

        $sql = $this->getBdd()->prepare("SELECT id,titre,date_publication,description,constat,objectif,realisation,redacteur_principale,redacteur_secondaire,photo FROM  CARTE_BLANCHES ORDER BY date_publication DESC");
        $sql->execute();
        $mesCarte_blanches = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesCarte_blanches as $carte_blanche) {
            $carte_blanche = new Carte_blanches($carte_blanche['id'], $carte_blanche['titre'], $carte_blanche['date_publication'], $carte_blanche['description'], $carte_blanche['constat'], $carte_blanche['objectif'], $carte_blanche['realisation'], $carte_blanche['redacteur_principale'], $carte_blanche['redacteur_secondaire'], $carte_blanche['photo']);
            $this->ajoutCarteblanche($carte_blanche);
        }
    }

    public function ajoutCarteblancheBD($titre, $date_publication, $description, $constat, $objectif, $realisation, $redacteur_principale, $redacteur_secondaire, $photo)
    {

        $sql = '
        INSERT INTO CARTE_BLANCHES (titre,date_publication,description,constat,objectif,realisation,redacteur_principale,redacteur_secondaire,photo)
        VALUES (:TITRE,:DATE_PUBLICATION,:DESCRIPTION,:CONSTAT,:OBJECTIF,:REALISATION,:REDACTEUR_PRINCIPALE,:REDACTEUR_SECONDAIRE,:PHOTO)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":TITRE", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_PUBLICATION", $date_publication, PDO::PARAM_STR);
        $stmt->bindValue(":DESCRIPTION", $description, PDO::PARAM_STR);
        $stmt->bindValue(":CONSTAT", $constat, PDO::PARAM_STR);
        $stmt->bindValue(":OBJECTIF", $objectif, PDO::PARAM_STR);
        $stmt->bindValue(":REALISATION", $realisation, PDO::PARAM_STR);
        $stmt->bindValue(":REDACTEUR_PRINCIPALE", $redacteur_principale, PDO::PARAM_STR);
        $stmt->bindValue(":REDACTEUR_SECONDAIRE", $redacteur_secondaire, PDO::PARAM_STR);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $carte_blanche = new Carte_blanches($this->getBdd()->lastInsertId(), $titre, $date_publication, $description, $constat, $objectif, $realisation, $redacteur_principale, $redacteur_secondaire, $photo);
            $this->ajoutCarteblanche($carte_blanche);
        }
    }

    public function getCarteblancheBytitle($titre)
    {
        for ($i = 0; $i < count($this->carte_blanches); $i++) {
            if ($this->carte_blanches[$i]->getTitre() === $titre) {
                return $this->carte_blanches[$i];
            }
        }
    }

    public function getCarteblancheById($id)
    {
        for ($i = 0; $i < count($this->carte_blanches); $i++) {
            if ($this->carte_blanches[$i]->getId() === $id) {
                return $this->carte_blanches[$i];
            }
        }
    }

    public function suppressionCarteblancheBD($id)
    {
        $sql = '
        DELETE FROM CARTE_BLANCHES WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $carte_blanche = $this->getCarteblancheById($id);
            unset($carte_blanche);
        }
    }

    public function modificationCarteblancheBD($id, $titre, $date_publication, $description, $constat, $objectif, $realisation, $redacteur_principale, $redacteur_secondaire)
    {
        $sql = '
        UPDATE CARTE_BLANCHES
        SET TITRE=:TITRE,DATE_PUBLICATION=:DATE_PUBLICATION,DESCRIPTION=:DESCRIPTION,CONSTAT=:CONSTAT,OBJECTIF=:OBJECTIF,REALISATION=:REALISATION,REDACTEUR_PRINCIPALE=:REDACTEUR_PRINCIPALE,REDACTEUR_SECONDAIRE=:REDACTEUR_SECONDAIRE
        WHERE ID=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":TITRE", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_PUBLICATION", $date_publication, PDO::PARAM_STR);
        $stmt->bindValue(":DESCRIPTION", $description, PDO::PARAM_STR);
        $stmt->bindValue(":CONSTAT", $constat, PDO::PARAM_STR);
        $stmt->bindValue(":OBJECTIF", $objectif, PDO::PARAM_STR);
        $stmt->bindValue(":REALISATION", $realisation, PDO::PARAM_STR);
        $stmt->bindValue(":REDACTEUR_PRINCIPALE", $redacteur_principale, PDO::PARAM_STR);
        $stmt->bindValue(":REDACTEUR_SECONDAIRE", $redacteur_secondaire, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $this->getCarteblancheById($id)->setTitre($titre);
            $this->getCarteblancheById($id)->setDate_publication($date_publication);
            $this->getCarteblancheById($id)->setDescription($description);
            $this->getCarteblancheById($id)->setConstat($constat);
            $this->getCarteblancheById($id)->setObjectif($objectif);
            $this->getCarteblancheById($id)->setRealisation($realisation);
            $this->getCarteblancheById($id)->setRedacteur_principale($redacteur_principale);
            $this->getCarteblancheById($id)->setRedacteur_secondaire($redacteur_secondaire);
        }
    }

    public function modificationPhotoCarteblanche($id, $photo)
    {
        $sql = ' UPDATE CARTE_BLANCHES
        SET PHOTO=:PHOTO
        WHERE ID=:ID';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
