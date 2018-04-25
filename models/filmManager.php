<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=films_caty;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}

function listFilms() {
    $response = $GLOBALS['bdd']->prepare('SELECT id, titre, url_affiche FROM films WHERE annee_de_sortie <= CURDATE() ORDER BY annee_de_sortie DESC LIMIT 4');
    $response->execute();
    return $response->fetchAll(PDO::FETCH_ASSOC);
}

function film(){
    
    
    
    
    
    $response = $GLOBALS['bdd']->prepare('SELECT films.titre, films.url_affiche, films.annee_de_sortie, films.description, 
        GROUP_CONCAT(DISTINCT acteurs.nom_acteur SEPARATOR", ") AS acteurs, 
        GROUP_CONCAT(DISTINCT realisateurs.realisateur SEPARATOR", ") AS realisateurs, 
        GROUP_CONCAT(DISTINCT genre_films.genre SEPARATOR ", ") AS genres
        FROM films, films_acteurs, films_realisateurs, acteurs, realisateurs, genre_films, titre_genre
        WHERE films.id = '.$_GET['id'].'
        AND films.id = films_acteurs.id_films
        AND films.id = films_realisateurs.id_films
        AND acteurs.id = films_acteurs.id_acteurs
        AND realisateurs.id = films_realisateurs.id_realisateur
        AND genre_films.code_genre = titre_genre.code_genre
        AND films.id = titre_genre.id_film
        GROUP BY films.titre');
    $response->execute();
    return $response->fetch(PDO::FETCH_ASSOC);
}
