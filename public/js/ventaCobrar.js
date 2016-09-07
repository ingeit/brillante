$(document).on("click", ".open-venta", function () {
     var idVenta = $(this).data('venta');
     var monto = $(this).data('monto');
     $(".modal-body p").html(idVenta);
     
     $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
        type: "POST",
        url: "ventas/cobrarModal",// se fija esta ruta en ROUTES para ir al controller
        //envio token porque laravel lo obliga
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {consulta: idVenta},
        dataType: "html",
//      error: function(){
//           alert("error petición ajax");
//      },
        //esto no se ejecuta hasta que data vaya a la consulta en el controlador a la DB y vuelva con resultados
        //recien ahi, se ejecuta success con los datos en DATA
        success: function(data){ // SUCCES nos va a servir para simplemente LISTAR PRODUCTOS, 
            var jsonResponse = JSON.parse(data); //parseo la busqueda
            console.log(jsonResponse);
            //comprobamos si se pulsa una tecla
              
        }
    });
    
});

