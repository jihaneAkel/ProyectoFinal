<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/users.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


if (!empty($_POST['nombre']) && !empty($_POST['contrasena']) && !empty($_POST['email'])) {

    $nombre = $_POST['nombre'];
    $contrasena = md5($_POST['contrasena']);
    $email = $_POST['email'];
    $conexion = LibroDB::connectDB();
    $seleccion = "select * from users where nombre= '" . $nombre . "' ";
    $consult = $conexion->query($seleccion);
    if ($consult->rowCount() == 1) {


        echo "<h1>Error</h1>";
        echo "<p>ya existe este nombre , intenta con otro nuevo .</p>";
        echo " <a href=\"registrar.php\"> intentar </a>";
    } else {

// inserta 
        $userAux = new users($_POST['nombre'], md5($_POST['contrasena']), $email);

        $userAux->insert();
        echo "<h1>Success</h1>";
        echo "<p>Cuenta creada. <a href=\"login.php\"> inicia session </a>.</p>";
    }
}





