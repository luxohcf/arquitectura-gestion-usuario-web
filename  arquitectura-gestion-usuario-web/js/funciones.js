/* Funciones index.html */
$(function() {

		$( "#bOut" ).button();
		$( "#bHome" ).button();
		$( "#bMDatos" ).button();
		$( "#regs" ).button();
		$( "#inis" ).button();
		$( "#menuUl" ).menu();
		$( "#btIniSes" ).button();
		$( "#rFormRegUsuFecNac" ).datepicker({dateFormat: 'dd/mm/yy'});
		$( "#btRegUsuGrabar" ).button();
		$( "#btRegUsuLimpiar" ).button();
		
		/* Validaciones inicio de sesion */
		var fIS = $('#formIniciosSesion').validate({
	                rules: {
	                    FormIniSesUsuario: {required: true},
	                    FormIniSesPass: {required: true}
	                },
	                messages: {
	                    FormIniSesUsuario: {required: "Introduzca su nombre"},
	                    FormIniSesPass: {required: "Introduzca su contraseña"}
	                }
	         });
         
         /* Validaciones registro usuario */
		var fRU = $('#formRegistroUsuario').validate({
	                rules: {
	                    rFormRegUsuUsuario: {required: true,
	                    					 minlength: 5,
	                    					 maxlength: 20},
	                    rFormRegUsuEmail: {required: true, 
	                    				   email: true,
	                    				   maxlength: 100},
	                    rFormRegUsuPass1: {required: true,
	                    				   minlength: 6},
	                    rFormRegUsuPass2: {required: true,
	                    				   equalTo: "#rFormRegUsuPass1"},
	                    rFormRegUsuFecNac: {required: true}
	                },
	                messages: {
	                    rFormRegUsuUsuario: {required: "Introduzca su nombre",
	                    					 minlength: "Muy corto",
	                    					 maxlength: "Muy largo"},
	                    rFormRegUsuEmail: {required: "Introduzca su e-mail", 
	                    				   email: "Formato incorrecto",
	                    				   maxlength: "Muy largo"},
	                    rFormRegUsuPass1: {required: "Introduzca su contraseña",
	                    				   minlength: "Muy corto"},
	                    rFormRegUsuPass2: {required: "Confirme su contraseña",
	                    				   equalTo: "Contraseñas no concuerdan"},
	                    rFormRegUsuFecNac: {required: "Introduzca su fecha de nacimiento"}
	                }
	         });
		
		$( "#dRegistroUsuario" ).dialog({
			autoOpen: false,
			width: 300,
			height: 680,
			modal: true,
			resizable: false,
		    close: function () {
		    	    fRU.resetForm();
				 	$( "#rFormRegUsuUsuario" ).val("");
				 	$( "#rFormRegUsuEmail" ).val("");
				 	$( "#rFormRegUsuPass1" ).val("");
				 	$( "#rFormRegUsuPass2" ).val("");
				 	$( "#rFormRegUsuDesc" ).val("...");
				 	$( "#rFormRegUsuFecNac" ).val("");	  
				},
		});

		$("#btRegUsuLimpiar").button().click( function() {
			fRU.resetForm();
		 	$( "#rFormRegUsuUsuario" ).val("");
		 	$( "#rFormRegUsuEmail" ).val("");
		 	$( "#rFormRegUsuPass1" ).val("");
		 	$( "#rFormRegUsuPass2" ).val("");
		 	$( "#rFormRegUsuDesc" ).val("...");
		 	$( "#rFormRegUsuFecNac" ).val("");	
		});
		
		$( "#dIniciosSesion" ).dialog({
			autoOpen: false,
			width: 300,
			height: 320,
			modal: true,
			resizable: false,
			close: function () {
				    fIS.resetForm();
				 	$( "#FormIniSesUsuario" ).val("");
				 	$( "#FormIniSesPass" ).val("");			  
				},
		});

		$( "#FormIniSesErr" ).dialog({
			autoOpen: false,
			width: 300,
			height: 260,
			modal: true,
			resizable: true
		});
		
		$("#regs").button().click( function() {
		    $( "#dRegistroUsuario" ).dialog( "open" );
		});
		
		$("#inis").button().click( function() {
		    $( "#dIniciosSesion" ).dialog( "open" );
		});
         
         /* Submit para el inicio de sesion */
         $('#formIniciosSesion').submit(function(event){
         	event.preventDefault();
         	if($('#formIniciosSesion').valid())
         	{
         		
         		var vname = $('#FormIniSesUsuario').val();
         		var vpass = $('#FormIniSesPass').val();
         		
         		$.post("IniSes/login.php", { name: vname, pass: vpass },
				   function(data) {
				   	
				   	var obj = jQuery.parseJSON(data);
				   	
				   	if(obj.error == true)
				   	{
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   	}
				   	else
				   	{
				   		window.location.href = "main.php";
				   	}
				   });
         	}
         });
         
         /* Submit para el registro de usuario */
         $('#formRegistroUsuario').submit(function(event){
         	event.preventDefault();
         	if($('#formRegistroUsuario').valid())
         	{
         		var vname = $('#rFormRegUsuUsuario').val();
         		var vmail = $('#rFormRegUsuEmail').val();
         		var vpass = $('#rFormRegUsuPass1').val();
         		var vdesc = $('#rFormRegUsuDesc').val();
         		var vfecNac = $('#rFormRegUsuFecNac').val();
         		
         		$.post("RegUsu/RegistroUsuario.php", { name: vname, pass: vpass, fecNac: vfecNac,
         											   mail: vmail, desc: vdesc },
				   function(data) {
				   		var obj = jQuery.parseJSON(data);
				   		$('#dMsg').html( obj.html );
				   		$('#FormIniSesErr').dialog( "open" );
				   });
         	}
         });

        /* Boton para cerrar sesion */
        $( "#bOut" ).button().click( function() {
            window.location.href = "IniSes/logout.php";
        });
        
        /* Boton para abrir el main */
        $( "#bMDatos" ).button().click( function() {
            window.location.href = "main.php";
        });
        
        /* Boton para abrir el index */
        $( "#bHome" ).button().click( function() {
            window.location.href = "index.php";
        });
		
	});

