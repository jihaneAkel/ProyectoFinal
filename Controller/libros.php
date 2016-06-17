<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Libro.php';
require_once '../Model/Comment.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


//
$libros = Libro::getLibros();
$comments = Comment::getComments();
//var_dump($libros[0]);
echo $twig->render('libros.html.twig', ['libros' => $libros, 'comments' => $comments]);


/*

if($_POST['page']){

$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 3; // Per page records
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;


}*/