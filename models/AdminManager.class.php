<?php
require_once "Model.class.php";
require_once "Admin.class.php";


class AdminManager extends Model
{

    private $admins;

    public function ajoutAdmin($admin)
    {

        $this->admins[] = $admin;
    }

    public function getAdmin()
    {
        return $this->admins;
    }

    public function chargementAdmin()
    {

        $sql = $this->getBdd()->prepare("SELECT id,nom,prenom,identifiant,password,membre_actif,soutien,rapport_ecrit,annee_travaux FROM ADMIN");
        $sql->execute();
        $mesAdmins = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();
        foreach ($mesAdmins as $admin) {
            $admin = new Admin($admin['id'], $admin['nom'], $admin['prenom'], $admin['identifiant'], $admin['password'], $admin['membre_actif'], $admin['soutien'], $admin['rapport_ecrit'], $admin['annee_travaux']);
            $this->ajoutAdmin($admin);
        }
    }



    public function getAdminByIdentifiantandpassword($identifiant, $password)
    {
        for ($i = 0; $i < count($this->admins); $i++) {
            if ($this->admins[$i]->getIdentifiant() === $identifiant) {
                if (password_verify($password, $this->admins[$i]->getPassword())) {
                    return true;
                } else {
                    echo $password;
                    echo nl2br("\n");
                    echo  $this->admins[$i]->getPassword();
                    echo nl2br("\n");
                    echo password_hash($password, PASSWORD_DEFAULT);
                }
            }
        }
    }

    public function getNameByAdmin($identifiant)
    {
        for ($i = 0; $i < count($this->admins); $i++) {
            if ($this->admins[$i]->getIdentifiant() === $identifiant) {
                return $this->admins[$i]->getPrenom();
            }
        }
    }


    public function getAdminById($id)
    {
        for ($i = 0; $i < count($this->admins); $i++) {
            if ($this->admins[$i]->getId() === $id) {
                return $this->admins[$i];
            }
        }
    }

    public function modificationInformationAdminBD($id, $membre_actif, $soutien, $rapport_ecrit, $annee_travaux)
    {
        $sql = '
        UPDATE ADMIN
        SET MEMBRE_ACTIF=:MEMBRE_ACTIF,SOUTIEN=:SOUTIEN,RAPPORT_ECRIT=:RAPPORT_ECRIT,ANNEE_TRAVAUX=:ANNEE_TRAVAUX
        WHERE ID=:ID
        ';

        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":ID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":MEMBRE_ACTIF", $membre_actif, PDO::PARAM_INT);
        $stmt->bindValue(":SOUTIEN", $soutien, PDO::PARAM_INT);
        $stmt->bindValue(":RAPPORT_ECRIT", $rapport_ecrit, PDO::PARAM_INT);
        $stmt->bindValue(":ANNEE_TRAVAUX", $annee_travaux, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
