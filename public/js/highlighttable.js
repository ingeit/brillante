function highlight(tableIndex) {
    // Chequeo si el seleccionado es el ultimo elemento, de ser asi vuelvo al principio
    if( (tableIndex+1) > $('#data tbody tr').length )
        tableIndex = 0;
    
    // Existen elementos?
    if($('#data tbody tr:eq('+tableIndex+')').length > 0)
    {
        // Quito la clase HighLight
        $('#data tbody tr').removeClass('highlight');
        
        // Agrego la clase HighLight
        $('#data tbody tr:eq('+tableIndex+')').addClass('highlight');
    }
}



$(document).keydown(function (e) { //Evento que detecta las teclas presionadas en la pagina
    
    switch(e.which) 
    {
        case 13: //detecta el enter
            alert($('tr.highlight').find('td').html());  
            break;
            
        case 38: //deteca flecha abajo
            highlight($('#data tbody tr.highlight').index() - 1);
            break;
        case 40: //detecta fechla arriba 
            highlight($('#data tbody tr.highlight').index() + 1);
            break;
    }

 });
