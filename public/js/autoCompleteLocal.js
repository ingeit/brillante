$(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "search/autocomplete",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            //la variable que va a la consulta se llama term, emulando la consulta
            // GET que hace el jQuery cuando busca, va vacia porque quiero todos
            // los productos
            data: {term: ''},
            dataType: "html",
            success: function(data) //cuando finaliza la consulta
                    {
                        var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                        var productos = []; //creo el array de productos que le voy a dar a autocomplete()
                        $.each(jsonResponse, function(index) { //la variable value es el nombre
                                productos.push({value:jsonResponse[index].value,id:jsonResponse[index].id});
                        });
                        // llamo la funcion autocomplete
                        $( "#q" ).autocomplete({ //Tomo el input de id = q y uso la funcion ya definida por jQuery
                            source: productos, //array creado arriba, ya no mas busqueda todo el tiempo
                            minLength: 1,     //caracter minimo para empezar a autocompletar
                            cacheLength: 0, //evita que se guarde el cache
                            delay: 0,
                            select: function(event, ui) {
                                  $('#q').val(ui.item.value);
                                  $('#qId').val(ui.item.id);
                            }
                        });
                    }
            });
});

