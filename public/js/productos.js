$(document).ready(function(){ //$(document) toma la pagina entera como variable y le dice que cuando este listo haga cosas
    //hace la búsqueda
    $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
        type: "POST",
        url: "productos/filtrado",// se fija esta ruta en ROUTES para ir al controller
        //envio token porque laravel lo obliga
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {consulta: ''},
        dataType: "html",
//      error: function(){
//           alert("error petición ajax");
//      },
        //esto no se ejecuta hasta que data vaya a la consulta en el controlador a la DB y vuelva con resultados
        //recien ahi, se ejecuta success con los datos en DATA
        success: function(data){ // SUCCES nos va a servir para simplemente LISTAR PRODUCTOS,
            var producto = JSON.parse(data); //parseo la busqueda
            //comprobamos si se pulsa una tecla
            $("#q").keyup(function(e){ // #q se refiere al ID 'q' del form input en index
                var productoBuscado = $("#q").val(); 
                var cadena = new RegExp(productoBuscado,"i"); //RegExp simula en LIKE % en la BD y el i es el metodo de busqueda
                $("#resultado").empty(); //borramos la lista de productos
                $.each(producto, function(index) {
                    if(producto[index].cotizacion === 'Dolares'){
                        var signo = "u$s";
                    }else {
                        var signo = "$";
                    }
                    if (producto[index].nombre.search(cadena) !== -1) { // v es cada elemento de json
                        if(producto['rol'] === 'admin'){
                            $("#resultado").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                            "<tr>"+
                                "<td>"+producto[index].nombre+"</td>"+
                                (producto[index].cotizacion === 'Dolares' ? "<td><font color='#04B431'>"+signo+" "+producto[index].precio+"<font></td>" : "<td>"+signo+" "+producto[index].precio+"</td>")+
                                "<td>% "+producto[index].ganancia+"</td>"+
                                "<td>$ "+producto[index].precioVenta+"</td>"+
                                "<td>"+producto[index].stock+"</td>"+
                                "<td>"+producto[index].stockDeposito+"</td>"+
                                "<td>"+producto[index].stockLocal+"</td>"+
                                "<td><a style='float:left;' href='productos/"+producto[index].idProducto+"/edit'>Editar</a></td>"+
                                "<td><button style='float:right' class='btn btn-danger btn-sm' onclick='productoEliminar(this)' data-idproducto='"+producto[index].idProducto+"' >Eliminar</button></td>"+
                            "</tr>"
                            );
                        }else{
                           $("#resultado").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                            "<tr>"+
                                "<td>"+producto[index].nombre+"</td>"+
                                "<td>$ "+producto[index].precioVenta+"</td>"+
                                "<td>"+producto[index].stock+"</td>"+
                                "<td>"+producto[index].stockDeposito+"</td>"+
                                "<td>"+producto[index].stockLocal+"</td>"+
                            "</tr>"
                            ); 
                        }
                    }     
                });       
            });   
        }
    });                                                    
});

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

function productoEliminar(obj){
    /* Ventana de cuadro de confirmacion para eliminar */
    //traigo el id de venta a eliminar para la funcion confirmarEliminar
    var idProducto = $(obj).data('idproducto');
    $("#myModal").modal('show'); 
    $("#mensajeModal").empty();
    $("#tituloModal").empty();
    
    $("#botonModal").empty();
    $("#tituloModal").append(
        "<div class='alert alert-danger'>ELIMINAR</div>" 
    );
    $("#mensajeModal").append(
        "<p>¿Esta seguro que desea eliminar el producto seleccionado?</p>" 
    );
    $("#botonModal").append(
        "<a class='btn btn-danger' onclick='confirmarEliminar("+idProducto+")'>Eliminar</a>"+
        "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"
    );
}

function confirmarEliminar(idProducto){
    $.ajax({ 
        type: "POST",
        url: "productos/eliminarProducto",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {idProducto: idProducto},
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
