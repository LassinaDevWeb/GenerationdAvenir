<?php
class Admin
{
    private $id;
    private $nom;
    private $prenom;
    private $identifiant;
    private $password;

    private $membre_actif;
    private $soutien;
    private $rapport_ecrit;
    private $annee_travaux;
    public static $admins;

    public function __construct($id, $nom, $prenom, $identifiant, $password, $membre_actif, $soutien, $rapport_ecrit, $annee_travaux)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->identifiant = $identifiant;
        $this->password = $password;
        $this->membre_actif = $membre_actif;
        $this->soutien = $soutien;
        $this->rapport_ecrit = $rapport_ecrit;
        $this->annee_travaux = $annee_travaux;
        self::$admins[] = $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        return $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        return $this->prenom = $prenom;
    }

    public function getIdentifiant()
    {
        return $this->identifiant;
    }
    public function setIdentifiant($identifiant)
    {
        return $this->identifiant = $identifiant;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        return $this->password = $password;
    }


    public function getMembre_actif()
    {
        return $this->membre_actif;
    }
    public function setMembre_actif($membre_actif)
    {
        return $this->membre_actif = $membre_actif;
    }



    public function getSoutien()
    {
        return $this->soutien;
    }
    public function setSoutien($soutien)
    {
        return $this->soutien = $soutien;
    }



    public function getRapport_ecrit()
    {
        return $this->rapport_ecrit;
    }
    public function setRapport_ecrit($rapport_ecrit)
    {
        return $this->rapport_ecrit = $rapport_ecrit;
    }



    public function getAnnee_travaux()
    {
        return $this->annee_travaux;
    }
    public function setAnnee_travaux($annee_travaux)
    {
        return $this->annee_travaux = $annee_travaux;
    }
}
