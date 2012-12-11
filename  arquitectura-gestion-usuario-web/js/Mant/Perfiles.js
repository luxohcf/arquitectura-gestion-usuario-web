

$(document).ready(function() {
    
    $( "#btn-add" ).button();
    $( "#btn-remove" ).button();
    $( "#PerAsignados" ).selectable();
    
    $('#btn-add').click(function(){
        $('#PerAsignados option:selected').each( function() {
                $('#PerListado').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
    });
    $('#btn-remove').click(function(){
        $('#PerListado option:selected').each( function() {
            $('#PerAsignados').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
    });
 
});