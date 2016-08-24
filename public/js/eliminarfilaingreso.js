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
    if($('#tablaIngresos tr').length === 0)
    {
       $('#tablaIngresos').prop('disabled', true);
    }
}

function cargarIngreso(){ 
    var productos = [];
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
                    $("#tablaIngresos").empty();
                    $("#q").focus();
                    $('#realizarIngreso').prop('disabled', true);   
                    $("#myModal").modal('show');
                    }
            });
    }