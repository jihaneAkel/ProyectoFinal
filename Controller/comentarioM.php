<?php

// Carga la vista del formulario de alta de Articulo
require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Critica.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

$datos['critica'] = Critica::getCriticaByNombre($idCritica);
echo $twig->render('formAnswer.html.twig', $datos);
