<?php

class ConducteursController {
    public function index() {

        $conducteurs = Conducteur::findAll();
        var_dump($conducteurs);
    }

    public function add() {
    }

    public function show($id) {

        $conducteur = Conducteur::findOne($id);
        var_dump($conducteur);
    }

    public function edit($id) {
    }

    public function delete($id) {
    }

    public function save() {
    }
}