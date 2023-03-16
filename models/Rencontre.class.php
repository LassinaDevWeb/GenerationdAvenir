<?php
class Rencontre
{
    private $id;
    private $nom;
    private $role;
    private $description;
    private $photo;
    public static $rencontres;

    public function __construct($id, $nom, $role, $description, $photo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->role = $role;
        $this->description = $description;
        $this->photo = $photo;
        self::$rencontres[] = $this;
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

    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        return $this->role = $role;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
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
