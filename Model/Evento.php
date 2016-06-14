<?php


require_once 'LibroDB.php';

class Evento {

    private $idEvento;
    private $contenido;
    private $fecha;
    private $lugar; 

    function __construct($idEvento, $contenido, $fecha, $lugar) {
        $this->idEvento= $idEvento;
        $this->contenido = $contenido;
        $this->fecha = $fecha;
        $this->lugar = $lugar;
    }
    function getContenido() {
        return $this->contenido;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getLugar() {
        return $this->lugar;
    }

        

    public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO evento (idEvento, contenido, fecha, lugar) VALUES(\"" . $this->idEvento . "\", \"" . $this->contenido . "\", \"" . $this->fecha . "\", \"" . $this->lugar. "\")";
        $conexion->exec($insercion);
    }
    
    public function update() {
        $conexion = LibroDB::connectDB();
        $modificacion = "UPDATE evento SET idEvento='$this->idEvento', contenido='$this->contenido', fecha='$this->fecha', lugar='$this->lugar' WHERE idEvento='$this->idEvento'";
        $conexion->exec($modificacion);
    }

     public function delete() {
        $conexion = LibroDB::connectDB();
        $delete = "DELETE FROM evento WHERE idEvento=\"" . $this->idEvento . "\"";
        $conexion->exec($delete);
    }
    
     public static function getEventos() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT * FROM evento";
        $consulta = $conexion->query($seleccion);
        $eventos = [];

        while ($registro=$consulta->fetchObject()) {
            $eventos[] = new Evento($registro->idEvento, $registro->contenido, $registro->fecha, $registro->lugar);
        }

        return $eventos;
    }
    
     public static function getEventById($idEvento) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idEvento, contenido, fecha, lugar FROM evento WHERE idEvento=\"" . $idEvento . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $evento = new Evento($registro->idEvento, $registro->contenido, $registro->fecha, $registro->lugar);

        return $evento;
    }
    

    
    
    } 