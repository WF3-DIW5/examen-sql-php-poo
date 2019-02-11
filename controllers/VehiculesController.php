<?php

class VehiculesController {
    public function index() {

        $vehicules = Vehicule::findAll();
        var_dump($vehicules);

    }

    public function add() {
    }

    public function show($id) {

        $vehicule = Vehicule::findOne($id);
        var_dump($vehicule);

    }

    public function edit($id) {
    }

    public function delete($id) {
    }

    public function save() {
    }
}