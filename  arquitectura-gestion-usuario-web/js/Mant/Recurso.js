/* Funciones para el mantenedor de recursos */

$(function() {
	
	$( "#btRegRecB" ).button();
	$( "#btRegRecG" ).button();
	$( "#btRegRecE" ).button();
	$( "#btRegRecL" ).button();
	
	$( "#FormRegRecDesc" ).val('');

	/* Dialogo de confirmación para guardar */
	$( '#confirmRecG' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           $.post("fuentes/GrabarRecurso.php", $('#FormRegRecursos').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);
	
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		oTabRec.fnReloadAjax();
					   });

			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Dialogo de confirmación para Eliminar */
	$( '#confirmRecE' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           
	           $.post("fuentes/EliminarRecurso.php", $('#FormRegRecursos').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);

				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		fRRec.resetForm();
					 	$( "#FormRegRecIDRec" ).val("");
					 	$( "#FormRegRecNomRec" ).val("");
					 	$( "#FormRegRecActivo" ).attr('checked', false);
					 	$( "#FormRegRecDesc" ).val("");
					 	oTabRec.$('tr.row_selected').removeClass('row_selected');
				   		oTabRec.fnReloadAjax();
					   });
			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Validaciones del formulario */
	var fRRec = $( '#FormRegRecursos').validate({
                rules: {
                    FormRegRecIDRec: {required: true,
                    					 digits: true,
                    					 minlength: 1,
                    					 maxlength: 20},
                    FormRegRecNomRec: {required: true, 
										 minlength: 5,
                    					 maxlength: 50}
                },
                messages: {
                    FormRegRecIDRec: {required: "",
                    					 digits: "",
                    					 minlength: "",
                    					 maxlength: ""},
                    FormRegRecNomRec: {required: "",
                    					 minlength: "",
                    					 maxlength: ""}
                }
         });
	
    /* Inicializacion de la tabla */
	var oTabRec = $('#tablaRecursos').dataTable({   
         bJQueryUI: true,
         sPaginationType: "full_numbers", //tipo de paginacion
         "bFilter": true, // muestra el cuadro de busqueda
         "iDisplayLength": 5, // cantidad de filas que muestra
         "bLengthChange": false, // cuadro que deja cambiar la cantidad de filas
         "oLanguage": { // mensajes y el idio,a
	            "sLengthMenu": "Mostrar _MENU_ registros",
	            "sZeroRecords": "No hay resultados",
	            "sInfo": "Resultados del _START_ al _END_ de _TOTAL_ registros",
	            "sInfoEmpty": "0 Resultados",
	            "sInfoFiltered": "(filtrado desde _MAX_ registros)",
	            "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    }
	        },
	     "bProcessing": true, //para procesar desde servidor
	     "sServerMethod": "POST",
	     "sAjaxSource": './fuentes/BuscaRecursos.php', // fuente del json
	     "fnServerData": function ( sSource, aoData, fnCallback ) { // Para buscar con el boton
            $.ajax( {
                "dataType": 'json', 
                "type": "POST", 
                "url": sSource, 
                "data": $('#FormRegRecursos').serialize(), 
                "success": fnCallback
            	} );
           }
	});

	/* Para cargar un elemento de la tabla */
	$("#tablaRecursos tbody").delegate("tr", "click", function() {
		
		/* parte donde cambiamos el css */
		if ( $(this).hasClass('row_selected') ) {
       	 $(this).removeClass('row_selected');
       	}
        else {
            oTabRec.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
		/* Parte donde cargamos los input */
		var iPos = oTabRec.fnGetPosition( this );
		if(iPos!=null){
		    var aData = oTabRec.fnGetData( iPos );//get data of the clicked row
		    $("#FormRegRecIDRec").val(aData[0]);
		    $("#FormRegRecNomRec").val(aData[1]);
		    if(aData[3] == "Activo") $("#FormRegRecActivo").attr('checked', true);
		    else $("#FormRegRecActivo").attr('checked', false);
		    $("#FormRegRecDesc").val(aData[4]);
		}});

    /* Boton para limpiar */
    $("#btRegRecL").button().click( function() {
    	fRRec.resetForm();
	 	$( "#FormRegRecIDRec" ).val("");
	 	$( "#FormRegRecNomRec" ).val("");
	 	$( "#FormRegRecActivo" ).attr('checked', false);
	 	$( "#FormRegRecDesc" ).val("");
	 	oTabRec.$('tr.row_selected').removeClass('row_selected');
	 	oTabRec.fnReloadAjax();
	});
	
	/* Boton para Buscar */
	$( "#btRegRecB" ).button().click( function() {
		oTabRec.fnReloadAjax();
	});

    /* Boton para guardar */
    $( "#btRegRecG" ).button().click( function() {
     	
     	if($('#FormRegRecursos').valid())
     	{
           $('#confirmRecG').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Los campos destacados en rojo son obligatorios' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });

    /* Boton para eliminar */
    $( "#btRegRecE" ).button().click( function() {

     	if($('#FormRegRecIDRec').val() != '')
     	{
     	    $('#confirmRecE').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Debe especificar un elemento para eliminar' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });


});

$(function() {
  var oTabRec = $('#tablaRecursos').dataTable();
   
  // Hide the second column after initialisation
  oTabRec.fnSetColumnVis( 4, false );
} );

