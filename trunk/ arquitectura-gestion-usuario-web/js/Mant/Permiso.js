/* Funciones para el mantenedor de permisos */

$(function() {
	
	$( "#btRegPermisosG" ).button();
	$( "#btRegPermisosE" ).button();
	$( "#btRegPermisosL" ).button();
	
	/* Select de grupos */
	$('#FormPermisosIDPerfil').load('./fuentes/Sel/PermPerfiles.php');
	$('#FormPermisosIDRecurso').load('./fuentes/Sel/PermRecursos.php');
	$('#FormPermisosIDAccion').load('./fuentes/Sel/PermAcciones.php');

	/* Dialogo de confirmación para guardar */
	$( '#confirmPermG' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           $.post("fuentes/GrabarPermiso.php", $('#FormPermisos').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);
	
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		oTabPerm.fnReloadAjax();
					   });

			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Dialogo de confirmación para Eliminar */
	$( '#confirmPermB' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           
	           $.post("fuentes/EliminarPermiso.php", $('#FormPermisos').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);

				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		fRPerm.resetForm();
					 	$( "#FormPermisosIDPerfil" ).val(0);
					 	$( "#FormPermisosIDRecurso" ).val(0);
					 	$( "#FormPermisosIDAccion" ).val(0);
					 	$( "#FormPermisosPermiso" ).attr('checked', false);
					 	oTabPerm.$('tr.row_selected').removeClass('row_selected');
				   		oTabPerm.fnReloadAjax();
					   });
			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Validaciones del formulario */
	var fRPerm = $( '#FormPermisos').validate({
			rules: {
				FormPermisosIDPerfil:  {min: 1},
				FormPermisosIDRecurso: {min: 1},
				FormPermisosIDAccion:  {min: 1}
			},
            messages: {
            	FormPermisosIDPerfil:  {min: ""},
            	FormPermisosIDRecurso: {min: ""},
            	FormPermisosIDAccion:  {min: ""}
            }
         });
	
    /* Inicializacion de la tabla */
	var oTabPerm = $('#tablaPermisos').dataTable({   
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
	     "sAjaxSource": './fuentes/BuscaPermisos.php', // fuente del json
	     "fnServerData": function ( sSource, aoData, fnCallback ) { // Para buscar con el boton
            $.ajax( {
                "dataType": 'json', 
                "type": "POST", 
                "url": sSource, 
                "data": $('#FormPermisos').serialize(), 
                "success": fnCallback
            	} );
           }
	});

	/* Para cargar un elemento de la tabla */
	$("#tablaPermisos tbody").delegate("tr", "click", function() {
		
		/* parte donde cambiamos el css */
		if ( $(this).hasClass('row_selected') ) {
       	 $(this).removeClass('row_selected');
       	}
        else {
            oTabPerm.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
		/* Parte donde cargamos los input */
		var iPos = oTabPerm.fnGetPosition( this );
		if(iPos!=null){
		    var aData = oTabPerm.fnGetData( iPos );//get data of the clicked row

		    $("#FormPermisosIDPerfil").val(aData[0]);
		    
		    $("#FormPermisosIDRecurso").val(aData[2]);
		    
		    $("#FormPermisosIDAccion").val(aData[4]);

		    if(aData[6] == "Activo") $("#FormPermisosPermiso").attr('checked', true);
		    else $("#FormPermisosPermiso").attr('checked', false);
		}});
	
    /* Boton para limpiar */
    $("#btRegPermisosL").button().click( function() {
    	fRPerm.resetForm();
	 	
	 	$( "#FormPermisosIDPerfil" ).val(0);
	 	$( "#FormPermisosIDRecurso" ).val(0);
	 	$( "#FormPermisosIDAccion" ).val(0);
	 	$( "#FormPermisosPermiso" ).attr('checked', false);
	 	oTabPerm.$('tr.row_selected').removeClass('row_selected');
   		oTabPerm.fnReloadAjax();
	});

    /* Boton para guardar */
    $( "#btRegPermisosG" ).button().click( function() {
     	
     	if($('#FormPermisos').valid())
     	{
           $('#confirmPermG').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Debe seleccionar un perfil, un recurso y una acción' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });

    /* Boton para eliminar */
    $( "#btRegPermisosE" ).button().click( function() {

     	if($('#FormPermisos').valid())
     	{
     	    $('#confirmPermB').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Debe especificar un elemento para eliminar' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });

});

$(function() {
  var oTabPerm = $('#tablaPermisos').dataTable();
   
  // Hide the second column after initialisation
  oTabPerm.fnSetColumnVis( 0, false );
  oTabPerm.fnSetColumnVis( 2, false );
  oTabPerm.fnSetColumnVis( 4, false );
} );

