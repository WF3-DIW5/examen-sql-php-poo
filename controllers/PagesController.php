<?php

class PagesController {

    public function home() {

        view('pages.home');

    }

    public function divers() {
        echo "various requests";
    }
}