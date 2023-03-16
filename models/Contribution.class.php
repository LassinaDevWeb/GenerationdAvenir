<?php
class Contributions
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $date_naissance;
    private $activite;
    private $responsabilite;
    private $theme;
    private $niveau_action;
    private $constat;
    private $proposition;
    private $mise_en_place;
    private $juridique;
    private $budgetaire;
    private $impact_social;
    private $impact_environnement;
    private $application;
    private $fichier;
    public static $contributions;

    public function __construct($id, $nom, $prenom, $email, $date_naissance, $activite, $responsabilite, $theme, $niveau_action, $constat, $proposition, $mise_en_place, $juridique, $budgetaire, $impact_social, $impact_environnement, $application, $fichier)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->date_naissance = $date_naissance;
        $this->activite = $activite;
        $this->responsabilite = $responsabilite;
        $this->theme = $theme;
        $this->niveau_action = $niveau_action;
        $this->constat = $constat;
        $this->proposition = $proposition;
        $this->mise_en_place = $mise_en_place;
        $this->juridique = $juridique;
        $this->budgetaire = $budgetaire;
        $this->impact_social = $impact_social;
        $this->impact_environnement = $impact_environnement;
        $this->application = $application;
        $this->fichier = $fichier;
        self::$contributions[] = $this;
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

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getDate_naissance()
    {
        return $this->date_naissance;
    }
    public function setDate_naissance($date_naissance)
    {
        return $this->date_naissance = $date_naissance;
    }

    public function getActivite()
    {
        return $this->activite;
    }
    public function setActivite($activite)
    {
        return $this->activite = $activite;
    }

    public function getResponsabilite()
    {
        return $this->responsabilite;
    }
    public function setResponsabilite($responsabilite)
    {
        return $this->responsabilite = $responsabilite;
    }

    public function getTheme()
    {
        return $this->theme;
    }
    public function setTheme($theme)
    {
        return $this->theme = $theme;
    }
    public function getNiveau_action()
    {
        return $this->niveau_action;
    }
    public function setNiveau_action($niveau_action)
    {
        return $this->niveau_action = $niveau_action;
    }
    public function getConstat()
    {
        return $this->constat;
    }
    public function setConstat($constat)
    {
        return $this->constat = $constat;
    }

    public function getProposition()
    {
        return $this->proposition;
    }
    public function setProposition($proposition)
    {
        return $this->proposition = $proposition;
    }

    public function getMise_en_place()
    {
        return $this->mise_en_place;
    }
    public function setMise_en_place($mise_en_place)
    {
        return $this->mise_en_place = $mise_en_place;
    }

    public function getJuridique()
    {
        return $this->juridique;
    }
    public function setJuridique($juridique)
    {
        return $this->juridique = $juridique;
    }

    public function getBudgetaire()
    {
        return $this->budgetaire;
    }
    public function setBudgetaire($budgetaire)
    {
        return $this->budgetaire = $budgetaire;
    }

    public function getImpact_social()
    {
        return $this->impact_social;
    }
    public function setImpact_social($impact_social)
    {
        return $this->impact_social = $impact_social;
    }

    public function getImpact_environnement()
    {
        return $this->impact_environnement;
    }
    public function setImpact_environnement($impact_environnement)
    {
        return $this->impact_environnement = $impact_environnement;
    }

    public function getApplication()
    {
        return $this->application;
    }
    public function setApplication($application)
    {
        return $this->application = $application;
    }

    public function getFichier()
    {
        return $this->fichier;
    }
    public function setFichier($fichier)
    {
        return $this->fichier = $fichier;
    }
}
