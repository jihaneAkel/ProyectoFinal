<?php

require_once 'LibroDB.php';

class Libro {

    private $isbn;
    private $autor;
    private $titulo;
    private $tipo;
    private $descripcion;
    private $imagen;

    function __construct($isbn, $autor, $titulo, $tipo, $descripcion, $imagen) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getAutor() {
        return $this->autor;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImagen() {
        return $this->imagen;
    }

    public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO libro (isbn, autor, titulo, tipo, descripcion, imagen) VALUES (\"" . $this->isbn . "\", \"" . $this->autor . "\", \"" . $this->titulo . "\", \"" . $this->tipo . "\", \"" . $this->descripcion . "\", \"" . $this->imagen . "\")";
        $conexion->exec($insercion);
    }

    public function delete() {
        $conexion = LibroDB::connectDB();
        $borrado = "DELETE FROM libro WHERE isbn=\"" . $this->isbn . "\"";
        $conexion->exec($borrado);
    }

    ////// Modificar

    public function update() {
        $conexion = LibroDB::connectDB();
        //$modificacion = "UPDATE libro SET (isbn, autor, titulo, tipo, descripcion, imagen) WHERE isbn=\"".$this->isbn."\"";

        $modificacion = "UPDATE libro SET autor='$this->autor', titulo='$this->titulo',  tipo='$this->tipo', descripcion='$this->descripcion', imagen='$this->imagen' WHERE isbn='$this->isbn'";
        echo $modificacion;

        $conexion->exec($modificacion);
    }

    // categoria 

    public static function getTipoLibro($tipo) {

        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT isbn, titulo, autor, tipo, descripcion, imagen FROM libro WHERE tipo=\"$tipo\" ORDER BY titulo DESC";
        $consulta = $conexion->query($seleccion);

        $libros = [];

        while ($registro = $consulta->fetchObject()) {
            $libros[] = new Libro($registro->isbn, $registro->titulo, $registro->autor, $registro->tipo, $registro->descripcion, $registro->imagen);
        }


        return $libros;
    }

    public static function getLibros() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT isbn, titulo, autor, tipo ,descripcion, imagen FROM libro";
        $consulta = $conexion->query($seleccion);

        $libros = [];


        while ($registro = $consulta->fetchObject()) {

            $libros[] = new Libro($registro->isbn, $registro->autor, $registro->titulo, $registro->tipo, $registro->descripcion, $registro->imagen);
        }

        return $libros;
    }


    public static function getLibroById($isbn) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT isbn, autor, titulo, tipo, descripcion, imagen FROM libro WHERE isbn=\"" . $isbn . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $libro = new Libro($registro->isbn, $registro->autor, $registro->titulo, $registro->tipo, $registro->descripcion, $registro->imagen);

        return $libro;
    }
    
     public static function getSearchNames() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT titulo FROM libro WHERE titulo LIKE '%$consultaBusqueda%'";
        $consulta = $conexion->query($seleccion);
        
        $names = [];
        while ($registro = $consulta->fetchObject()) {

             $names[] = $registro;
        }

        return $names;
    }
    
    
    

}


