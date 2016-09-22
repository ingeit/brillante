$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "searchCompras/autocomplete",
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
                                    $("#stock").html("Stock Total: "+jsonResponse[index].stock);
                                    $("#stockDeposito").html("En Deposito: "+jsonResponse[index].stockDeposito);
                                    $("#stockLocal").html("En Local: "+jsonResponse[index].stockLocal);
                                }
                            });
                            $("#SelectCant").focus();
                        break;
                        case 8: //detecta el borrar
                            $("#stock").html(null);                 
                        break;
                    }
                });

                //Funcion para agregar una linea de compra
                $("#SelectCant").keyup(function (e){
                    realizarCompra(e);
                });

                function realizarCompra(e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            $("#stock").html(null);
                            id=$("#qId").val();
                            cant = $("#SelectCant").val();
                            if(cant <= 0){
                                alert("Debe ingresar una cantidad positiva");
                                break;
                            }   
                            if (id)
                            {
                                busqueda(id,cant);
                                $("#q").val(null);
                                $("#qId").val(null);
                                $("#SelectCant").val(null);
                                $("#q").focus();
                                $('#realizarCompra').prop('disabled', false);     
                            }
                            break;
                    }
                }

                function busqueda(id,cant)
                {  
                    $.each(jsonResponse, function(index) { //la variable value es el nombre
                        if(jsonResponse[index].idProducto === id){
                            var cantidad = parseFloat(cant);
                            importe = jsonResponse[index].precio*cantidad;
                            importe = importe.toFixed(2);
                            importe = parseFloat(importe);
                            
                            //solo para ver en la vista el signo pesos o dolar
                            var cotizacion;
                            if (jsonResponse[index].cotizacion === 'Dolares'){
                                cotizacion = '<font color="#04B431">u$s';
                            }else{
                                cotizacion = '<font>$';
                            }

                            $("#tablaCompras").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                "<tr>"+
                                    "<td>"+cantidad+"</td>"+
                                    "<td>"+id+"</td>"+
                                    "<td>"+jsonResponse[index].nombre+"</td>"+
                                    "<td>"+cotizacion+" "+jsonResponse[index].precio+"</font></td>"+
                                    "<td id='importe'>"+cotizacion+" "+importe+"</td>"+
                                    "<td><button class='btn btn-danger btn-sm' onclick='eliminarFila(this)'>Eliminar</button></td>"+
                                "</tr>"
                                );
                            $('#total').html((parseFloat($('#total').html())+importe).toFixed(2));
                        }
                    });
                }    
            }
        });
});


// el parametro obj que recibe, es el elemento que lo llama osea (this)
// etonces el elemento que lo llama mediante en el evento
// onclick, llama a la funcion eliminarFila(this)
// de esa manera identifico bien que lo esta llamando.
// y $(obj) al escibrilo de esa forma, lo coniverto en un objeto
// de jQuery y trabajo sobre el normalmente.
function eliminarFila(obj){   
//    $(obj).parents('tr').fadeOut('slow',function(){})
  $('#total').html(parseInt($('#total').html())-parseInt($(obj).parents('tr').find('#importe').html()));  
  $(obj).parents('tr').remove();
  desabilitarBoton();
}

function desabilitarBoton() {
    // Existen elementos?
    if($('#tablaCompras tr').length === 0)
    {
       $('#realizarCompra').prop('disabled', true);
    }
}

function cargarCompra(){ 
    var productos = [];
    $('#tablaCompras').children('tr').each(function( i, val) {
    cantidad = $(this).find('td').eq(0).html();
    id = $(this).find('td').eq(1).html();
    precio = $(this).find('td').eq(3).html();
      productos[i] = {"cantidad": cantidad,"id": id,"precio": precio};
    });
    var total = parseFloat($('#total').html());
    enviarCompra(productos,total);
}


function enviarCompra(produc,total)
    {
        $.ajax({ 
            type: "POST",
            url: "compras/realizarCompra",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {productosPOSTajax: produc,total: total},
            dataType: "html",
            success: function(data)
            {
                var jsonResponse = JSON.parse(data);
                codigo=jsonResponse[0]['codigo'];
                mensaje=jsonResponse[0]['mensaje'];
                $("#myModal").modal('show');
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
                $("#myModal").on('hidden.bs.modal', function () {
                    window.location.reload();
                });
            }
        });
    }

