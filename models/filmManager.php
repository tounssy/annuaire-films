<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=films_caty;charset=utf8', 'adnane', 'piccolo333');
}
catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}

function listFilms() {
    $response = $GLOBALS['bdd']->prepare('SELECT id, titre, url_affiche, annee_de_sortie FROM films WHERE annee_de_sortie <= CURDATE() ORDER BY annee_de_sortie DESC LIMIT 4');
    $response->execute();
    return $response->fetchAll(PDO::FETCH_ASSOC);
}

function film() {
    $response = $GLOBALS['bdd']->prepare('SELECT * FROM films WHERE id='.$_GET['id']);
    $response->execute();
    return $response->fetch(PDO::FETCH_ASSOC);
}