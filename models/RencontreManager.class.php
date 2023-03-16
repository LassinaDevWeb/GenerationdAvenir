<?php
require_once "Model.class.php";
require_once "Rencontre.class.php";


class RencontreManager extends Model
{

    private $rencontres;

    public function ajoutRencontre($rencontre)
    {

        $this->rencontres[] = $rencontre;
    }

    public function getRencontre()
    {
        return $this->rencontres;
    }

    public function chargementRencontre()
    {

        $sql = $this->getBdd()->prepare("SELECT id,nom,role,description,photo FROM RENCONTRES");
        $sql->execute();
        $mesRencontres = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesRencontres as $rencontre) {
            $rencontre = new Rencontre($rencontre['id'], $rencontre['nom'], $rencontre['role'], $rencontre['description'], $rencontre['photo']);
            $this->ajoutRencontre($rencontre);
        }
    }


    public function getRencontreById($id)
    {
        for ($i = 0; $i < count($this->rencontres); $i++) {
            if ($this->rencontres[$i]->getId() === $id) {
                return $this->rencontres[$i];
            }
        }
    }

    public function getRencontreByname($nom)
    {
        for ($i = 0; $i < count($this->rencontres); $i++) {
            if ($this->rencontres[$i]->getNom() === $nom) {
                return $this->rencontres[$i];
            }
        }
    }
    public function ajoutRencontreBD($nom, $role, $description, $photo)
    {

        $sql = '
        INSERT INTO RENCONTRES (nom,role,description,photo)
        VALUES (:NOM,:ROLE,:DESCRIPTION,:PHOTO)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":NOM", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":ROLE", $role, PDO::PARAM_STR);
        $stmt->bindValue(":DESCRIPTION", $description, PDO::PARAM_STR);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $rencontre = new Rencontre($this->getBdd()->lastInsertId(), $nom, $role, $description, $photo);
            $this->ajoutRencontre($rencontre);
        }
    }

    public function suppressionRencontreBD($id)
    {
        $sql = '
        DELETE FROM RENCONTRES WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $rencontre = $this->getRencontreById($id);
            unset($rencontre);
        }
    }

    public function modificationRencontreBD($id, $nom, $role, $description)
    {
        $sql = '
        UPDATE RENCONTRES
        SET NOM=:NOM,ROLE=:ROLE,DESCRIPTION=:DESCRIPTION
        WHERE ID=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":NOM", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":ROLE", $role, PDO::PARAM_STR);
        $stmt->bindValue(":DESCRIPTION", $description, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $this->getRencontreById($id)->setNom($nom);
            $this->getRencontreById($id)->setRole($role);
            $this->getRencontreById($id)->setDescription($description);
        }
    }

    public function modificationPhotoRencontre($id, $photo)
    {
        $sql = ' UPDATE RENCONTRES
        SET PHOTO=:PHOTO
        WHERE ID=:ID';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
