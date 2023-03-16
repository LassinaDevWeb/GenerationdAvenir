<?php
class Videos
{
    private $id;
    private $titre;
    private $date_publication;
    private $description;
    private $lien;
    private $photo;
    public static $videos;

    public function __construct($id, $titre, $date_publication, $description, $lien, $photo)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->date_publication = $date_publication;
        $this->description = $description;
        $this->lien = $lien;
        $this->photo = $photo;
        self::$videos[] = $this;
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

    public function getLien()
    {
        return $this->lien;
    }
    public function setLien($lien)
    {
        return $this->lien = $lien;
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
