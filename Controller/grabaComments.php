<?php
session_start();
require_once 'twig/lib/Twig/Autoloader.php';

require_once '../Model/Comment.php';

if ($_SESSION['login'] == true) {
// inserta el articulo en la base de datos
$libroCo = new Comment("" , $_POST['nombre'], $_POST['comment'], $_POST['isbn']);
$libroCo->insert();
header("Location: libros.php");
} else {
 //echo $twig->render('registrar.html.twig');
 header("Location: registrar.php");
 
}