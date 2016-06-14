

<?php

// Carga la vista del formulario de alta de Articulo
require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Libro.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


$datos['libro'] = Libro::getLibroById($_GET['isbn']);
echo $twig->render('formularioModifica.html.twig', $datos);

