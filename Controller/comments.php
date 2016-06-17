<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Comment.php';
require_once '../Model/Libro.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


//
$comments = Comment::getComments();
echo $twig->render('respuesta.html.twig', ['comments' => $comments]);