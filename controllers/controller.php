<?php

require('models/filmManager.php');
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../views');
$twig = new Twig_Environment($loader, array(
    'cache' => false
));
function listFilms()
{
    $posts = getFilms();

    echo $GLOBALS['twig']->render('listFilmsView.twig');
}

function film()
{
    $post = getFilm($_GET['id']);
    
    echo $GLOBALS['twig']->render('FilmView.php');
}