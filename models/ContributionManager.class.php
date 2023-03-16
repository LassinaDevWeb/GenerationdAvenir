<?php
require_once "Model.class.php";
require_once "Contribution.class.php";


class ContributionManager extends Model
{

    private $contributions;

    public function ajoutContribution($contribution)
    {

        $this->contributions[] = $contribution;
    }

    public function getContribution()
    {
        return $this->contributions;
    }

    public function chargementContribution()
    {

        $sql = $this->getBdd()->prepare("SELECT id,nom,prenom,email,date_naissance,activite,responsabilite,theme,niveau_action,constat,proposition,mise_en_place,juridique,budgetaire,impact_social,impact_environnement,application,fichier FROM CONTRIBUTION");
        $sql->execute();
        $mesContributions = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesContributions as $contribution) {
            $contribution = new Contributions($contribution['id'], $contribution['nom'], $contribution['prenom'], $contribution['email'], $contribution['date_naissance'], $contribution['activite'], $contribution['responsabilite'], $contribution['theme'], $contribution['niveau_action'], $contribution['constat'], $contribution['proposition'], $contribution['mise_en_place'], $contribution['juridique'], $contribution['budgetaire'], $contribution['impact_social'], $contribution['impact_environnement'], $contribution['application'], $contribution['fichier']);
            $this->ajoutContribution($contribution);
        }
    }


    public function getContributionById($id)
    {
        for ($i = 0; $i < count($this->contributions); $i++) {
            if ($this->contributions[$i]->getId() === $id) {
                return $this->contributions[$i];
            }
        }
    }

    public function getContributionByemail($email)
    {
        for ($i = 0; $i < count($this->contributions); $i++) {
            if ($this->contributions[$i]->getEmail() === $email) {
                return $this->contributions[$i];
            }
        }
    }
    public function ajoutContributionBD($nom, $prenom, $email, $date_naissance, $activite, $responsabilite, $theme, $niveau_action, $constat, $proposition, $mise_en_place, $juridique, $budgetaire, $impact_social, $impact_environnement, $application, $fichier)
    {

        $sql = '
        INSERT INTO CONTRIBUTION (nom,prenom,email,date_naissance,activite,responsabilite,theme,niveau_action,constat,proposition,mise_en_place,juridique,budgetaire,impact_social,impact_environnement,application,fichier)
        VALUES (:NOM,:PRENOM,:EMAIL,:DATE_NAISSANCE,:ACTIVITE,:RESPONSABILITE,:THEME,:NIVEAU_ACTION,:CONSTAT,:PROPOSITION,:MISE_EN_PLACE,:JURIDIQUE,:BUDGETAIRE,:IMPACT_SOCIAL,:IMPACT_ENVIRONNEMENT,:APPLICATION,:FICHIER)
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":NOM", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":PRENOM", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":EMAIL", $email, PDO::PARAM_STR);
        $stmt->bindValue(":DATE_NAISSANCE", $date_naissance, PDO::PARAM_STR);
        $stmt->bindValue(":ACTIVITE", $activite, PDO::PARAM_STR);
        $stmt->bindValue(":RESPONSABILITE", $responsabilite, PDO::PARAM_STR);
        $stmt->bindValue(":THEME", $theme, PDO::PARAM_STR);
        $stmt->bindValue(":NIVEAU_ACTION", $niveau_action, PDO::PARAM_STR);
        $stmt->bindValue(":CONSTAT", $constat, PDO::PARAM_STR);
        $stmt->bindValue(":PROPOSITION", $proposition, PDO::PARAM_STR);
        $stmt->bindValue(":MISE_EN_PLACE", $mise_en_place, PDO::PARAM_STR);
        $stmt->bindValue(":JURIDIQUE", $juridique, PDO::PARAM_STR);
        $stmt->bindValue(":BUDGETAIRE", $budgetaire, PDO::PARAM_STR);
        $stmt->bindValue(":IMPACT_SOCIAL", $impact_social, PDO::PARAM_STR);
        $stmt->bindValue(":IMPACT_ENVIRONNEMENT", $impact_environnement, PDO::PARAM_STR);
        $stmt->bindValue(":APPLICATION", $application, PDO::PARAM_STR);
        $stmt->bindValue(":FICHIER", $fichier, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $contribution = new Contributions($this->getBdd()->lastInsertId(), $nom, $prenom, $email, $date_naissance, $activite, $responsabilite, $theme, $niveau_action, $constat, $proposition, $mise_en_place, $juridique, $budgetaire, $impact_social, $impact_environnement, $application, $fichier);
            $this->ajoutContribution($contribution);
        }
    }

    public function suppressionContributionBD($id)
    {
        $sql = '
        DELETE FROM CONTRIBUTION WHERE id=:ID
        ';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $rejoindre = $this->getContributionById($id);
            unset($rejoindre);
        }
    }
}
