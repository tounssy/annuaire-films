<?php
require('controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listFilms') {
        listFilms();
    }
    elseif ($_GET['action'] == 'film') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            film($_GET['id']);
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listFilms();
}