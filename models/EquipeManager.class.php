<?php
require_once "Model.class.php";
require_once "Equipe.class.php";


class EquipeManager extends Model
{

    private $equipes;

    public function ajoutEquipe($equipe)
    {

        $this->equipes[] = $equipe;
    }

    public function getEquipe()
    {
        return $this->equipes;
    }

    public function chargementEquipe()
    {

        $sql = $this->getBdd()->prepare("SELECT id,nom,email,reseau_principal,reseau_secondaire,photo,role,section FROM EQUIPE ORDER BY section ");
        $sql->execute();
        $mesEquipes = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesEquipes as $equipe) {
            $equipe = new Equipe($equipe['id'], $equipe['nom'], $equipe['email'], $equipe['reseau_principal'], $equipe['reseau_secondaire'], $equipe['photo'], $equipe['role'], $equipe['section']);
            $this->ajoutEquipe($equipe);
        }
    }


    public function getEquipeById($id)
    {
        for ($i = 0; $i < count($this->equipes); $i++) {
            if ($this->equipes[$i]->getId() === $id) {
                return $this->equipes[$i];
            }
        }
    }

    public function getEquipeByname($nom)
    {
        for ($i = 0; $i < count($this->equipes); $i++) {
            if ($this->equipes[$i]->getNom() === $nom) {
                return $this->equipes[$i];
            }
        }
    }
    public function ajoutEquipeBD($nom, $email, $reseau_principal, $reseau_secondaire, $photo, $role, $section)
    {

        $sql = '
        INSERT INTO EQUIPE (nom,email,reseau_principal,reseau_secondaire,photo,role,section)
        VALUES (:NOM,:EMAIL,:RESEAU_PRINCIPAL,:RESEAU_SECONDAIRE,:PHOTO,:ROLE,:SECTION)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":NOM", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":EMAIL", $email, PDO::PARAM_STR);
        $stmt->bindValue(":RESEAU_PRINCIPAL", $reseau_principal, PDO::PARAM_STR);
        $stmt->bindValue(":RESEAU_SECONDAIRE", $reseau_secondaire, PDO::PARAM_STR);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $stmt->bindValue(":ROLE", $role, PDO::PARAM_STR);
        $stmt->bindValue(":SECTION", $section, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $equipe = new Equipe($this->getBdd()->lastInsertId(), $nom, $email, $reseau_principal, $reseau_secondaire, $photo, $role, $section);
            $this->ajoutEquipe($equipe);
        }
    }

    public function suppressionEquipeBD($id)
    {
        $sql = '
        DELETE FROM EQUIPE WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $rencontre = $this->getEquipeById($id);
            unset($rencontre);
        }
    }

    public function modificationEquipeBD($id, $nom, $email, $reseau_principal, $reseau_secondaire, $role, $section)
    {
        $sql = '
        UPDATE EQUIPE
        SET NOM=:NOM,EMAIL=:EMAIL,RESEAU_PRINCIPAL=:RESEAU_PRINCIPAL,RESEAU_SECONDAIRE=:RESEAU_SECONDAIRE,ROLE=:ROLE,SECTION=:SECTION
        WHERE ID=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":NOM", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":EMAIL", $email, PDO::PARAM_STR);
        $stmt->bindValue(":RESEAU_PRINCIPAL", $reseau_principal, PDO::PARAM_STR);
        $stmt->bindValue(":RESEAU_SECONDAIRE", $reseau_secondaire, PDO::PARAM_STR);
        $stmt->bindValue(":ROLE", $role, PDO::PARAM_STR);
        $stmt->bindValue(":SECTION", $section, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $this->getEquipeById($id)->setNom($nom);
            $this->getEquipeById($id)->setEmail($email);
            $this->getEquipeById($id)->setReseau_principal($reseau_principal);
            $this->getEquipeById($id)->setReseau_secondaire($reseau_secondaire);
            $this->getEquipeById($id)->setRole($role);
            $this->getEquipeById($id)->setSection($section);
        }
    }

    public function modificationPhotoEquipe($id, $photo)
    {
        $sql = ' UPDATE EQUIPE
        SET PHOTO=:PHOTO
        WHERE ID=:ID';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":PHOTO", $photo, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
