<?php

require_once 'LibroDB.php';

class Critica {
    
    private $idCritica;
    private $nombre;
    private $comentario;

            

    function __construct($idCritica, $nombre, $comentario) {
        $this->idCritica = $idCritica;
        $this->nombre = $nombre;
        $this->comentario = $comentario;

       
    }
    function getIdCritica() {
        return $this->idCritica;
    }


            
    function getNombre() {
        return $this->nombre;
    }

    function getComentario() {
        return $this->comentario;
    }

    
    public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO critica (idCritica, nombre, comentario) VALUES (\"" . $this->idCritica . "\", \"" . $this->nombre . "\", \"" . $this->comentario . "\")";
        $conexion->exec($insercion);
    }

    public function delete() {
        $conexion = LibroDB::connectDB();
        $borrado = "DELETE FROM critica WHERE idCritica=\"" . $this->idCritica . "\"";
        $conexion->exec($borrado);
    }
    
     ////// Modificar

    public function update() {
        $conexion = LibroDB::connectDB();
        //$modificacion = "UPDATE critica SET (idCritica, nombre, comentario) WHERE idCritica=\"". $this->idCritica . "\"";
        $modificacion = "UPDATE critica SET nombre='$this->nombre', comentario='$this->comentario' WHERE iCritica='$this->idCritica'";
        $conexion->exec($modificacion);
    }
    
    
        //$modificacion = "UPDATE libro SET (isbn, autor, titulo, tipo, descripcion, imagen) WHERE isbn=\"".$this->isbn."\"";

  
    public static function getCriticas() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCritica, nombre, comentario FROM critica";
        $consulta = $conexion->query($seleccion);

        $criticas = [];


        while ($registro = $consulta->fetchObject()) {

            $criticas[] = new Critica($registro->idCritica, $registro->nombre, $registro->comentario);
        }

        return $criticas;
    }
   
    public static function getCriticaByNombre($idCritica) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCritica, nombre, comentario FROM critica WHERE idCritica=\"" . $idCritica . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $critica = new Critica($registro->idCritica, $registro->nombre, $registro->comentario);

        return $critica; 
    }

}
