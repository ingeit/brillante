$(document).ready(function(){
    
    $("#q").keydown(function (e){
        switch(e.which) 
        {
            case 13: //detecta el enter
                id=$("#qId").val();
                if (id)
                {
                    busqueda(id);
                    $("#q").val(null);
                    $("#qId").val(null);
                    $('#realizarVenta').prop('disabled', false);     
                }
                break;
                
        }
    });
    
   
    
    function busqueda(id)
    {
        $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
            type: "POST",
            url: "ventas/agregar",// se fija esta ruta en ROUTES para ir al controller
            //envio token porque laravel lo obliga
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {consulta: id},
            dataType: "html",
            
            success: function(data)
                    {       
                        var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                            $("#tablaVentas").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                "<tr>"+
                                    "<td>"+jsonResponse.nombre+"</td>"+
                                    "<td>"+jsonResponse.precio+"</td>"+
                                    "<td><button class='btn btn-danger btn-sm' onclick='eliminarFila(this)'>Eliminar</button></td>"+
                                "</tr>"
                                );
                    }
            });
    }    
});
