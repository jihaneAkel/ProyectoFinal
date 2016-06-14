<?php


session_start();

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/users.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

echo $twig->render('registrar.html.twig', []);
