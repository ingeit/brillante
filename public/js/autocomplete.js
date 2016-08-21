$( "#q" ).autocomplete({ //Tomo el input de id = q y uso la funcion ya definida por jQuery
    source: "search/autocomplete",
    minLength: 1,
    cacheLength: 0, //evita que se guarde el cache
    select: function(event, ui) {
          $('#q').val(ui.item.value);
          $('#qId').val(ui.item.id);
          
    }
});

//
//$("#q").result(function()
//{
//    $("#q").flushCache(); //borra que se guarde el cache
//});