function mostrarMensaje(codigo,mensaje){
    $("#myModal").modal('show');
    $("#mensajeModal").empty();
    $("#tituloModal").empty();
    if(codigo == 0)
    {
        $("#tituloModal").append(
            "<div class='alert alert-danger'>ERROR</div>" 
        );
        $("#mensajeModal").append(
            "<p>"+mensaje+"</p>" 
        );
    }else{
        $("#tituloModal").append(
            "<div class='alert alert-success'>CORRECTO</div>" 
        );
        $("#mensajeModal").append(
            "<p>"+mensaje+"</p>" 
        );
    }
    $("#botonModal").empty();
    $("#botonModal").append(
        "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>"
    );
}

function proveedorEliminar(obj){
    /* Ventana de cuadro de confirmacion para eliminar */
    //traigo el id de venta a eliminar para la funcion confirmarEliminar
    var idProveedor = $(obj).data('idproveedor');
    $("#myModal").modal('show'); 
    $("#mensajeModal").empty();
    $("#tituloModal").empty();
    
    $("#botonModal").empty();
    $("#tituloModal").append(
        "<div class='alert alert-danger'>ELIMINAR</div>" 
    );
    $("#mensajeModal").append(
        "<p>¿Esta seguro que desea eliminar el proveedor seleccionado?</p>" 
    );
    $("#botonModal").append(
        "<a class='btn btn-danger' onclick='confirmarEliminar("+idProveedor+")'>Eliminar</a>"+
        "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"
    );
}

function confirmarEliminar(idProveedor){
    $.ajax({ 
        type: "POST",
        url: "proveedores/eliminarProveedor",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {idProveedor: idProveedor},
        dataType: "html",
        success: function(data)
        {
            var jsonResponse = JSON.parse(data);
            codigo=jsonResponse[0]['codigo'];
            mensaje=jsonResponse[0]['mensaje'];
            mostrarMensaje(codigo,mensaje);
            $('#myModal').on('hidden.bs.modal', function () {
                location.reload();
            });
        }
    });
}
