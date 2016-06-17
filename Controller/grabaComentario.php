<?php
session_start();

require_once 'twig/lib/Twig/Autoloader.php';

require_once '../Model/Critica.php';
$CrAux = new Critica($_POST['idCritica'], $_POST['nombre'], $_POST['comentario'], $_POST['id']);



$CrAux->insert();
header("Location: criticas.php");
//header("Location: criticas.php");

