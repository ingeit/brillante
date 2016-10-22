function iniciar(){
$.ajax({
        type: "GET",
        url: "searchPerdidas/autocomplete",
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
                //Function para autoCompletar el campo de busqueda
                var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                var productos = []; //creo el array de productos que le voy a dar a autocomplete()
                $.each(jsonResponse, function(index) { //la variable value es el nombre
                        productos.push({value:jsonResponse[index].nombre,id:jsonResponse[index].idProducto});
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

                //Al apretar enter con el nombre del producto saltamos a cantidad
                $("#q").keyup(function (e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            //muestro el stock y despues salto a FOCUS EN CANTIDAD
                            //la variable value es el nombre
                            var id = $('#qId').val();
                            $.each(jsonResponse, function(index) { //la variable value es el nombre
                                if(id === jsonResponse[index].idProducto)
                                {
                                    var productosStocks = [];
                                    productosStocks = controlStock(jsonResponse[index]);
                                    
                                    $('#stockContainer').empty();
                                    $("#stockContainer").append(
                                        "<p>Stock Total: <span>"+productosStocks[0]+"</span></p>"+
                                        "<p>Stock Deposito: <span>"+productosStocks[1]+"</span></p>"+
                                        "<p>Stock Local: <span>"+productosStocks[2]+"</span></p>"
                                    );
                                }
                            });
                            $("#SelectCant").focus();
                        break;
                        case 8: //detecta el borrar
                            $("#stock").html(null);                 
                        break;
                    }
                });

                //Funcion para agregar una linea de perdida
                $("#SelectCant").keyup(function (e){
                    realizarPerdida(e);
                });

                function realizarPerdida(e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            $("#stock").html(null);
                            id=$("#qId").val();
                            cant = $("#SelectCant").val();
                            if(cant === ''){
                                cant = 1;
                            } 
                            if(cant <= 0){
                                codigo = 0;
                                mensaje = "Debe ingresar una cantidad positiva";
                                $("#SelectCant").val(null);
                                mostrarMensaje(codigo,mensaje);
                                break;
                            }   
                            if (id)
                            {
                                busqueda(id,cant);
                                $("#q").val(null);
                                $("#qId").val(null);
                                $("#SelectCant").val(null);
                                $("#q").focus();
                                $('#realizarPerdida').prop('disabled', false);     
                            }
                            break;    
                    }
                }

                function busqueda(id,cant)
                {  
                    $.each(jsonResponse, function(index) { //busco en mi array local, (jsonResponse tabla productos) mi producto ingresado en el input
                                                           //por ID, para completar los campos en la tabla de perdida.
                        if(jsonResponse[index].idProducto === id){//por eso esto.   
                            
                            //controlo que cantidad no supere el stock disponible
                            //despues en el append controlo especificamente STOCKLOCAL Y DEPOSITO
                            var cantidad = parseInt(cant);
                            
                            var auxStock = parseInt($("#stockContainer").find('p span:eq(0)').html());
                            var auxStockDeposito = parseInt($("#stockContainer").find('p span:eq(1)').html());
                            var auxStockLocal = parseInt($("#stockContainer").find('p span:eq(2)').html());

                            if (cantidad <= auxStock )
                            {
                                //CONTROLO que CANTIDAD no supere los STOCKS INDIVIDUALES!
                                if((auxStockLocal - cantidad) < 0)
                                { 
                                    if((auxStockDeposito - cantidad) < 0)
                                    {
                                        codigo = 0;
                                        mensaje = "No llega con el stock individual";
                                        $("#SelectCant").val(null);
                                        $('#stockContainer').empty();
                                        mostrarMensaje(codigo,mensaje);
                                        return;
                                    }
                                    else{
                                        agregarLineas(auxStockDeposito,auxStockLocal);
                                    }      
                                }
                                else{
                                    agregarLineas(auxStockDeposito,auxStockLocal);
                                }    
                            }
                            else{
                                codigo = 0;
                                mensaje = "Stock no disponible";
                                $("#SelectCant").val(null);
                                $('#stockContainer').empty();
                                mostrarMensaje(codigo,mensaje);
                                return;
                            }
                            
                            function agregarLineas(auxStockDeposito,auxStockLocal){
                                
                                $("#tablaPerdidas").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                    "<tr>"+
                                        "<td>"+cantidad+"</td>"+
                                        "<td>"+id+"</td>"+
                                        "<td>"+jsonResponse[index].nombre+"</td>"+
                                        //Control para el stockLocal en perdida
                                        //sintaxis: HTML+( control logico ? true : false )+HTML
                                        //CUIDADO, lo hice con un IF ELSE IF...
                                            (cantidad > auxStockLocal ? 
                                                (cantidad > auxStockDeposito ?
                                                    "<td><select class='form-control'><option value='local' disabled>Sin Stock Local</option><option value='deposito' disabled>Sin Stock Deposito</option></select></td>"
                                                    : "<td><select class='form-control'><option value='local' disabled>Sin Stock Local</option><option value='deposito'>Deposito</option></select></td>")
                                            : (cantidad > auxStockDeposito ?
                                                    "<td><select class='form-control'><option value='local'>Local</option><option value='deposito' disabled>Sin Stock Deposito</option></select></td>"
                                                    : "<td><select class='form-control'><option value='local'>Local</option><option value='deposito'>Deposito</option></select></td>"))+
                                        "<td><button class='btn btn-danger btn-sm' onclick='eliminarFilaPerdida(this)'>Eliminar</button></td>"+
                                    "</tr>"
                                    );
                                $('#stockContainer').empty();
                            }
                        }
                    });
                }    
            }
        });
        
        $.ajax({
        type: "GET",
        url: "searchTransformacion/autocomplete",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        //la variable que va a la consulta se llama term, emulando la consulta
        // GET que hace el jQuery cuando busca, va vacia porque quiero todos
        // los productos
        data: {term2: ''},
        dataType: "html",
        success: function(data) //cuando finaliza la consulta
            { 
                //Function para autoCompletar el campo de busqueda
                var jsonResponse = JSON.parse(data);  //parse convierte la consulta (data) en un array
                var productos = []; //creo el array de productos que le voy a dar a autocomplete()
                $.each(jsonResponse, function(index) { //la variable value es el nombre
                        productos.push({value:jsonResponse[index].nombre,id:jsonResponse[index].idProducto});
                });
                // llamo la funcion autocomplete
                $( "#q2" ).autocomplete({ //Tomo el input de id = q y uso la funcion ya definida por jQuery
                    source: productos, //array creado arriba, ya no mas busqueda todo el tiempo
                    minLength: 1,     //caracter minimo para empezar a autocompletar
                    cacheLength: 0, //evita que se guarde el cache
                    delay: 0,
                    select: function(event, ui) {
                          $('#q2').val(ui.item.value);
                          $('#qId2').val(ui.item.id);
                    }
                });

                //Al apretar enter con el nombre del producto saltamos a cantidad
                $("#q2").keyup(function (e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            //muestro el stock y despues salto a FOCUS EN CANTIDAD
                            //la variable value es el nombre
                            var id = $('#qId2').val();
                            $.each(jsonResponse, function(index) { //la variable value es el nombre
                                if(id === jsonResponse[index].idProducto)
                                {
                                    var productosStocks = [];
                                    productosStocks = controlStock(jsonResponse[index]);
                                    
                                    $('#stockContainer2').empty();
                                    $("#stockContainer2").append(
                                        "<p>Stock Total: <span>"+productosStocks[0]+"</span></p>"+
                                        "<p>Stock Deposito: <span>"+productosStocks[1]+"</span></p>"+
                                        "<p>Stock Local: <span>"+productosStocks[2]+"</span></p>"
                                    );
                                }
                            });
                            $("#SelectCant2").focus();
                        break;
                        case 8: //detecta el borrar
                            $("#stock").html(null);                 
                        break;
                    }
                });

                //Funcion para agregar una linea de perdida
                $("#SelectCant2").keyup(function (e){
                    realizarTransformacion(e);
                });

                function realizarTransformacion(e){
                    switch(e.which) 
                    {
                        case 13: //detecta el enter
                            $("#stock").html(null);
                            id=$("#qId2").val();
                            cant = $("#SelectCant2").val();
                            if(cant === ''){
                                cant = 1;
                            } 
                            if(cant <= 0){
                                codigo = 0;
                                mensaje = "Debe ingresar una cantidad positiva";
                                $("#SelectCant2").val(null);
                                mostrarMensaje(codigo,mensaje);
                                break;
                            }   
                            if (id)
                            {
                                busqueda(id,cant);
                                $("#q2").val(null);
                                $("#qId2").val(null);
                                $("#SelectCant2").val(null);
                                $("#q2").focus();
                                $('#realizarTransformacion').prop('disabled', false);     
                            }
                            break;    
                    }
                }

                function busqueda(id,cant)
                {  
                    $.each(jsonResponse, function(index) { //busco en mi array local, (jsonResponse tabla productos) mi producto ingresado en el input
                                                           //por ID, para completar los campos en la tabla de perdida.
                        if(jsonResponse[index].idProducto === id){//por eso esto.   
                            
                            //controlo que cantidad no supere el stock disponible
                            //despues en el append controlo especificamente STOCKLOCAL Y DEPOSITO
                            var cantidad = parseInt(cant);
                                
                                $("#tablaTransformaciones").append( // append modifica el DOM (el esqueleto html, en nuestro caso, la tabla LISTA PRODCUTOS)
                                    "<tr>"+
                                        "<td>"+cantidad+"</td>"+
                                        "<td>"+id+"</td>"+
                                        "<td>"+jsonResponse[index].nombre+"</td>"+
                                     
                                        "<td><button class='btn btn-danger btn-sm' onclick='eliminarFila(this)'>Eliminar</button></td>"+
                                    "</tr>"
                                    );
                                $('#stockContainer2').empty();
                            }
                        
                    });
                }    
            }
        });
        
};

