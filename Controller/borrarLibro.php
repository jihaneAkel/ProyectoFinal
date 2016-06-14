<?php

require_once '../Model/Libro.php';

require_once 'twig/lib/Twig/Autoloader.php';



Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);




$libroAux = Libro::getLibroById($_POST['isbn']);
//$libroAux =  new Libro($_GET['isbn']);
$libroAux->delete();
//header("Location: index.php");

$libros = Libro::getLibros();
echo $twig->render('librosAjax.html.twig', ['libros' => $libros]);


/*
 //$twig->render('formulario.html.twig');
$libro = Libro::getLibros();
echo $twig->render('libros.html.twig', ['libros'=> $libro]);*/