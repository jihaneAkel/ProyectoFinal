<?php

session_start();

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/users.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

if ((isset($_POST['nombre'])) && (isset($_POST['contrasena']))) {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $login = users::getUsers($nombre, $contrasena);
    if ($login) {
        $_SESSION['login'] = true;
        $_SESSION['nombreUsuario'] = $nombre;
        header("Location: criticas.php");
        
      //  echo $twig->render('review.html.twig');
      
    } else {
    echo $twig->render('registrar.html.twig');
    echo '<script language="javascript">';
    echo 'alert("nombre o contresena incorrecta ")';
    echo '</script>';

    }
} else {
    echo $twig->render('registrar.html.twig');
   
}

