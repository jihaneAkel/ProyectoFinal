<?php

require_once 'LibroDB.php';

class Autor {
    private $imagen;
    private $idAu;
    private $nombre;
    private $bio;
    private $libros;
    private $popular;
 

    function __construct($idAu, $imagen, $nombre, $bio, $libros, $popular) {
        $this->imagen = $imagen;
        $this->idAu = $idAu;
        $this->nombre = $nombre;
        $this->bio = $bio;
        $this->libros = $libros;
        $this->popular = $popular;
    }
    function getPopular() {
        return $this->popular;
    }

        function getImagen() {
        return $this->imagen;
    }

    function getIdAu() {
        return $this->idAu;
    }

        function getNombre() {
        return $this->nombre;
    }

    function getBio() {
        return $this->bio;
    }

    
        public function insert() {
        $conexion = LibroDB::connectDB();                                                                                                
        $insercion = "INSERT INTO autor (idAu, imagen, nombre, bio, libros, popular) VALUES (\"" . $this->idAu . "\", \"" . $this->imagen . "\", \"" . $this->nombre . "\", \"" . $this->bio . "\", \"" . $this->libros . "\", \"" . $this->popular . "\")";
        $conexion->exec($insercion);
    }

    public function delete() {
        $conexion = LibroDB::connectDB();
        $borrado = "DELETE FROM autor WHERE idAu=\"" . $this->idAu . "\"";
        $conexion->exec($borrado);
    }

   

   
    public static function getAutores() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idAu, imagen, nombre, bio, libros, popular FROM autor  ORDER BY nombre ASC";
        $consulta = $conexion->query($seleccion);

        $autores = [];
        while ($registro = $consulta->fetchObject()) {

            $autores[] = new Autor($registro->idAu, $registro->imagen, $registro->nombre, $registro->bio, $registro->libros, $registro->popular);
        }

        return $autores;
    }


    public static function getAutorById($idAu) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT * FROM autor WHERE idAu=\"" . $idAu . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $autor = new Autor($registro->idAu, $registro->imagen, $registro->nombre, $registro->bio, $registro->libros, $registro->popular);

        return $autor;
    }
    
   
    

}
