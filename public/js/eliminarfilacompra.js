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
    productos[i] = {"cantidad": cantidad,"id": id};
    });
    var total = parseFloat($('#total').html());
    var idProveedor = parseFloat($('#idProveedor').html());
    enviarCompra(productos,total,idProveedor);
}


function enviarCompra(produc,total,idProveedor)
    {
        $.ajax({ 
            type: "POST",
            url: "compras/realizarCompra",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {productosPOSTajax: produc,total: total, idProveedor: idProveedor},
            dataType: "html",
            success: function(data)
                    {       
                    $("#tablaCompras").empty();
                    $('#total').html(0);
                    $("#q").focus();
                    $('#realizarCompra').prop('disabled', true);   
                    $("#myModal").modal('show');
                    }
            });
    }   