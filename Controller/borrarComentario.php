<?php


require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Libro.php';
require_once '../Model/Comment.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


$CrAux = Comment::getCommentByid($_POST['idCom']);
$CrAux->delete();



$libros = Libro::getLibros();
$comments = Comment::getComments();
//var_dump($libros[0]);
echo $twig->render('criticasAjax.html.twig', ['libros' => $libros, 'comments' => $comments]);

//, ['comments' => $comments] criticasAjax
//header("Location: libros.php");