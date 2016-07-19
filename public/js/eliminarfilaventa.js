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
    if($('#tablaVentas tr').length === 0)
    {
       $('#realizarVenta').prop('disabled', true);
    }
}

function cargarVenta(){ 
    var productos = [];
  $('#tablaVentas').children('tr').each(function( i, val) {
    cantidad = $(this).find('td').eq(0).html();
    id = $(this).find('td').eq(1).html();
    productos[i] = {"cantidad": cantidad,"id": id};
    });
    var total = parseFloat($('#total').html());
    enviarVenta(productos,total);
}


function enviarVenta(produc,total)
    {
        $.ajax({ 
            type: "POST",
            url: "ventas/realizarVenta",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {productosPOSTajax: produc,total: total},
            dataType: "html",
            success: function(data)
                    {       
                    $("#tablaVentas").empty();
                    $('#total').html(0);
                    $("#q").focus();
                    $('#realizarVenta').prop('disabled', true);   
                    $("#myModal").modal('show');
                    }
            });
    }   
