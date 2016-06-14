<?php

require_once 'twig/lib/Twig/Autoloader.php';

require_once '../Model/Libro.php';

$libroAux = Libro::getLibroById($_POST['isbn']);
$libroAux = new Libro($_POST['isbn'], $_POST['autor'], $_POST['titulo'], $_POST['tipo'], $_POST['descripcion'], $_FILES["imagen"]["name"]);
$libroAux->update();

header("Location: index.php");




