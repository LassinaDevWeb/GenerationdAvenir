<?php
class Equipe
{
    private $id;
    private $nom;
    private $email;
    private $reseau_principal;
    private $reseau_secondaire;
    private $photo;
    private $role;
    private $section;
    public static $equipes;

    public function __construct($id, $nom, $email, $reseau_principal, $reseau_secondaire, $photo, $role, $section)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->reseau_principal = $reseau_principal;
        $this->reseau_secondaire = $reseau_secondaire;
        $this->photo = $photo;
        $this->role = $role;
        $this->section = $section;
        self::$equipes[] = $this;
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

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getReseau_principal()
    {
        return $this->reseau_principal;
    }
    public function setReseau_principal($reseau_principal)
    {
        return $this->reseau_principal = $reseau_principal;
    }

    public function getReseau_secondaire()
    {
        return $this->reseau_secondaire;
    }
    public function setReseau_secondaire($reseau_secondaire)
    {
        return $this->reseau_secondaire = $reseau_secondaire;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        return $this->photo = $photo;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        return $this->role = $role;
    }

    public function getSection()
    {
        return $this->section;
    }
    public function setSection($section)
    {
        return $this->section = $section;
    }
}
