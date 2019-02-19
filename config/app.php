<?php

/**
 * Aliases : raccourcis pour les noms de classes
 */
class_alias('\Bramus\Router\Router', 'Router');

/**
 * Constantes : éléments de configuration propres au système
 */
const WEBSITE_TITLE = "Mon nouveau site en MVC";
const BASE_URL = "http://localhost/vtc";

/**
 * Liste des dossiers source pour l'autoload des classes
 */
const CLASSES_SOURCES = [
    'controllers',
    'config',
    'models',
];

const ENV = 'dev';


function errorHandler(Exception $e) {

    $_SESSION['exceptions'][] = $e->getMessage();

    //FIXME: redirection 302 au lieu de 500 (à ccause du location ?)
    // Header('HTTP/1.1 500 Internal Server Error');
    Header('Location: ' . url('/'));

    return;
}

set_exception_handler('errorHandler');