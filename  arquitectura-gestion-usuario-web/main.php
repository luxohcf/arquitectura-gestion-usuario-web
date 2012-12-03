<?php
@session_start();
/*echo "<span>";
echo var_dump($_SESSION);
echo "</span>";*/

if(isset($_SESSION['usuario']) == FALSE)
{
    header( 'Location: index.html' );
    exit();
}

$nomUser = $_SESSION['usuario'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>Gestion de Usuarios Web</title>
	<link href="css/dark-hive/jquery-ui-1.9.1.custom.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
	<link href="css/Mant/Usuario.css" rel="stylesheet">
	<link href="css/Mant/Perfil.css" rel="stylesheet">
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery-ui-1.9.1.custom.js"></script>
	<!-- JScrollable -->
	<link rel="stylesheet" type="text/css" href="css/style.css" /> 
	<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.codrops1.css" />
	<!-- the mousewheel plugin -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="js/scroll-startstop.events.jquery.js"></script>
	<!-- DataTable plugin -->
	<script type="text/javascript" src="js/DT/jquery.dataTables.js"></script>
	<style type="text/css" title="currentStyle">
		@import "css/DT/demo_page.css";
		@import "css/DT/demo_table.css";
		@import "css/DT/demo_table_jui.css";
		@import "css/DT/jquery.dataTables_themeroller.css";
	</style>
    <!-- validate Plugin -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>
    <!-- Funciones de la pagina -->
	<script type="text/javascript" src="js/funcionesMain.js"></script>
	<script type="text/javascript" src="js/Mant/Usuario.js"></script>
	<script type="text/javascript" src="js/Mant/Perfil.js"></script>
</head>
<body>
<div id="principal">
    <div id="menu">
    	<div id="titulo">Arquitectura de Gestion de Usuarios Web</div>
    	<div id="nameUsuario">Bienvenido <?php echo $nomUser ?></div>
    	<div id="botones">
    		<input type="button" id="bHome" value="Inicio" />
    		<input type="button" id="bMDatos" value="Mis Datos" />
    		<input type="button" id="bOut" value="Salir" />
        </div>
    </div>
    <div id="container">
      <table id="tablaPrincipal">
       <tr>
       	<td style="width: 270px;">
	       <div id="menu2">
	       	 <ul id="menuUl">
	       	  <li><a href="#" onclick="cambiarContenido('P');">Usuarios</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('S');">Grupos de usuarios</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('A');">Perfiles</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('C');">Recursos</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('F');">Acciones</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('E');">Prioridades</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('D');">Permisos</a></li>
	       	  <li><a href="#" onclick="cambiarContenido('T');">Configuración</a></li>
	       	 </ul>
	       </div>
	     </td>
	     <td rowspan="2">  
	        <div id="cotenido">
		       	<div id="P">
					 	<div id="contenidoFormRegUsu">
					 		<form id="FormRegUsu">
					 		<div id="datosFormRegUsu">
					 			<table id="tablaMUsuario">
					 			<tr>
					 				<td><p>ID Usuario</p></td>
					 				<td><input id="FormRegUsuIDUsu" name="FormRegUsuIDUsu" type="text" /></td>
					 				<td><p>&nbsp; Nombre Usuario      </p></td>
					 				<td><input id="FormRegUsuNomUsu" name="FormRegUsuNomUsu" type="text" /></td>
						 		</tr>
					 			<tr>
					 				<td><p>Contraseña</p></td>
					 				<td><input id="FormRegUsuPass1" name="FormRegUsuPass1" type="password" /></td>
					 				<td><p>&nbsp; Confirmar      </p></td>
					 				<td><input id="FormRegUsuPass2" name="FormRegUsuPass2" type="password" /></td>
						 		</tr>
						 		<tr>
					 				<td><p>E-Mail  </p></td>
					 				<td><input id="FormRegUsuEmail" name="FormRegUsuEmail" type="email" /></td>
					 				<td><p>&nbsp; Grupo</p></td>
					 				<td>
					 					<select id="FormRegUsuGrupo" name="FormRegUsuGrupo">
					 						<option value="0">Seleccione un grupo</option>
					 						<option value="1">Grupo 1</option>
					 						<option value="2">Grupo 2</option>
					 					</select>
					 				</td>
						 		</tr>
						 		<tr>
					 				<td><p>Fecha Nacimiento </p></td>
					 				<td><input id="FormRegUsuFecNac" name="FormRegUsuFecNac" type="text" /></td>
					 				<td><p>&nbsp; Activo </p></td>
					 				<td><input id="FormRegUsuActivo" name="FormRegUsuActivo" type="checkbox" /></td>
						 		</tr>
						 		<tr >
					 				<td><p>Descripción </p></td>
					 				<td colspan="3"><textarea id="FormRegUsuDesc" name="FormRegUsuDesc" > </textarea></td>
						 		</tr>
						 		<tr>
						 		</tr>
						 		<td> </td>
						 		<tr>
						 			<td> </td>
						 		</tr>
					 			</table>
					 		</div>
					 		</form>
					 		<br>
					    	<div id="botonesFormRegMUsu">
					    		<input type="button" id="btRegUsub"  value="Buscar" />
					    		<input type="button" id="btRegUsuGrabar"  value="Grabar" />
					        	<input type="button" id="btRegUsue"  value="Eliminar" />
					        	<input type="button" id="btRegUsuLimpiar" value="Limpiar" />
					        </div>
							<div id="contTabla">
						 		<table id="table_id">
							    <thead>
							        <tr>
							        	<th>ID Usuario</th>
							        	<th>Nombre</th>
							            <th>E-Mail</th>
							            <th>Grupo</th>
							            <th>Fecha Nacimiento</th>
							            <th>Activo</th>
							            <th>Contraseña</th>
							            <th>Descripción</th>
							        </tr>
							    </thead>
							    <tbody>
							     
							    </tbody>
							</table>
						 </div>
					 	</div>
		       	</div>
		       	<div id="S" style="display: none">
		       		S - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
		       	</div>
		       	<div id="A" style="display: none">
		       		    <div id="contenidoFormRegPerfiles">
                            <form id="FormRegPerfiles">
                            <div id="datosFormRegPerfiles">
                                <table id="tablaMPerfiles">
                                <tr>
                                    <td><p>ID Perfil</p></td>
                                    <td><input id="FormRegPerIDPer" name="FormRegPerIDPer" type="text" /></td>
                                    <td><p>&nbsp; Nombre Perfil      </p></td>
                                    <td><input id="FormRegPerNomPer" name="FormRegPerNomPer" type="text" /></td>
                                </tr>
                                <tr>
                                    <td><p>&nbsp; Activo </p></td>
                                    <td><input id="FormRegPerActivo" name="FormRegPerActivo" type="checkbox" /></td>
                                </tr>
                                <tr >
                                    <td><p>Descripción </p></td>
                                    <td colspan="3"><textarea id="FormRegPerDesc" name="FormRegPerDesc" > </textarea></td>
                                </tr>
                                <tr>
                                </tr>
                                </table>
                            </div>
                            </form>
                            <br>
                            <div id="botonesFormRegMPer">
                                <input type="button" id="btRegPerB"  value="Buscar" />
                                <input type="button" id="btRegPerG"  value="Grabar" />
                                <input type="button" id="btRegPerE"  value="Eliminar" />
                                <input type="button" id="btRegPerL"  value="Limpiar" />
                            </div>
                            <div id="contTablaPer">
                                <table id="tablaPerfiles">
                                <thead>
                                    <tr>
                                        <th>ID Perfil</th>
                                        <th>Nombre</th>
                                        <th>Fecha Registro</th>
                                        <th>Activo</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                         </div>
                        </div>
		       	</div>
		       	<div id="C" style="display: none">
		       		C - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
		       	</div>
		       	<div id="F" style="display: none">
		       		F - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
		       	</div>
		       	<div id="E" style="display: none">
		       		E - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
		       	</div>
		       	<div id="D" style="display: none">
		       		D - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
		       	</div>
		       	<div id="T" style="display: none">
		       		T - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
		       	</div>
	       </div>
	     </td>
	    </tr>
	    <tr>
	    	<td> </td>
	    </tr>
      </table>
    </div>
    <div id="footer">
        Arquitectura de Gestion de Usuarios Web V-1.0 - 2012
        Desarrollado por Luis Lizama  
    </div>
</div>
<div id="FormIniSesErr">
        <div id="dMsg">
        </div>
</div>
<div id="confirmB">
    ¿Seguro que desea eliminar el registro?
</div>
<div id="confirmG">
    ¿Seguro que desea guardar el registro?
</div>
<div id="confirmPerE">
    ¿Seguro que desea eliminar el registro?
</div>
<div id="confirmPerG">
    ¿Seguro que desea guardar el registro?
</div>
</body>
</html>
