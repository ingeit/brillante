$(document).ready(function(){ //$(document) toma la pagina entera como variable y le dice que cuando este listo haga cosas
    //hace la búsqueda
    $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
        type: "POST",
        url: "productos/filtrado",// se fija esta ruta en ROUTES para ir al controller
        //envio token porque laravel lo obliga
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {consulta: ''},
        dataType: "html",
//      error: function(){
//           alert("error petición ajax");
//      },
        //esto no se ejecuta hasta que data vaya a la consulta en el controlador a la DB y vuelva con resultados
        //recien ahi, se ejecuta success con los datos en DATA
        success: function(data){ // SUCCES nos va a servir para simplemente LISTAR PRODUCTOS, 
            var jsonResponse = JSON.parse(data); //parseo la busqueda
            //
            //comprobamos si se pulsa una tecla
            $("#q").keyup(function(e){ // #q se refiere al ID 'q' del form input en index
                var productoBuscado = $("#q").val(); 
                var cadena = new RegExp(productoBuscado,"i"); //RegExp simula en LIKE % en la BD y el i es el metodo de busqueda
                $("#resultado").empty(); //borramos la lista de productos
                $.each(jsonResponse, function(i, v) {
                    if (v.nombre.search(cadena) !== -1) { // v es cada elemento de json
                        $("#resultado").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                        "<tr>"+
                            "<td>"+v.nombre+"</td>"+
                            "<td>"+v.precio+"</td>"+
                            "<td>"+v.PrecioVenta+"</td>"+
                            "<td>"+v.cotizacion+"</td>"+
                            "<td>"+v.stock+"</td>"+
                            "<td>"+v.stockDeposito+"</td>"+
                            "<td>"+v.stockLocal+"</td>"+
                            "<td><a style='float:left;' href='productos/"+v.idProducto+"/edit'>Editar</a></td>"+
                        "</tr>"
                        );
                    }     
                });       
            });   
        }
    });                                                    
});
