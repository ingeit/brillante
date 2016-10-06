function iniciar(){
    $.ajax({
        type: "GET",
        url: "searchIngresos/autocomplete",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        //la variable que va a la consulta se llama term, emulando la consulta
        // GET que hace el jQuery cuando busca, va vacia porque quiero todos
        // los productos
        data: {term: ''},
        dataType: "html",
        success: function(data) //cuando finaliza la consulta
            { 
                //Function para autoCompletar el campo de busqueda
                var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                var productos = []; //creo el array de productos que le voy a dar a autocomplete()
                $.each(jsonResponse, function(index) { //la variable value es el nombre
                        productos.push({value:jsonResponse[index].nombre,id:jsonResponse[index].idProducto});
                });
                // llamo la funcion autocomplete
                $( "#q" ).autocomplete({ //Tomo el input de id = q y uso la funcion ya definida por jQuery
                    source: productos, //array creado arriba, ya no mas busqueda todo el tiempo
                    minLength: 1,     //caracter minimo para empezar a autocompletar
                    cacheLength: 0, //evita que se guarde el cache
                    delay: 0,
                    select: function(event, ui) {
                          $('#q').val(ui.item.value);
                          $('#qId').val(ui.item.id);
                    }
                });

                //Al apretar enter con el nombre del producto saltamos a cantidad
                $("#q").keyup(function (e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            //muestro el stock y despues salto a FOCUS EN CANTIDAD
                            //la variable value es el nombre
                            var id = $('#qId').val();
                            $.each(jsonResponse, function(index) { //la variable value es el nombre
                                if(id === jsonResponse[index].idProducto)
                                {
                                    $('#stockContainer').empty();
                                    $("#stockContainer").append(
                                        "<p>Stock Total: "+jsonResponse[index].stock+"</p>"+
                                        "<p>Stock Deposito: "+jsonResponse[index].stockDeposito+"</p>"+
                                        "<p>Stock Local: "+jsonResponse[index].stockLocal+"</p>"
                                    );
                                }
                            });
                            $("#SelectCant").focus();
                        break;
                        case 8: //detecta el borrar
                            $("#stock").html(null);                 
                        break;
                    }
                });

                //Funcion para agregar una linea de ingreso
                $("#SelectCant").keyup(function (e){
                    realizarIngreso(e);
                });

                function realizarIngreso(e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            $("#stock").html(null);
                            id=$("#qId").val();
                            cant = $("#SelectCant").val();
                            if(cant === ''){
                                cant = 1;
                            } 
                            if(cant <= 0){
                                codigo = 0;
                                mensaje = "Debe ingresar una cantidad positiva";
                                $("#SelectCant").val(null);
                                mostrarMensaje(codigo,mensaje);
                                break;
                            }   
                            if (id)
                            {
                                busqueda(id,cant);
                                $("#q").val(null);
                                $("#qId").val(null);
                                $("#SelectCant").val(null);
                                $("#q").focus();
                                $('#realizarIngreso').prop('disabled', false);     
                            }
                            break;
                    }
                }

                function busqueda(id,cant)
                {  
                    $.each(jsonResponse, function(index) { //la variable value es el nombre
                        if(jsonResponse[index].idProducto === id){
                            var cantidad = parseFloat(cant);
                            if(jsonResponse[index].stockDeposito < cantidad){
                                codigo = 0;
                                mensaje = "No dispone de suficiente Stock";
                                mostrarMensaje(codigo,mensaje);
                                return;
                            }else{
                                $("#tablaIngresos").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                    "<tr>"+
                                        "<td>"+cantidad+"</td>"+
                                        "<td>"+id+"</td>"+
                                        "<td>"+jsonResponse[index].nombre+"</td>"+
                                        "<td><button class='btn btn-danger btn-sm' onclick='eliminarFila(this)'>Eliminar</button></td>"+
                                    "</tr>"
                                    );
                                }
                            $('#stockContainer').empty();
                        }
                    });
                }    
            }
        });
};


// el parametro obj que recibe, es el elemento que lo llama osea (this)
// etonces el elemento que lo llama mediante en el evento
// onclick, llama a la funcion eliminarFila(this)
// de esa manera identifico bien que lo esta llamando.
// y $(obj) al escibrilo de esa forma, lo coniverto en un objeto
// de jQuery y trabajo sobre el normalmente.
function eliminarFila(obj){   
//    $(obj).parents('tr').fadeOut('slow',function(){})
  $(obj).parents('tr').remove();
  desabilitarBoton();
}

function desabilitarBoton() {
    // Existen elementos?
    if($('#tablaIngresos tr').length === 0)
    {
       $('#realizarIngreso').prop('disabled', true);
    }
}

function cargarIngreso(){ 
    var productos = [];
    //deshabilitamos el boton "realizarIngreso" para que con el ENTER en modal no siga generando mas ingreso
    $('#realizarIngreso').prop('disabled', true);
    $('#tablaIngresos').children('tr').each(function( i, val) {
    cantidad = $(this).find('td').eq(0).html();
    id = $(this).find('td').eq(1).html();
      productos[i] = {"cantidad": cantidad,"id": id};
    });
    enviarIngreso(productos);
}


function enviarIngreso(produc)
    {
        $.ajax({ 
            type: "POST",
            url: "ingresos/realizarIngreso",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {productosPOSTajax: produc},
            dataType: "html",
            success: function(data)
            {
                var jsonResponse = JSON.parse(data);
                codigo=jsonResponse[0]['codigo'];
                mensaje=jsonResponse[0]['mensaje'];
                mostrarMensaje(codigo,mensaje);
                $("#myModal").on('hidden.bs.modal', function () {
                    $("#tablaIngresos").empty();
                    $("#q").focus();
                      iniciar();
                });
            }
        });
    }
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

function ingresoEliminar(obj){
    /* Ventana de cuadro de confirmacion para eliminar */
    //traigo el id de venta a eliminar para la funcion confirmarEliminar
    var idIngreso = $(obj).data('idingreso');
    $("#myModal").modal('show'); 
    $("#mensajeModal").empty();
    $("#tituloModal").empty();
    
    $("#botonModal").empty();
    $("#tituloModal").append(
        "<div class='alert alert-danger'>ELIMINAR</div>" 
    );
    $("#mensajeModal").append(
        "<p>¿Esta seguro que desea eliminar el ingreso seleccionada?</p>" 
    );
    $("#botonModal").append(
        "<a class='btn btn-danger' onclick='confirmarEliminar("+idIngreso+")'>Eliminar</a>"+
        "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"
    );
}

function confirmarEliminar(idIngreso){
    $.ajax({ 
        type: "POST",
        url: "ingresos/eliminarIngreso",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {idIngreso: idIngreso},
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