<?php

class Rejoindre
{
    private $id;
    private $nom;
    private $prenom;
    private $date_naissance;
    private $email;
    private $telephone;
    private $niveau_etude;
    private $lettre_motivation;
    private $domaine;
    public static $rejoindres;

    public function __construct($id, $nom, $prenom, $date_naissance, $email, $telephone, $niveau_etude, $lettre_motivation, $domaine)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->niveau_etude = $niveau_etude;
        $this->lettre_motivation = $lettre_motivation;
        $this->domaine = $domaine;
        self::$rejoindres[] = $this;
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

    public function getDate_naissance()
    {
        return $this->date_naissance;
    }
    public function setDate_naissance($date_naissance)
    {
        return $this->date_naissance = $date_naissance;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        return $this->telephone = $telephone;
    }


    public function getNiveau_etude()
    {
        return $this->niveau_etude;
    }
    public function setNiveau_etude($niveau_etude)
    {
        return $this->niveau_etude = $niveau_etude;
    }


    public function getLettre_motivation()
    {
        return $this->lettre_motivation;
    }
    public function setLettre_motivation($lettre_motivation)
    {
        return $this->lettre_motivation = $lettre_motivation;
    }


    public function getDomaine()
    {
        return $this->domaine;
    }
    public function setDomaine($domaine)
    {
        return $this->domaine = $domaine;
    }
}
