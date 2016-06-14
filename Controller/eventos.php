<?php

session_start();
require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Evento.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

$eventos = Evento::getEventos();
echo $twig->render('eventos.html.twig', ['eventos' => $eventos]);