// el parametro obj que recibe, es el elemento que lo llama osea (this)
// etonces el elemento que lo llama mediante en el evento
// onclick, llama a la funcion eliminarFila(this)
// de esa manera identifico bien que lo esta llamando.
// y $(obj) al escibrilo de esa forma, lo coniverto en un objeto
// de jQuery y trabajo sobre el normalmente.
function eliminarFila(obj){   
//    $(obj).parents('tr').fadeOut('slow',function(){})
$(obj).parents('tr').remove();
desabilitarBoton();
}

function desabilitarBoton() {
// Existen elementos?
if($('#tablaTransformaciones tr').length === 0)
{
   $('#realizarTransformacion').prop('disabled', true);
}
}

function cargarTransformacion(){ 
var productosTransformacion = [];
var productosPerdida = [];
//deshabilitamos el boton "realizarPerdida" para que con el ENTER en modal no siga generando mas perdidas
$('#realizarTransformacion').prop('disabled', true);
productosTransformacion = transformacionParcial();
productosPerdida = perdidaParcial();
enviarTransformacion(productosTransformacion,productosPerdida);
}


function transformacionParcial(){
var productos = [];
$('#tablaTransformaciones').children('tr').each(function( i, val) {
cantidad = $(this).find('td').eq(0).html();
id = $(this).find('td').eq(1).html();
  productos[i] = {"cantidad": cantidad,"id": id};
});
return productos;
}


