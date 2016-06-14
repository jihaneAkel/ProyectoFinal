<?php

require_once 'twig/lib/Twig/Autoloader.php';

require_once '../Model/Libro.php';

// sube la imagen al servidor
move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/img/" . $_FILES["imagen"]["name"]);
// inserta el articulo en la base de datos
$libroAux = new Libro($_POST['isbn'], $_POST['autor'], $_POST['titulo'], $_POST['tipo'], $_POST['descripcion'], $_FILES["imagen"]["name"]);
//$ofertaAux = new Libro("", $_POST['titulo'], $_POST['fechaPub'], $_POST['contenido']);
$libroAux->insert();
header("Location: libros.php");



