<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=films_caty;charset=utf8', 'adnane', 'piccolo333');
}
catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}

function listFilms() {
    $response = $bdd->prepare('SELECT titre, url_affiche FROM films WHERE annee_de_sortie <= CURDATE() ORDER BY annee_de_sortie DESC LIMIT 4');
    $response->execute();
    return $response->fetchAll(FETCH_ASSOC);
}

echo listFilms();