function controlStock(producto){
var productosTemp = [];
var descontarStock = 0;
descontarStock = parseInt(descontarStock);
var descontarStockDeposito = 0;
descontarStockDeposito = parseInt(descontarStockDeposito);
var descontarStockLocal = 0;
descontarStockLocal = parseInt(descontarStockLocal);

productosTemp = transformacionParcial();
if(!jQuery.isEmptyObject(productosTemp)){
   $.each(productosTemp, function(index) {
       if(productosTemp[index].id === producto.idProducto){
            descontarStock = descontarStock + parseInt(productosTemp[index].cantidad);
                if(productosTemp[index].lugar === 'local'){
                    descontarStockLocal = descontarStockLocal + parseInt(productosTemp[index].cantidad);
                }
                else{
                    descontarStockDeposito = descontarStockDeposito + parseInt(productosTemp[index].cantidad);
                }
       }
   });
}
var auxStock = (producto.stock - descontarStock);
var auxStockDeposito = (producto.stockDeposito - descontarStockDeposito);
var auxStockLocal = (producto.stockLocal - descontarStockLocal);
var productosStocks = [auxStock,auxStockDeposito,auxStockLocal];
return productosStocks;
}



function enviarTransformacion(producT,producP)
    {
        $.ajax({ 
            type: "POST",
            url: "transformacion/realizarTransformacion",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {productosTransformacion: producT, productosPerdida: producP},
            dataType: "html",
            success: function(data)
            {
                var jsonResponse = JSON.parse(data);
                codigo=jsonResponse[0]['codigo'];
                mensaje=jsonResponse[0]['mensaje'];
                mostrarMensaje(codigo,mensaje);
                $("#myModal").on('hidden.bs.modal', function () {
                    $("#tablaTransformaciones").empty();
                    $("#tablaPerdidas").empty();
                    $("#q").focus();
                      iniciar();
                });
            }
        });
    }
function mostrarMensaje(codigo,mensaje){
    $("#myModal").modal('show');
    $("#mensajeModal").empty();
    $("#tituloModal").empty();
    if(codigo == 0)
    {
        $("#tituloModal").append(
            "<div class='alert alert-danger'>ERROR</div>" 
        );
        $("#mensajeModal").append(
            "<p>"+mensaje+"</p>" 
        );
    }else{
        $("#tituloModal").append(
            "<div class='alert alert-success'>CORRECTO</div>" 
        );
        $("#mensajeModal").append(
            "<p>"+mensaje+"</p>" 
        );
    }
    $("#botonModal").empty();
    $("#botonModal").append(
        "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>"
    );
}


// el parametro obj que recibe, es el elemento que lo llama osea (this)
// etonces el elemento que lo llama mediante en el evento
// onclick, llama a la funcion eliminarFila(this)
// de esa manera identifico bien que lo esta llamando.
// y $(obj) al escibrilo de esa forma, lo coniverto en un objeto
// de jQuery y trabajo sobre el normalmente.
function eliminarFilaPerdida(obj){   
//    $(obj).parents('tr').fadeOut('slow',function(){})
  $(obj).parents('tr').remove();
  desabilitarBotonPerdida();
}

function cargarPerdida(){ 
    var productos = [];
    //deshabilitamos el boton "realizarPerdida" para que con el ENTER en modal no siga generando mas perdidas
    $('#realizarPerdida').prop('disabled', true);
    productos = perdidaParcial();
    enviarPerdida(productos);
}


function perdidaParcial(){
    var productos = [];
    $('#tablaPerdidas').children('tr').each(function( i, val) {
    lugar = $(this).find('td').eq(3).find(":selected").val();
    cantidad = $(this).find('td').eq(0).html();
    id = $(this).find('td').eq(1).html();
      productos[i] = {"cantidad": cantidad,"id": id,"lugar": lugar};
    });
    return productos;
}