<?php
require('models/filmManager.php');


function listPosts()
{
    $posts = listFilms();

    require 'vendor/autoload.php';
    
    $loader = new Twig_Loader_Filesystem('views'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
      'cache' => false
    ));

    $template = $twig->load('postView.html');
    echo $template->render(array('films'=>$posts));
    
}

function post()
{
    $film = film();
    require 'vendor/autoload.php';
    
    $loader = new Twig_Loader_Filesystem('views'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
    'cache' => false
    ));

    $template = $twig->load('postView.html');
    echo $template->render(array('postFilm'=>$film));
    
}