<?php

require_once 'twig/lib/Twig/Autoloader.php';

require_once '../Model/Critica.php';



$CrAux = Critica::getCriticaByNombre($_POST['idCritica']);
$CrAux->delete();

$CrAux = new Critica("", $_POST['nombre'], $_POST['comentario']);
$CrAux->insert();

header("Location: criticas.php");

