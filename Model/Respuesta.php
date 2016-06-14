<?php

require_once 'LibroDB.php';

class Respuesta {
    
    private $idRespuesta;
    private $nombre;
    private $answer;
    private $idCritica;
    function __construct($idRespuesta, $nombre, $answer, $idCritica) {
        $this->idRespuesta = $idRespuesta;
        $this->nombre = $nombre;
        $this->answer = $answer;
        $this->idCritica = $idCritica;
    }

    function getIdCritica() {
        return $this->idCritica;
    }

        function getIdRespuesta() {
        return $this->idRespuesta;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAnswer() {
        return $this->answer;
    }

            
    public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO respuesta (idRespuesta, nombre, answer, idCritica) VALUES (\"" . $this->idRespuesta . "\", \"" . $this->nombre . "\", \"" . $this->answer . "\", \"" . $this->idCritica . "\")";
        $conexion->exec($insercion);
    }

    public function delete() {
        $conexion = LibroDB::connectDB();
        $borrado = "DELETE FROM respuesta WHERE idRespuesta=\"" . $this->idRespuesta . "\"";
        $conexion->exec($borrado);
    }

    public static function getRespuestas() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT * FROM respuesta";
        $consulta = $conexion->query($seleccion);

        $respuestas = [];


        while ($registro = $consulta->fetchObject()) {

            $respuestas[] = new Respuesta($registro->idRespuesta, $registro->nombre, $registro->answer, $registro->idCritica);
        }

        return $respuestas;
    }
   
    public static function getRespuestaById($idRespuesta) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idRespuesta, nombre, answer FROM respuesta WHERE idRespuesta=\"" . $idRespuesta . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $respuesta = new Respuesta($registro->idRespuesta, $registro->nombre, $registro->answer, $registro->idCritica);

        return $respuesta; 
    }

  public static function getresById($idCritica) {
    $conexion = LibroDB::connectDB();
    $seleccion = "SELECT * FROM respuesta WHERE idCritica = $idCritica ";
    $consulta = $conexion->query($seleccion);
    
    $respuestas = [];
    
    while ($registro = $consulta->fetchObject()) {
      $respuestas[] = new Respuesta($registro->idRespuesta, $registro->nombre, $registro->answer, $registro->idCritica);
    }
   
    return $respuestas;    
  }
} 