<?php
require_once "Model.class.php";
require_once "Rejoindre.class.php";


class RejoindreManager extends Model
{

    private $rejoindres;

    public function ajoutRejoindre($rejoindre)
    {

        $this->rejoindres[] = $rejoindre;
    }

    public function getRejoindre()
    {
        return $this->rejoindres;
    }

    public function chargementRejoindre()
    {

        $sql = $this->getBdd()->prepare("SELECT id,nom,prenom,date_naissance,email,telephone,niveau_etude,lettre_motivation,domaine FROM REJOINDRE");
        $sql->execute();
        $mesRejoindres = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesRejoindres as $rejoindre) {
            $rejoindre = new Rejoindre($rejoindre['id'], $rejoindre['nom'], $rejoindre['prenom'], $rejoindre['date_naissance'], $rejoindre['email'], $rejoindre['telephone'], $rejoindre['niveau_etude'], $rejoindre['lettre_motivation'], $rejoindre['domaine']);
            $this->ajoutRejoindre($rejoindre);
        }
    }


    public function getRejoindreById($id)
    {
        for ($i = 0; $i < count($this->rejoindres); $i++) {
            if ($this->rejoindres[$i]->getId() === $id) {
                return $this->rejoindres[$i];
            }
        }
    }

    public function getRejoindreByemail($email)
    {
        for ($i = 0; $i < count($this->rejoindres); $i++) {
            if ($this->rejoindres[$i]->getEmail() === $email) {
                return $this->rejoindres[$i];
            }
        }
    }
    public function ajoutRejoindreBD($nom, $prenom, $date_naissance, $email, $telephone, $niveau_etude, $lettre_motivation, $domaine)
    {

        $sql = '
        INSERT INTO REJOINDRE (nom,prenom,date_naissance,email,telephone,niveau_etude,lettre_motivation,domaine)
        VALUES (:NOM,:PRENOM,:DATE_NAISSANCE,:EMAIL,:TELEPHONE,:NIVEAU_ETUDE,:LETTRE_MOTIVATION,:DOMAINE)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":NOM", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":PRENOM", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_NAISSANCE", $date_naissance, PDO::PARAM_STR);
        $stmt->bindValue(":EMAIL", $email, PDO::PARAM_STR);
        $stmt->bindValue(":TELEPHONE", $telephone, PDO::PARAM_STR);
        $stmt->bindValue(":NIVEAU_ETUDE", $niveau_etude, PDO::PARAM_STR);
        $stmt->bindValue(":LETTRE_MOTIVATION", $lettre_motivation, PDO::PARAM_STR);
        $stmt->bindValue(":DOMAINE", $domaine, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $rejoindre = new Rejoindre($this->getBdd()->lastInsertId(), $nom, $prenom, $date_naissance, $email, $telephone, $niveau_etude, $lettre_motivation, $domaine);
            $this->ajoutRejoindre($rejoindre);
        }
    }

    public function suppressionRejoindreBD($id)
    {
        $sql = '
        DELETE FROM REJOINDRE WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $rejoindre = $this->getRejoindreById($id);
            unset($rejoindre);
        }
    }
}
