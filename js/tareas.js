/* global alertify */

var accion = 'agregar';
$(document).ready(()=>{
    cargarTareas();
    
//    $("#enlaceBuscar").click(function(){
//        cargarVentas();
//    });
    $("#agregar").click(()=>{
        if(accion === 'agregar'){
            agregarTarea();
        }
        else{
            modificarTarea();
        }
    });
    $("#cancelar").click(()=>{
        reset();
    });
});



    function cargarTareas(){
        var url = "source/util/obtenerTareas.php";
        $("#tabla_ventas tbody").html("");
        var params = {idventa : $("#id").val(),folio : $("#folio").val(),
        desde : $("#desde").val(),hasta : $("#hasta").val(),estado : $("#estado").val()};
        var success = function(response)
        {
            $("#tabla_ventas tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    function agregarTarea(){
        if(!validarCamposOr([$("#nombre").val(),$("#descripcion").val()])){
            alertify.error("Ingrese todos los campos necesarios");
            return;
        }
        var url = "source/httprequest/tarea/AddTarea.php";
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var status = $("#status").val();
        var params = {nombre : nombre, descripcion : descripcion, status: status};
        var success = function(response)
        {
            reset();
            cargarTareas();
            alertify.success("Nota agregada");
        };
        postRequest(url,params,success);
    }
    
    function abrirModificar(id){
        accion = 'modificar';
        var url = "source/httprequest/tarea/GetTarea.php";
        var params = {id : id};
        var success = function(response)
        {
            $("#cancelar").css("visibility","visible");
            $("#agregar").text("Modificar");
            $("#id").val(response.id);
            $("#nombre").val(response.nombre);
            $("#descripcion").val(response.descripcion);
            $("#status").val(response.status);
            
        };
        postRequest(url,params,success);
        
    }
    
    function modificarTarea(){
        if(!validarCamposOr([$("#nombre").val(),$("#descripcion").val()])){
            alertify.error("Ingrese todos los campos necesarios");
            return;
        }
        var url = "source/httprequest/tarea/ModTarea.php";
        var id = $("#id").val();
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var status = $("#status").val();
        var params = {id : id ,nombre : nombre, descripcion : descripcion, status: status};
        var success = function(response)
        {
            reset();
            cargarTareas();
            alertify.success("Nota modificada");
        };
        postRequest(url,params,success);
    }
    
    function eliminarTarea(id){
        var url = "source/httprequest/tarea/DelTarea.php";
        var params = {id : id};
        var success = function(response)
        {
            cargarTareas();
            alertify.success("Nota eliminada");
        };
        postRequest(url,params,success);
    }
    
    function reset(){
        accion = 'agregar';
        $("#cancelar").css("visibility","hidden");
        $("#agregar").text("Agregar");
        $("#id").val("");
        $("#nombre").val("");
        $("#descripcion").val("");
        $("#status").val("0");
    }
