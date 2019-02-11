<?php

class AssociationsController {
    public function index() {

        $associations = Association::findAll();
        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicule::findAll();

        view('associations.index', compact('associations', 'conducteurs', 'vehicules'));
    }

    public function add() {
    }

    public function show($id) {

        $association = Association::findOne($id);
        view('associations.show', compact('association'));

    }

    public function delete($id) {
    }

    public function save() {
    }
}