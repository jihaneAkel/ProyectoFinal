<?php

require_once 'LibroDB.php';
require_once 'Comment.php';

class Libro {

    private $isbn;
    private $autor;
    private $titulo;
    private $tipo;
    private $descripcion;
    private $imagen;
    private $comentarios;

    function __construct($isbn, $autor, $titulo, $tipo, $descripcion, $imagen, $comentarios) {
        $this->isbn = $isbn;
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->comentarios = $comentarios;
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
    
    function getComentarios() {
        return $this->comentarios;
    }

    
    public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO libro (isbn, autor, titulo, tipo, descripcion, imagen, comentarios) VALUES (\"" . $this->isbn . "\", \"" . $this->autor . "\", \"" . $this->titulo . "\", \"" . $this->tipo . "\", \"" . $this->descripcion . "\", \"" . $this->imagen . "\", \"" . $this->comentarios . "\")";
        $conexion->exec($insercion);
    }

    public function delete() {
        $conexion = LibroDB::connectDB();
        $borrado = "DELETE FROM libro WHERE isbn=\"" . $this->isbn . "\"";
        $conexion->exec($borrado);
    }

    ////// Modificar
    
     public function insertComment() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO libro ('', '', '', '', '', '', comentarios) VALUES (\"''\", \"''\", \"''\", \"''\", \"''\", \"''\", \"" . $this->comentarios . "\")";
        $conexion->exec($insercion);
    }

    public function update() {
        $conexion = LibroDB::connectDB();
        //$modificacion = "UPDATE libro SET (isbn, autor, titulo, tipo, descripcion, imagen) WHERE isbn=\"".$this->isbn."\"";

        $modificacion = "UPDATE libro SET autor='$this->autor', titulo='$this->titulo',  tipo='$this->tipo', descripcion='$this->descripcion', imagen='$this->imagen', comentarios='$this->comentarios' WHERE isbn='$this->isbn'";
        echo $modificacion;

        $conexion->exec($modificacion);
    }

    // categoria 

    public static function getTipoLibro($tipo) {

        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT isbn, titulo, autor, tipo, descripcion, imagen, comentarios FROM libro WHERE tipo=\"$tipo\" ORDER BY titulo DESC";
        $consulta = $conexion->query($seleccion);

        $libros = [];

        while ($registro = $consulta->fetchObject()) {
            $libros[] = new Libro($registro->isbn, $registro->titulo, $registro->autor, $registro->tipo, $registro->descripcion, $registro->imagen, $registro->comentarios);
        }


        return $libros;
    }

    public static function getLibros() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT isbn, titulo, autor, tipo, descripcion, imagen, comentarios FROM libro";
        $consulta = $conexion->query($seleccion);

        $libros = [];
        
        while ($registro = $consulta->fetchObject()) {
        $comments = Comment::getCommentByIsbn($registro->isbn);
            $libros[] =['libro' => new Libro($registro->isbn, $registro->autor, $registro->titulo, $registro->tipo, $registro->descripcion, $registro->imagen, $registro->comentarios), 'comment'=> $comments];
        }

        return $libros;
    }
    
    
    
    
     public static function getComments() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT comentarios FROM libro WHERE isbn=\"" . $isbn . "\"";
        $consulta = $conexion->query($seleccion);

        $coments = [];


        while ($registro = $consulta->fetchObject()) {

            $coments[] = new Libro($registro->isbn, $registro->autor, $registro->titulo, $registro->tipo, $registro->descripcion, $registro->imagen, $registro->comentarios);
        }

        return $coments;
    }


    public static function getLibroById($isbn) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT isbn, autor, titulo, tipo, descripcion, imagen, comentarios FROM libro WHERE isbn=\"" . $isbn . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $libro = new Libro($registro->isbn, $registro->autor, $registro->titulo, $registro->tipo, $registro->descripcion, $registro->imagen, $registro->comentarios);

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
    
    
    
    ////////////  prueba ///////// 
     public static function getCommentByIsbn($isbn) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCom, nombre, comment, isbn FROM comment WHERE isbn=\"" . $registro->isbn . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $comment = new Comment($registro->idCom, $registro->nombre, $registro->comment, $registro->isbn);

        return $comment; 
    }
    
    

}


