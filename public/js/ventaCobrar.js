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
            $("#botonCobrar").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                  "<a href=href='ventas/cobrar/"+idVenta+"' type='button' 'method'='get' class='btn btn-success' >Cobrar</a>"
                );
                    
            
            var venta = JSON.parse(data);  //parse convierte la consulta (data) en un array
              //  importe = jsonResponse.precio*cant
              $("#listaModal").empty(); // resultado hace referencia a la tabla <tbody> LISTAR de los productos, 
              var total = 0; 
              var subtotal;
              $.each(venta, function(index) {
                    subtotal = venta[index].cantidad*venta[index].precio;
                    total = total + subtotal;
                    $("#listaModal").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                        "<li class='list-group-item'>"+venta[index].cantidad+" x "+venta[index].nombre+" = $ "+subtotal+"</li>"
                    );
              });
              $("#listaModalTotal").empty();
              $("#listaModalTotal").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                        "<li class='list-group-item'>TOTAL: $ "+total+"</li>"
                );
                $("#pago").empty();
                $("#pago").keyup(function (e){
                    vuelto(e);
                });
                
                    function vuelto(e){ 
                        $("#pago").keydown(function (e){  //para deshabilitar el ENTER o hacer alguna accion!!!
                                var enter = e.keyCode || e.which;
                                if (enter === 13) { 
                                  e.preventDefault();
                                  return false;
                                }
                             });
                        var pago=0;
                        pago=$("#pago").val();
                        
                        if(pago <= total){
                            $("#vuelto").empty();
                        }else{
                            v = pago - total;
                            $("#vuelto").empty();
                            $("#vuelto").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                        "<li class='list-group-item'>VUELTO:$ "+v+"</li>"
                                    );     
                        }
                    }
                
                

        }
    });
    
});

