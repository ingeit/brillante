$( "#q" ).autocomplete({ //Tomo el input de id = q y uso la funcion ya definida por jQuery
    source: "search/autocomplete",
    minLength: 1,
    select: function(event, ui) {
          $('#q').val(ui.item.value);
          $('#qId').val(ui.item.id);
          
    }
}); 
