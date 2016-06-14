<?php

session_start();
require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/Critica.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

$criticas = Critica::getCriticas();
if ($_SESSION['login'] == true) {

    echo $twig->render('review.html.twig', ['criticas' => $criticas]);
} else {
    echo $twig->render('registrar.html.twig', ['criticas' => $criticas]);
    echo '<script language="javascript">';
    //echo 'alert("tienes q iniciar la session ")';
    echo ' $(function() {
          $( "#dial" ).dialog({
             modal: true,
             buttons: {
                 Ok: function() {
          $( this ).dialog( "close" );
            }
      }
    });
         });';
    echo '</script>';

    echo '<div id="dial" title="Error">
    <p> inicia sesión o regístrate </p>
    </div>';
}
