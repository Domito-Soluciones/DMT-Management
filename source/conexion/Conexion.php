<?php

class Conexion {
    
    private $host="localhost";
    private $dbname="domitocl_gestion";
    private $user="domitocl_gpsvan";
    private $pass="sQ]nhwxoxi2C";

    public $conn;
    
    function conectar()
    {       
        $this->conn = mysqli_connect($this->host,$this->user,$this->pass, $this->dbname);
        return $this->conn;
    }
    
    function desconectar()
    {
        mysqli_close($this->conn);
    }
}
