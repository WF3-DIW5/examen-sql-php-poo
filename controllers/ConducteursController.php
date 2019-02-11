<?php

class ConducteursController {
    public function index() {

        $conducteurs = Conducteur::findAll();
        view('conducteurs.index', compact('conducteurs'));
    }

    public function add() {
    }

    public function show($id) {

        $conducteur = Conducteur::findOne($id);
        view('conducteurs.index', compact('conducteur'));
    }


    public function delete($id) {
    }

    public function save() {
    }
}