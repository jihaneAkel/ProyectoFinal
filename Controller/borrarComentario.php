<?php

require_once '../Model/Critica.php';
require_once 'twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);


$CrAux = Critica::getCriticaByNombre($_POST['idCritica']);
$CrAux->delete();


$criticas = Critica::getCriticas();
     
echo $twig->render('criticasAjax.html.twig', ['criticas' => $criticas]);
//header("Location: criticas.php");