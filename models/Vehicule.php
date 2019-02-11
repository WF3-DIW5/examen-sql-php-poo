<?php

class Vehicule extends Db {

    protected $id_vehicule;
    protected $marque;
    protected $modele;
    protected $couleur;
    protected $immatriculation;

    public function __construct(string $marque, string $modele, string $couleur, string $immatriculation, int $id_vehicule = null) {

        $this->setIdVehicule($id_vehicule);
        $this->setMarque($marque);
        $this->setModele($modele);
        $this->setCouleur($couleur);
        $this->setImmatriculation($immatriculation);

    }

    public function idVehicule() { return $this->id_vehicule; }
    public function marque() { return $this->marque; }
    public function modele() { return $this->modele; }
    public function couleur() { return $this->couleur; }
    public function immatriculation() { return $this->immatriculation; }


    public function setIdVehicule($id_vehicule) {
        $this->id_vehicule = $id_vehicule;
        return $this;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
        return $this;
    }

    public function setModele($modele) {
        $this->modele = $modele;
        return $this;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
        return $this;
    }

    public function setImmatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;
        return $this;
    }

}
