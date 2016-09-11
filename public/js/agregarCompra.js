$(document).ready(function(){
    
    $("#q,#SelectCant").keydown(function (e){
        realizarCompra(e);
    });
        
    function realizarCompra(e){
        switch(e.which) 
        {
            case 13: //detecta el enter
                id=$("#qId").val();
                cant = $("#SelectCant").val();
                if(cant === ''){
                    cant = 1;
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
        $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
            type: "POST",
            url: "compras/agregar",// se fija esta ruta en ROUTES para ir al controller
            //envio token porque laravel lo obliga
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {consulta: id},
            dataType: "html",
            
            success: function(data)
                    {       
                        var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                            importe = jsonResponse.precio*cant;                            
                            importe = importe.toFixed(2);
                            importe = parseFloat(importe);
                            $("#tablaCompras").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                "<tr>"+
                                    "<td>"+cant+"</td>"+
                                    "<td>"+id+"</td>"+
                                    "<td>"+jsonResponse.nombre+"</td>"+
                                    "<td>$ "+jsonResponse.precio+"</td>"+
                                    "<td id='importe'>$ "+importe+"</td>"+
                                    "<td><button class='btn btn-danger btn-sm' onclick='eliminarFila(this)'>Eliminar</button></td>"+
                                "</tr>"
                                );
                            $('#total').html((parseFloat($('#total').html())+importe).toFixed(2));  
                    }
            });
    }    
});