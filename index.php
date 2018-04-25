<?php

require('controllers/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listFilms') {
        listFilms();
    }
    elseif ($_GET['action'] == 'film') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();

        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
        else {
            listPosts();
}