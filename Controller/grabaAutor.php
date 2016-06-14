<?php

require_once 'twig/lib/Twig/Autoloader.php';

require_once '../Model/Autor.php';

// sube la imagen al servidor
move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/img/" . $_FILES["imagen"]["name"]);

$aux = new Autor($_POST['idAu'], $_FILES["imagen"]["name"], $_POST['nombre'],$_POST['bio'], $_POST['libros'], $_POST['popular']);

$aux->insert();
header("Location: autores.php");
