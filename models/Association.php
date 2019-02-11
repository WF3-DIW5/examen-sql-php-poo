<?php

class Association extends Db {

    protected $id_association;
    protected $id_vehicule;
    protected $id_conducteur;


    public function __construct(int $id_vehicule, int $id_conducteur, int $id_association = null) {

        $this->setIdAssociation($id_association);
        $this->setIdVehicule($id_vehicule);
        $this->setIdConducteur($id_conducteur);

    }

    public function idAssociation() { return $this->id_association; }
    public function idVehicule() { return $this->id_vehicule; }
    public function idConducteur() { return $this->id_conducteur; }

    public function setIdAssociation($id_association) {
        $this->id_association;
        return $this;
    }

    public function setIdVehicule($id_vehicule) {
        $this->id_vehicule;
        return $this;
    }

    public function setIdConducteur($id_conducteur) {
        $this->id_conducteur;
        return $this;
    }

}