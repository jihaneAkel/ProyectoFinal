<?php

require_once 'LibroDB.php';

class users {

    private $id;
    private $nombre;
    private $contrasena;
    private $email;
   // $id,  $this->id = $id;
    function __construct($nombre, $contrasena, $email) {
       
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
        $this->email = $email;
    }

    function getNombre() {
        return $this->nombre;
    }
    function getId() {
        return $this->id;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getEmail() {
        return $this->email;
    }

    
        public function insert() {
        $conexion = LibroDB::connectDB();
        $insercion = "INSERT INTO users (nombre, contrasena, email) VALUES(\"" . $this->nombre . "\", \"" . $this->contrasena . "\", \"" . $this->email . "\")";
        $conexion->exec($insercion);
    }

    public function getUsers($nombre, $contrasena) {
        $conexion = LibroDB::connectDB();
        $seleccion = "select * from users where nombre= '" . $nombre . "'";

        $consult = $conexion->query($seleccion);
        if ($consult->rowCount() == 1) {
            $objeto = $consult->fetchObject();
            

            if ($objeto->contrasena == md5($contrasena)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
    
     public static function getUsersByName($nombre) {
        $conexion = LibroDB::connectDB();
        $seleccion = "SELECT id, nombre, contrasena, email FROM users WHERE nombre=\"" . $registro->nombre . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $user = new users($registro->id, $registro->nombre, $registro->contrasena, $registro->email);

        return $user; 
    }


}
