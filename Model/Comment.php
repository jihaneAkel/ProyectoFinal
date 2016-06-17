<?php

require_once 'LibroDB.php';
require_once 'Libro.php';

class Comment{
    
    private $idCom;
    private $nombre;
    private $comment;
    private $isbn;

            
    function __construct($idCom, $nombre, $comment, $isbn) {
        $this->idCom = $idCom;
        $this->nombre = $nombre;
        $this->comment = $comment;
        $this->isbn = $isbn;
    }
    function getIdCom() {
        return $this->idCom;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getComment() {
        return $this->comment;
    }

    function getIsbn() {
        return $this->isbn;
    }

            
    public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO comment (idCom, nombre, comment, isbn) VALUES (\"" . $this->idCom . "\", \"" . $this->nombre . "\", \"" . $this->comment . "\", \"" . $this->isbn . "\")";
        $conexion->exec($insercion);
    }

    public function delete() {
        $conexion = LibroDB::connectDB();
        $borrado = "DELETE FROM comment WHERE idCom=\"" . $this->idCom . "\"";
        $conexion->exec($borrado);
    }
    
     ////// Modificar
/*
    public function update() {
        $conexion = LibroDB::connectDB();
        //falta isbn 
        $modificacion = "UPDATE comment SET nombre='$this->nombre', comment='$this->comment' WHERE iCom='$this->idCom'";
        $conexion->exec($modificacion);
    }
    
    */
        //$modificacion = "UPDATE libro SET (isbn, autor, titulo, tipo, descripcion, imagen) WHERE isbn=\"".$this->isbn."\"";

  
    public static function getComments() {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCom, nombre, comment, isbn FROM comment";
        $consulta = $conexion->query($seleccion);

        $comments = [];


        while ($registro = $consulta->fetchObject()) {
    // isbn
            $comments[] = new Comment($registro->idCom, $registro->nombre, $registro->comment, $registro->isbn);
        }

        return $comments;
    }
   
    
    
    
    
    public static function getCommentByid($idCom) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCom, nombre, comment, isbn FROM comment WHERE idCom=\"" . $idCom . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $comment = new Comment($registro->idCom, $registro->nombre, $registro->comment, $registro->isbn);

        return $comment; 
    }
    
    public static function getCommentByIsbn($isbn) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT idCom, nombre, comment, isbn FROM comment WHERE isbn=\"" . $isbn . "\"";
        $consulta = $conexion->query($seleccion);
       // $registro = $consulta->fetchObject();
        $comment =[];
        while ($registro = $consulta->fetchObject()) {
      
        $comment[] = new Comment($registro->idCom, $registro->nombre, $registro->comment, $registro->isbn);
        
   
        } 
        return $comment; 
    }

}

  //if($registro){
   //  }else{
        
      ///  $comment = [];
    //    }