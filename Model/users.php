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

}
