$(document).on("click", ".open-venta", function () {
    var idVenta = $(this).data('venta');
    var monto = $(this).data('monto');

    
//    $(".form-group #pago").focus();
    $("#pago").val('');
    
    $("#vuelto").empty();
    $("#listaModal").empty(); // resultado hace referencia a la tabla <tbody> LISTAR de los productos, 
    
    $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
        type: "POST",
        url: "ventas/cobrarModal",// se fija esta ruta en ROUTES para ir al controller
        //envio token porque laravel lo obliga
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {consulta: idVenta},
        dataType: "html",
        success: function(data){ // SUCCES nos va a servir para simplemente LISTAR PRODUCTOS,   
            
            $('#botonCobrar').data('idventa',idVenta);//Setea el id del boton cobrar con el id de venta a cobrar
            
            var venta = JSON.parse(data);  //parse convierte la consulta (data) en un array
            var t = 0; 
            var total;
            var subtotal;
            $.each(venta, function(index) {
                  var st = venta[index].cantidad*venta[index].precio;
                      subtotal = (st).toFixed(2);
                  t = t + st;
                      total = (t).toFixed(2);

                  $("#listaModal").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                      "<li class='list-group-item'>"+venta[index].cantidad+" x "+venta[index].nombre+" = $ "+subtotal+"</li>"
                  );
            });

            $("#listaModalTotal span").empty();
            $("#listaModalTotal span").html(total);
              
            
            $("#pago").keyup(function (e){
                vuelto(e);
            });
                
            function vuelto(e){ 
                var pago=0;
                pago=parseFloat($("#pago").val());
                
                if(pago <= total){
                    $("#vuelto").empty();
                }else{
                    v = pago - total;
                    vuelto = (v).toFixed(2);
                    $("#vuelto").html("VUELTO:$ "+vuelto);     
                }
            }
        }
    });
});

function cobrar(obj){
    $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
        type: "POST",
        url: "ventas/cobrar",// se fija esta ruta en ROUTES para ir al controller
        //envio token porque laravel lo obliga
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {idVenta: $(obj).data('idventa')},
        dataType: "html",
        success: function(data){
            $("#myModal").modal('toggle');
            var id = $(obj).data('idventa');
            var esImpaga =  '#esImpaga'+id;
            $(esImpaga).hide();
        }
    });
}

