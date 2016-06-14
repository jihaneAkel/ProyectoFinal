<?php

session_start();
require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Respuesta.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

$respuestas = Respuesta::getresById($idCritica);

  
echo $twig->render('review.html.twig', ['respuestas' => $respuestas]);

