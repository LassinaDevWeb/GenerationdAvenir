<?php
require_once "Model.class.php";
require_once "Note_synthese.class.php";


class Note_syntheseManager extends Model
{

    private $note_syntheses;

    public function ajoutNote_synthese($note_synthese)
    {

        $this->note_syntheses[] = $note_synthese;
    }

    public function getNote_synthese()
    {
        return $this->note_syntheses;
    }

    public function chargementNote_synthese()
    {

        $sql = $this->getBdd()->prepare("SELECT id,titre,date_publication,note,image_principal,image_note FROM  NOTE_SYNTHESES ORDER BY date_publication DESC");
        $sql->execute();
        $mesNote_syntheses = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesNote_syntheses as $note_synthese) {
            $note_synthese = new Note_syntheses($note_synthese['id'], $note_synthese['titre'], $note_synthese['date_publication'], $note_synthese['note'], $note_synthese['image_principal'], $note_synthese['image_note']);
            $this->ajoutNote_synthese($note_synthese);
        }
    }

    public function ajoutNote_syntheseBD($titre, $date_publication, $note, $image_principal, $image_note)
    {

        $sql = '
        INSERT INTO NOTE_SYNTHESES (titre,date_publication,note,image_principal,image_note)
        VALUES (:TITRE,:DATE_PUBLICATION,:NOTE,:IMAGE_PRINCIPAL,:IMAGE_NOTE)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":TITRE", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_PUBLICATION", $date_publication, PDO::PARAM_STR);
        $stmt->bindValue(":NOTE", $note, PDO::PARAM_STR);
        $stmt->bindValue(":IMAGE_PRINCIPAL", $image_principal, PDO::PARAM_STR);
        $stmt->bindValue(":IMAGE_NOTE", $image_note, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $note_synthese = new Note_syntheses($this->getBdd()->lastInsertId(), $titre, $date_publication, $note, $image_principal, $image_note);
            $this->ajoutNote_synthese($note_synthese);
        }
    }

    public function getNote_syntheseBytitle($titre)
    {
        for ($i = 0; $i < count($this->note_syntheses); $i++) {
            if ($this->note_syntheses[$i]->getTitre() === $titre) {
                return $this->note_syntheses[$i];
            }
        }
    }

    public function getNote_syntheseById($id)
    {
        for ($i = 0; $i < count($this->note_syntheses); $i++) {
            if ($this->note_syntheses[$i]->getId() === $id) {
                return $this->note_syntheses[$i];
            }
        }
    }

    public function suppressionNote_syntheseBD($id)
    {
        $sql = '
        DELETE FROM NOTE_SYNTHESES WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $note_synthese = $this->getNote_syntheseById($id);
            unset($note_synthese);
        }
    }

    public function modificationNote_syntheseBD($id, $titre, $date_publication, $note)
    {
        $sql = '
        UPDATE NOTE_SYNTHESES
        SET TITRE=:TITRE,DATE_PUBLICATION=:DATE_PUBLICATION,NOTE=:NOTE
        WHERE ID=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":TITRE", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_PUBLICATION", $date_publication, PDO::PARAM_STR);
        $stmt->bindValue(":NOTE", $note, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $this->getNote_syntheseById($id)->setTitre($titre);
            $this->getNote_syntheseById($id)->setDate_publication($date_publication);
            $this->getNote_syntheseById($id)->setNote($note);
        }
    }



    public function modificationPhotoNote_synthese($id, $photo)
    {
        $sql = ' UPDATE NOTE_SYNTHESES
        SET IMAGE_PRINCIPAL=:IMAGE_PRINCIPAL
        WHERE ID=:ID';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":IMAGE_PRINCIPAL", $photo, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }


    public function modificationPhoto_secondaire_Note_synthese($id, $photo_secondaire)
    {
        $sql = ' UPDATE NOTE_SYNTHESES
        SET IMAGE_NOTE=:IMAGE_NOTE
        WHERE ID=:ID';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":IMAGE_NOTE", $photo_secondaire, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
