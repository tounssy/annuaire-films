<?php
require('controllers/controller.php');
try {
	if (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listFilms') {
	        listFilms();
	    }
	    elseif ($_GET['action'] == 'film') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            film($_GET['id']);
	        }
	        else {
	            throw new Exception('Erreur : aucun identifiant de billet envoyé');
	        }
	    }
	}
	else {
	    listFilms();
	}
} catch(Exception $e){
	echo 'Erreur : ' . $e->getMessage();
}
