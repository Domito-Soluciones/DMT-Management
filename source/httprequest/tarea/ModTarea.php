<?php
include '../../conexion/Conexion.php';

$id = filter_input(INPUT_POST, 'id');
$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$status = filter_input(INPUT_POST, 'status');
$conn = new Conexion();
$conn->conectar();
$query = "UPDATE tbl_tarea SET tarea_nombre = '$nombre', tarea_descripcion = '$descripcion', tarea_status = $status WHERE tarea_id = $id";
mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn));

