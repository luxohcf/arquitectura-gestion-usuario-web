/* Funciones para el mantenedor de acciones */

$(function() {
	
	$( "#btRegAccB" ).button();
	$( "#btRegAccG" ).button();
	$( "#btRegAccE" ).button();
	$( "#btRegAccL" ).button();
	
	$( "#FormRegAccDesc" ).val('');

	/* Dialogo de confirmación para guardar */
	$( '#confirmAccG' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           $.post("fuentes/GrabarAccion.php", $('#FormRegAcciones').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);
	
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		oTabAcc.fnReloadAjax();
					   });

			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Dialogo de confirmación para Eliminar */
	$( '#confirmAccE' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           
	           $.post("fuentes/EliminarAccion.php", $('#FormRegAcciones').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);

				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		fRAcc.resetForm();
					 	$( "#FormRegAccIDAcc" ).val("");
					 	$( "#FormRegAccNomAcc" ).val("");
					 	$( "#FormRegAccActivo" ).attr('checked', false);
					 	$( "#FormRegAccDesc" ).val("");
					 	oTabAcc.$('tr.row_selected').removeClass('row_selected');
				   		oTabAcc.fnReloadAjax();
					   });
			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Validaciones del formulario */
	var fRAcc = $( '#FormRegAcciones').validate({
                rules: {
                    FormRegAccIDAcc: {required: true,
                    					 digits: true,
                    					 minlength: 1,
                    					 maxlength: 20},
                    FormRegAccNomAcc: {required: true, 
										 minlength: 1,
                    					 maxlength: 50}
                },
                messages: {
                    FormRegAccIDAcc: {required: "",
                    					 digits: "",
                    					 minlength: "",
                    					 maxlength: ""},
                    FormRegAccNomAcc: {required: "",
                    					 minlength: "",
                    					 maxlength: ""}
                }
         });
	
    /* Inicializacion de la tabla */
	var oTabAcc = $('#tablaAcciones').dataTable({   
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
	     "sAjaxSource": './fuentes/BuscaAcciones.php', // fuente del json
	     "fnServerData": function ( sSource, aoData, fnCallback ) { // Para buscar con el boton
            $.ajax( {
                "dataType": 'json', 
                "type": "POST", 
                "url": sSource, 
                "data": $('#FormRegAcciones').serialize(), 
                "success": fnCallback
            	} );
           }
	});

	/* Para cargar un elemento de la tabla */
	$("#tablaAcciones tbody").delegate("tr", "click", function() {
		
		/* parte donde cambiamos el css */
		if ( $(this).hasClass('row_selected') ) {
       	 $(this).removeClass('row_selected');
       	}
        else {
            oTabAcc.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
		/* Parte donde cargamos los input */
		var iPos = oTabAcc.fnGetPosition( this );
		if(iPos!=null){
		    var aData = oTabAcc.fnGetData( iPos );//get data of the clicked row
		    $("#FormRegAccIDAcc").val(aData[0]);
		    $("#FormRegAccNomAcc").val(aData[1]);
		    if(aData[3] == "Activo") $("#FormRegAccActivo").attr('checked', true);
		    else $("#FormRegAccActivo").attr('checked', false);
		    $("#FormRegAccDesc").val(aData[4]);
		}});

    /* Boton para limpiar */
    $("#btRegAccL").button().click( function() {
    	fRAcc.resetForm();
	 	$( "#FormRegAccIDAcc" ).val("");
	 	$( "#FormRegAccNomAcc" ).val("");
	 	$( "#FormRegAccActivo" ).attr('checked', false);
	 	$( "#FormRegAccDesc" ).val("");
	 	oTabAcc.$('tr.row_selected').removeClass('row_selected');
	 	oTabAcc.fnReloadAjax();
	});
	
	/* Boton para Buscar */
	$( "#btRegAccB" ).button().click( function() {
		oTabAcc.fnReloadAjax();
	});

    /* Boton para guardar */
    $( "#btRegAccG" ).button().click( function() {
     	
     	if($('#FormRegAcciones').valid())
     	{
           $('#confirmAccG').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Los campos destacados en rojo son obligatorios' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });

    /* Boton para eliminar */
    $( "#btRegAccE" ).button().click( function() {

     	if($('#FormRegAccIDAcc').val() != '')
     	{
     	    $('#confirmAccE').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Debe especificar un elemento para eliminar' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });


});

$(function() {
  var oTabAcc = $('#tablaAcciones').dataTable();
   
  // Hide the second column after initialisation
  oTabAcc.fnSetColumnVis( 4, false );
} );

