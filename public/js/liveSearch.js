$(document).ready(function(){ //$(document) toma la pagina entera como variable y le dice que cuando este listo haga cosas
                                
        var consulta; //asi se definen variable en js
                                                                                                                                                      
        //comprobamos si se pulsa una tecla
        $("#q").keyup(function(e){ // #q se refiere al ID 'q' del form input en index
            
              //obtenemos el texto introducido en el campo de búsqueda
              prdocutoBuscado = $("#q").val();
                                                    
              //hace la búsqueda
              $.ajax({ //defino el formato de AJAX: type, url, headers, data, success
                    type: "POST",
                    url: "productos/filtrado",// se fija esta ruta en ROUTES para ir al controller
                    //envio token porque laravel lo obliga
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {consulta: prdocutoBuscado},
                    dataType: "html",
//                    error: function(){
//                          alert("error petición ajax");
//                    },
                    //esto no se ejecuta hasta que data vaya a la consulta en el controlador a la DB y vuelva con resultados
                    //recien ahi, se ejecuta success con los datos en DATA
                    success: function(data){ // SUCCES nos va a servir para simplemente borrar la LISTA PRODUCTOS, 
                                             //y armar la propia con la consulta caracter a caracter 
                           var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                          $("#resultado").empty(); // resultado hace referencia a la tabla <tbody> LISTAR de los productos, 
                                                   //con empty borramos la tabla lista para generar una nueva con las coincidencias
                           $.each(jsonResponse, function(index) {
                               $("#resultado").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                       "<tr>"+
                                        "<td>"+jsonResponse[index].nombre+"</td>"+
                                        "<td>"+jsonResponse[index].precio+"</td>"+
                                        "</tr>"
                                       );
                            });
                            
                    }
              });                                                                
        });                                                          
});
