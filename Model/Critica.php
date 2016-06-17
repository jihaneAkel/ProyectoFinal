<?php

require_once 'LibroDB.php';
require_once 'users.php';

class Critica {
    
    private $idCritica;
    private $nombre;
    private $comentario;
    private $id;

            

    function __construct($idCritica, $nombre, $comentario, $id) {
        $this->idCritica = $idCritica;
        $this->nombre = $nombre;
        $this->comentario = $comentario;
        $this->id = $id;
       
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

    function getId() {
        return $this->id;
    }

        public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO critica (idCritica, nombre, comentario, id) VALUES (\"" . $this->idCritica . "\", \"" . $this->nombre . "\", \"" . $this->comentario . "\", \"" . $this->id . "\")";
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
        $modificacion = "UPDATE critica SET nombre='$this->nombre', comentario='$this->comentario', id='$this->id' WHERE iCritica='$this->idCritica'";
        $conexion->exec($modificacion);
    }
    
    
        //$modificacion = "UPDATE libro SET (isbn, autor, titulo, tipo, descripcion, imagen) WHERE isbn=\"".$this->isbn."\"";

  
    public static function getCriticas() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCritica, nombre, comentario, id FROM critica";
        $consulta = $conexion->query($seleccion);

        $criticas = [];
     

        while ($registro = $consulta->fetchObject()) {
        $nombres = users::getUsersByName($registro -> nombre);
            $criticas[] = ['critica' =>new Critica($registro->idCritica, $registro->nombre, $registro->comentario, $registro->id),'nombres'=> $nombres];
        }

        return $criticas;
    }
   
    public static function getCriticaByNombre($idCritica) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCritica, nombre, comentario, id FROM critica WHERE idCritica=\"" . $idCritica . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $critica = new Critica($registro->idCritica, $registro->nombre, $registro->comentario, $registro->id);

        return $critica; 
    }
    
    
    
    public static function getCriticaByUser($nombre) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCritica, nombre, comentario, id FROM critica WHERE nombre=\"" . $nombre . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $critica = new Critica($registro->idCritica, $registro->nombre, $registro->comentario, $registro->id);

        return $critica; 
    }
    
}
