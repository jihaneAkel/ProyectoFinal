<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Autor.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


//
$aux = Autor::getAutores();
echo $twig->render('autores.html.twig', ['autores' => $aux]);

