<?php

class VehiculesController {
    public function index() {

        $vehicules = Vehicule::findAll();
        view('vehicules.index', compact('vehicules'));


    }

    public function add() {
    }

    public function show($id) {

        $vehicule = Vehicule::findOne($id);
        view('vehicules.index', compact('vehicule'));


    }

    public function edit($id) {
    }

    public function delete($id) {
    }

    public function save() {
    }
}