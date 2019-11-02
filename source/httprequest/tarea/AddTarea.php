<?php
include '../../conexion/Conexion.php';

$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$status = filter_input(INPUT_POST, 'status');
$conn = new Conexion();
$conn->conectar();
$query = "INSERT INTO tbl_tarea (tarea_nombre,tarea_descripcion,tarea_status) VALUES ('$nombre','$descripcion',$status)";
mysqli_query($conn->conn,$query) or die(mysqli_error($conn->conn));