<?php
    include '../../conexion/Conexion.php';

    header('Content-Type: application/json');

    $id = filter_input(INPUT_POST, 'id');
    $linea = 0;
    $conn = new Conexion();
    try {
        $query = "SELECT * FROM tbl_tarea WHERE tarea_id = $id";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            echo "{\"id\":\"".$row['tarea_id']."\","
                . "\"nombre\":\"".$row['tarea_nombre']."\","
                . "\"descripcion\":\"".$row['tarea_descripcion']."\","
                . "\"status\":\"".$row['tarea_status']."\""
                ."}";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }