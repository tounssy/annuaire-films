<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=films_caty', 'root', '');
}
catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}

function getFilms() {
    $response = $GLOBALS['bdd']->prepare('SELECT titre, url_affiche FROM films WHERE annee_de_sortie <= CURDATE() ORDER BY annee_de_sortie DESC LIMIT 4');
    $response->execute();
    return $response->fetchAll(PDO::FETCH_ASSOC);
}

function getFilm($id){
	$response = $GLOBALS['bdd']->prepare('SELECT films.*, GROUP_CONCAT(DISTINCT genre_films.genre SEPARATOR \', \') AS genre, GROUP_CONCAT(DISTINCT acteurs.nom_acteur SEPARATOR \', \') AS acteurs, realisateurs.realisateur FROM ((((((films INNER JOIN titre_genre ON titre_genre.id_film = films.id) INNER JOIN genre_films ON titre_genre.code_genre = genre_films.code_genre) INNER JOIN films_acteurs ON films.id = films_acteurs.id_films) INNER JOIN acteurs ON films_acteurs.id_acteurs = acteurs.id) INNER JOIN films_realisateurs ON films.id = films_realisateurs.id_films) INNER JOIN realisateurs ON films_realisateurs.id_realisateur = realisateurs.id) WHERE films.id = :id GROUP BY films.titre');

	$response->bindParam(':id', $id, PDO::PARAM_INT);
	$response->execute();
	return $response->fetch(PDO::FETCH_ASSOC);
}

