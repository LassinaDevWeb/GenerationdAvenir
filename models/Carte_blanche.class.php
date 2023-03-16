<?php
class Carte_blanches
{
    private $id;
    private $titre;
    private $date_publication;
    private $description;
    private $constat;
    private $objectif;
    private $realisation;
    private $redacteur_principale;
    private $redacteur_secondaire;
    private $photo;
    public static $carte_blanches;

    public function __construct($id, $titre, $date_publication, $description, $constat, $objectif, $realisation, $redacteur_principale, $redacteur_secondaire, $photo)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->date_publication = $date_publication;
        $this->description = $description;
        $this->constat = $constat;
        $this->objectif = $objectif;
        $this->realisation = $realisation;
        $this->redacteur_principale = $redacteur_principale;
        $this->redacteur_secondaire = $redacteur_secondaire;
        $this->photo = $photo;
        self::$carte_blanches[] = $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        return $this->titre = $titre;
    }

    public function getDate_publication()
    {
        return $this->date_publication;
    }
    public function setDate_publication($date_publication)
    {
        return $this->date_publication = $date_publication;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
    }

    public function getConstat()
    {
        return $this->constat;
    }
    public function setConstat($constat)
    {
        return $this->constat = $constat;
    }

    public function getObjectif()
    {
        return $this->objectif;
    }
    public function setObjectif($objectif)
    {
        return $this->objectif = $objectif;
    }

    public function getRealisation()
    {
        return $this->realisation;
    }
    public function setRealisation($realisation)
    {
        return $this->realisation = $realisation;
    }

    public function getRedacteur_principale()
    {
        return $this->redacteur_principale;
    }
    public function setRedacteur_principale($redacteur_principale)
    {
        return $this->redacteur_principale = $redacteur_principale;
    }
    public function getRedacteur_secondaire()
    {
        return $this->redacteur_secondaire;
    }
    public function setRedacteur_secondaire($redacteur_secondaire)
    {
        return $this->redacteur_secondaire = $redacteur_secondaire;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        return $this->photo = $photo;
    }
}
