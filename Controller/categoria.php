<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Libro.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


$tipo = $_GET['tipo'];


$tipoLista['tipos'] = Libro::getTipoLibro($tipo);
//print_r($categoriaLista);
echo $twig->render('listadoCategoria.html.twig', $tipoLista);
