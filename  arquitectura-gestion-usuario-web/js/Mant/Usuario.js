/* Funciones para el mantenedor de usuarios */

$(function() {
	
	$( "#btRegUsub" ).button();
	$( "#btRegUsuGrabar" ).button();
	$( "#btRegUsue" ).button();
	$( "#btRegUsuLimpiar" ).button();
	$( "#btRegUsuPerfiles" ).button();
	
	$( "#FormRegUsuFecNac" ).datepicker({dateFormat: 'dd/mm/yy'});
	$( "#FormRegUsuDesc" ).val('');
	
	/* Select de grupos */
	$('#FormRegUsuGrupo').load('./fuentes/Sel/Grupos.php');

    /* Dialogo para asignación de perfiles */
	$( '#UsuPerfiles' ).dialog({
		autoOpen: false,
		width: 600,
		height: 500,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	        	
			   var domelts = $('#PerAsignados option');
			   var values = $.map(domelts, function(elt, i) { return $(elt).val();});
			   var idUser = $('#FormRegUsuIDUsu').val();
	           $.post("fuentes/AsignarPerfiles.php", { ids:values,idUser:idUser},
					   function(data) {
					   	var obj = jQuery.parseJSON(data);
	
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		oTabUsu.fnReloadAjax();
					   });

			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});
	
	/* Dialogo de confirmación para guardar */
	$( '#confirmG' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           $.post("fuentes/GrabarUsuario.php", $('#FormRegUsu').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);
	
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		oTabUsu.fnReloadAjax();
					   });

			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Dialogo de confirmación para Eliminar */
	$( '#confirmB' ).dialog({
		autoOpen: false,
		width: 300,
		height: 260,
		modal: true,
		resizable: false,
		buttons : {
	        "Confirmar" : function() {
	           
	           $.post("fuentes/EliminarUsuario.php", $('#FormRegUsu').serialize(),
					   function(data) {
					   	var obj = jQuery.parseJSON(data);

				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   		fRU.resetForm();
					 	$( "#FormRegUsuIDUsu" ).val("");
					 	$( "#FormRegUsuNomUsu" ).val("");
					 	$( "#FormRegUsuEmail" ).val("");
					 	$( "#FormRegUsuGrupo" ).val(0);
					 	$( "#FormRegUsuFecNac" ).val("");
					 	$( "#FormRegUsuActivo" ).attr('checked', false);
					 	$( "#FormRegUsuPass1" ).val("");
					 	$( "#FormRegUsuPass2" ).val("");
					 	$( "#FormRegUsuDesc" ).val("");
					 	oTabUsu.$('tr.row_selected').removeClass('row_selected');
				   		oTabUsu.fnReloadAjax();
					   });
			   $(this).dialog("close");
	        },
	        "Cancelar" : function() {
	          $(this).dialog("close");
        	}}
	});

	/* Validaciones del formulario */
	var fRU = $( '#FormRegUsu').validate({
                rules: {
                    FormRegUsuIDUsu: {required: true,
                    					 minlength: 5,
                    					 maxlength: 20},
                    FormRegUsuNomUsu: {required: true, 
										 minlength: 5,
                    					 maxlength: 150},
                    FormRegUsuEmail: {required: true, 
                    				   email: true,
                    				   maxlength: 100},
                    FormRegUsuPass1: {required: true,
                    				   minlength: 6},
                    FormRegUsuPass2: {required: true,
                    				   equalTo: "#FormRegUsuPass1"},
                    FormRegUsuFecNac: {required: true}
                },
                messages: {
                    FormRegUsuIDUsu: {required: "",
                    					 minlength: "",
                    					 maxlength: ""},
                    FormRegUsuNomUsu: {required: "",
                    					 minlength: "",
                    					 maxlength: ""},
                    FormRegUsuEmail: {required: "", 
                    				   email: "",
                    				   maxlength: ""},
                    FormRegUsuPass1: {required: "",
                    				   minlength: ""},
                    FormRegUsuPass2: {required: "",
                    				   equalTo: ""},
                    FormRegUsuFecNac: {required: ""}
                }
         });
	
    /* Inicializacion de la tabla */
	var oTabUsu = $('#table_id').dataTable({   
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
	     "sAjaxSource": './fuentes/BuscaUsuarios.php', // fuente del json
	     "fnServerData": function ( sSource, aoData, fnCallback ) { // Para buscar con el boton
            $.ajax( {
                "dataType": 'json', 
                "type": "POST", 
                "url": sSource, 
                "data": $('#FormRegUsu').serialize(), 
                "success": fnCallback
            	} );
           }
	});

	/* Para cargar un elemento de la tabla */
	$("#table_id tbody").delegate("tr", "click", function() {
		
		/* parte donde cambiamos el css */
		if ( $(this).hasClass('row_selected') ) {
       	 $(this).removeClass('row_selected');
       	}
        else {
            oTabUsu.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
		/* Parte donde cargamos los input */
		var iPos = oTabUsu.fnGetPosition( this );
		if(iPos!=null){
		    var aData = oTabUsu.fnGetData( iPos );//get data of the clicked row
		    //var iId = aData[1];//get column data of the row
		    //oTabUsu.fnDeleteRow(iPos);//delete row
		    $("#FormRegUsuIDUsu").val(aData[0]);
		    $("#FormRegUsuNomUsu").val(aData[1]);
		    $("#FormRegUsuEmail").val(aData[2]);
		    $("#FormRegUsuGrupo").val(aData[3]);
		    $("#FormRegUsuFecNac").val(aData[4]);
		    if(aData[5] == "Activo") $("#FormRegUsuActivo").attr('checked', true);
		    else $("#FormRegUsuActivo").attr('checked', false);
		    $("#FormRegUsuPass1").val(aData[6]);
		    $("#FormRegUsuPass2").val(aData[6]);
		    $("#FormRegUsuDesc").val(aData[7]);
		}});
	
    /* Boton para limpiar */
    $("#btRegUsuLimpiar").button().click( function() {
    	fRU.resetForm();
	 	$( "#FormRegUsuIDUsu" ).val("");
	 	$( "#FormRegUsuNomUsu" ).val("");
	 	$( "#FormRegUsuEmail" ).val("");
	 	$( "#FormRegUsuGrupo" ).val(0);
	 	$( "#FormRegUsuFecNac" ).val("");
	 	$( "#FormRegUsuActivo" ).attr('checked', false);
	 	$( "#FormRegUsuPass1" ).val("");
	 	$( "#FormRegUsuPass2" ).val("");
	 	$( "#FormRegUsuDesc" ).val("");
	 	oTabUsu.$('tr.row_selected').removeClass('row_selected');
	 	oTabUsu.fnReloadAjax();
	});
	
	/* Boton para Buscar */
	$( "#btRegUsub" ).button().click( function() {
		oTabUsu.fnReloadAjax();
	});

    /* Boton para guardar */
    $( "#btRegUsuGrabar" ).button().click( function() {
     	
     	if($('#FormRegUsu').valid())
     	{
           $('#confirmG').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Los campos destacados en rojo son obligatorios' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });

    /* Boton para eliminar */
    $( "#btRegUsue" ).button().click( function() {

     	if($('#FormRegUsuIDUsu').val() != '')
     	{
     	    $('#confirmB').dialog( "open" );
	    }
	    else
	    {
	   		$('#dMsg').html( 'Debe especificar un elemento para eliminar' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });

    /* Boton para asignar perfiles a un usuario */
    $( "#btRegUsuPerfiles" ).button().click( function() {

     	if($('#FormRegUsuIDUsu').val() != '')
     	{
           $.post("fuentes/Sel/Perfiles.php", $('#FormRegUsu').serialize(),
				   function(data) {
				   	var obj = jQuery.parseJSON(data);

			   		$('#UsuPerfiles').html( obj.html );
			   		$('#UsuPerfiles').dialog( "open" );
				   });
	    }
	    else
	    {
	   		$('#dMsg').html( 'Debe especificar un usuario' );
	   		$('#FormIniSesErr').dialog( "open" );
	    }
    });
});

$(function() {
  var oTable = $('#table_id').dataTable();
   
  // Hide the second column after initialisation
  oTable.fnSetColumnVis( 6, false );
  oTable.fnSetColumnVis( 7, false );
} );

