<?php

class Conducteur extends Db {

    protected $id_conducteur;
    protected $prenom;
    protected $nom;

    public function __construct(string $prenom, string $nom, int $id_conducteur = null) {

        $this->setIdConducteur($id_conducteur);
        $this->setPrenom($prenom);
        $this->setNom($nom);

    }

    public function idConducteur() { return $this->id_conducteur; }
    public function prenom() { return $this->prenom; }
    public function nom() { return $this->nom; }

    public function setIdConducteur($id_conducteur) { 
        $this->id_conducteur = $id_conducteur;
        return $this;
    }

    public function setPrenom($prenom) { 
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom) { 
        $this->nom = $nom;
        return $this;
    }
}