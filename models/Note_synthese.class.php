<?php
class Note_syntheses
{
    private $id;
    private $titre;
    private $date_publication;
    private $note;
    private $image_principal;
    private $image_note;
    public static $note_syntheses;

    public function __construct($id, $titre, $date_publication, $note, $image_principal, $image_note)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->date_publication = $date_publication;
        $this->note = $note;
        $this->image_principal = $image_principal;
        $this->image_note = $image_note;
        self::$note_syntheses[] = $this;
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

    public function getNote()
    {
        return $this->note;
    }
    public function setNote($note)
    {
        return $this->note = $note;
    }

    public function getImage_principal()
    {
        return $this->image_principal;
    }
    public function setImage_principal($image_principal)
    {
        return $this->image_principal = $image_principal;
    }

    public function getImage_note()
    {
        return $this->image_note;
    }
    public function setImage_note($image_note)
    {
        return $this->image_note = $image_note;
    }
}