/* Funcion para el scroll */
$(function() {
	
		// the element we want to apply the jScrollPane
		var $el					= $('#jp-container').jScrollPane({
			verticalGutter 	: -16
		}),
				
		// the extension functions and options 	
			extensionPlugin 	= {
				
				extPluginOpts	: {	
					// speed for the fadeOut animation
					mouseLeaveFadeSpeed	: 500,
					// scrollbar fades out after hovertimeout_t milliseconds
					hovertimeout_t		: 1000,
					// if set to false, the scrollbar will be shown on mouseenter and hidden on mouseleave
					// if set to true, the same will happen, but the scrollbar will be also hidden on mouseenter after "hovertimeout_t" ms
					// also, it will be shown when we start to scroll and hidden when stopping
					useTimeout			: true,
					// the extension only applies for devices with width > deviceWidth
					deviceWidth			: 980
				},
				hovertimeout	: null, // timeout to hide the scrollbar
				isScrollbarHover: false,// true if the mouse is over the scrollbar
				elementtimeout	: null,	// avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar
				isScrolling		: false,// true if scrolling
				addHoverFunc	: function() {
					
					// run only if the window has a width bigger than deviceWidth
					if( $(window).width() <= this.extPluginOpts.deviceWidth ) return false;
					
					var instance		= this;
					
					// functions to show / hide the scrollbar
					$.fn.jspmouseenter 	= $.fn.show;
					$.fn.jspmouseleave 	= $.fn.fadeOut;
					
					// hide the jScrollPane vertical bar
					var $vBar			= this.getContentPane().siblings('.jspVerticalBar').hide();
					
					/*
					 * mouseenter / mouseleave events on the main element
					 * also scrollstart / scrollstop - @James Padolsey : http://james.padolsey.com/javascript/special-scroll-events-for-jquery/
					 */
					$el.bind('mouseenter.jsp',function() {
						
						// show the scrollbar
						$vBar.stop( true, true ).jspmouseenter();
						
						if( !instance.extPluginOpts.useTimeout ) return false;
						
						// hide the scrollbar after hovertimeout_t ms
						clearTimeout( instance.hovertimeout );
						instance.hovertimeout 	= setTimeout(function() {
							// if scrolling at the moment don't hide it
							if( !instance.isScrolling )
								$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
						}, instance.extPluginOpts.hovertimeout_t );
						
						
					}).bind('mouseleave.jsp',function() {
						
						// hide the scrollbar
						if( !instance.extPluginOpts.useTimeout )
							$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
						else {
						clearTimeout( instance.elementtimeout );
						if( !instance.isScrolling )
								$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
						}
						
					});
					
					if( this.extPluginOpts.useTimeout ) {
						
						$el.bind('scrollstart.jsp', function() {
						
							// when scrolling show the scrollbar
						clearTimeout( instance.hovertimeout );
						instance.isScrolling	= true;
						$vBar.stop( true, true ).jspmouseenter();
						
					}).bind('scrollstop.jsp', function() {
						
							// when stop scrolling hide the scrollbar (if not hovering it at the moment)
						clearTimeout( instance.hovertimeout );
						instance.isScrolling	= false;
						instance.hovertimeout 	= setTimeout(function() {
							if( !instance.isScrollbarHover )
									$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
							}, instance.extPluginOpts.hovertimeout_t );
						
					});
					
						// wrap the scrollbar
						// we need this to be able to add the mouseenter / mouseleave events to the scrollbar
					var $vBarWrapper	= $('<div/>').css({
						position	: 'absolute',
						left		: $vBar.css('left'),
						top			: $vBar.css('top'),
						right		: $vBar.css('right'),
						bottom		: $vBar.css('bottom'),
						width		: $vBar.width(),
						height		: $vBar.height()
					}).bind('mouseenter.jsp',function() {
						
						clearTimeout( instance.hovertimeout );
						clearTimeout( instance.elementtimeout );
						
						instance.isScrollbarHover	= true;
						
							// show the scrollbar after 100 ms.
							// avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar								
						instance.elementtimeout	= setTimeout(function() {
							$vBar.stop( true, true ).jspmouseenter();
						}, 100 );	
						
					}).bind('mouseleave.jsp',function() {
						
							// hide the scrollbar after hovertimeout_t
						clearTimeout( instance.hovertimeout );
						instance.isScrollbarHover	= false;
						instance.hovertimeout = setTimeout(function() {
								// if scrolling at the moment don't hide it
							if( !instance.isScrolling )
									$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
							}, instance.extPluginOpts.hovertimeout_t );
						
					});
					
					$vBar.wrap( $vBarWrapper );
					
				}
				
				}
				
			},
			
			// the jScrollPane instance
			jspapi 			= $el.data('jsp');
			
		// extend the jScollPane by merging	
		$.extend( true, jspapi, extensionPlugin );
		jspapi.addHoverFunc();
	
	});