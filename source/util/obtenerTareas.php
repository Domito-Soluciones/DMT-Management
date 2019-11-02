<?php
    include '../conexion/Conexion.php';

//    $id = filter_input(INPUT_POST, 'id');
//    $folio = filter_input(INPUT_POST, 'folio');
//    if(filter_input(INPUT_POST, 'desde') != '')
//    {
//        $desde = DateTime::createFromFormat('d/m/Y', filter_input(INPUT_POST, 'desde'))->format('Y/m/d');
//    }
//    else
//    {
//        $desde = '2000-01-01 00:00:00';
//    }
//    if(filter_input(INPUT_POST, 'hasta') != '')
//    {
//        $hasta = DateTime::createFromFormat('d/m/Y', filter_input(INPUT_POST, 'hasta'))->format('Y/m/d');
//    }
//    else
//    {
//        $hasta = '2100-01-01 00:00:00';
//    }
//    $estado = filter_input(INPUT_POST, 'estado');
    $linea = 0;
    $conn = new Conexion();
    try {
//        $qryId = "";
//        if($id != ""){
//            $qryId = " AND venta_id = $id";
//        }
//        $qryFolio = "";
//        if($folio != ""){
//            $qryFolio = " AND folio_codigo = $folio";
//        }
//        $qryEstado = " AND venta_estado = $estado";
        $query = "SELECT * FROM tbl_tarea";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
            echo "<td>".$row['tarea_id']."</td>";
            echo "<td><a href=\"javascript:void(0)\" onclick='abrirModificar(".$row['tarea_id'].")'>".$row['tarea_nombre']."</a></td>";
            echo "<td>".$row['tarea_descripcion']."</td>";
            echo "<td>".($row['tarea_status']=="0"?"Pendiente":"Finalizado")."</td>";
            echo "<td>".$row['tarea_fecha_creacion']."</td>";
            echo "<td><a href='javascript:void(0)' onclick='eliminarTarea(".$row['tarea_id'].")'>Eliminar</td>";
            echo "</tr>";
            $linea++;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
?>   