<?php

class AssociationsController {
    public function index() {

        $associations = Association::findAll();
        var_dump($associations);
    }

    public function add() {
    }

    public function show($id) {

        $association = Association::findOne($id);
        var_dump($association);
    }

    public function edit($id) {
    }

    public function delete($id) {
    }

    public function save() {
    }
}