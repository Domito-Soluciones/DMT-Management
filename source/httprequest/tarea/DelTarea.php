<?php
include '../../conexion/Conexion.php';

$id = filter_input(INPUT_POST, 'id');
$conn = new Conexion();
$conn->conectar();
$query = "DELETE FROM tbl_tarea WHERE tarea_id = $id";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
    LogDao::agregarSincronizacion($query);
} else {
    echo mysqli_error($conn->conn);
}

