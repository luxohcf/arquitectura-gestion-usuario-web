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
if(strlen($nomUser) > 12)
{
    $nomUser = substr($nomUser, 0, 11)."...";
}

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
	<link href="css/Mant/Recurso.css" rel="stylesheet">
	<link href="css/Mant/Accion.css" rel="stylesheet">
	<link href="css/Mant/Permiso.css" rel="stylesheet">
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
	<script type="text/javascript" src="js/Mant/Recurso.js"></script>
	<script type="text/javascript" src="js/Mant/Accion.js"></script>
	<script type="text/javascript" src="js/Mant/Permiso.js"></script>
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
					        	<input type="button" id="btRegUsuPerfiles" value="Perfiles" />
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
		       		<h3>No disponible en esta versión</h3>
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
                    <div id="contenidoFormRegRecursos">
                            <form id="FormRegRecursos">
                            <div id="datosFormRegRecursos">
                                <table id="tablaMRecursos">
                                <tr>
                                    <td><p>ID Recurso</p></td>
                                    <td><input id="FormRegRecIDRec" name="FormRegRecIDRec" type="text" /></td>
                                    <td><p>&nbsp; Nombre Recurso      </p></td>
                                    <td><input id="FormRegRecNomRec" name="FormRegRecNomRec" type="text" /></td>
                                </tr>
                                <tr>
                                    <td><p>&nbsp; Activo </p></td>
                                    <td><input id="FormRegRecActivo" name="FormRegRecActivo" type="checkbox" /></td>
                                </tr>
                                <tr >
                                    <td><p>Descripción </p></td>
                                    <td colspan="3"><textarea id="FormRegRecDesc" name="FormRegRecDesc" > </textarea></td>
                                </tr>
                                <tr>
                                </tr>
                                </table>
                            </div>
                            </form>
                            <br>
                            <div id="botonesFormRegMRec">
                                <input type="button" id="btRegRecB"  value="Buscar" />
                                <input type="button" id="btRegRecG"  value="Grabar" />
                                <input type="button" id="btRegRecE"  value="Eliminar" />
                                <input type="button" id="btRegRecL"  value="Limpiar" />
                            </div>
                            <div id="contTablaRec">
                                <table id="tablaRecursos">
                                <thead>
                                    <tr>
                                        <th>ID Recurso</th>
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
		       	<div id="F" style="display: none">
                    <div id="contenidoFormRegAcciones">
                            <form id="FormRegAcciones">
                            <div id="datosFormRegAcciones">
                                <table id="tablaMAcciones">
                                <tr>
                                    <td><p>ID Acción</p></td>
                                    <td><input id="FormRegAccIDAcc" name="FormRegAccIDAcc" type="text" /></td>
                                    <td><p>&nbsp; Nombre Acción      </p></td>
                                    <td><input id="FormRegAccNomAcc" name="FormRegAccNomAcc" type="text" /></td>
                                </tr>
                                <tr>
                                    <td><p>&nbsp; Activo </p></td>
                                    <td><input id="FormRegAccActivo" name="FormRegAccActivo" type="checkbox" /></td>
                                </tr>
                                <tr >
                                    <td><p>Descripción </p></td>
                                    <td colspan="3"><textarea id="FormRegAccDesc" name="FormRegAccDesc" > </textarea></td>
                                </tr>
                                <tr>
                                </tr>
                                </table>
                            </div>
                            </form>
                            <br>
                            <div id="botonesFormRegMAcc">
                                <input type="button" id="btRegAccB"  value="Buscar" />
                                <input type="button" id="btRegAccG"  value="Grabar" />
                                <input type="button" id="btRegAccE"  value="Eliminar" />
                                <input type="button" id="btRegAccL"  value="Limpiar" />
                            </div>
                            <div id="contTablaAcc">
                                <table id="tablaAcciones">
                                <thead>
                                    <tr>
                                        <th>ID Acción</th>
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
		       	<div id="E" style="display: none">
		       		<h3>No disponible en esta versión</h3>
		       	</div>
		       	<div id="D" style="display: none">
		       		<div id="contenidoFormPermisos">
                            <form id="FormPermisos">
                            <div id="datosPermisos">
                                <table id="tablaMPermisos">
                                <tr>
                                    <td><p>Perfil</p></td>
                                    <td>
                                        <select id="FormPermisosIDPerfil" name="FormPermisosIDPerfil">
                                        </select>
                                    </td>
                                    <td><p>&nbsp; Recurso</p></td>
                                    <td>
                                        <select id="FormPermisosIDRecurso" name="FormPermisosIDRecurso">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Acción</p></td>
                                    <td>
                                        <select id="FormPermisosIDAccion" name="FormPermisosIDAccion">
                                        </select>
                                    </td>
                                    <td><p>&nbsp; Permiso </p></td>
                                    <td><input id="FormPermisosPermiso" name="FormPermisosPermiso" type="checkbox" /></td>
                                </tr>
                                <tr>
                                </tr>
                                </table>
                            </div>
                            </form>
                            <br>
                            <div id="botonesFormRegMPermisos">
                                <input type="button" id="btRegPermisosG"  value="Grabar" />
                                <input type="button" id="btRegPermisosE"  value="Eliminar" />
                                <input type="button" id="btRegPermisosL"  value="Limpiar" />
                            </div>
                            <div id="contTablaPermisos">
                                <table id="tablaPermisos">
                                <thead>
                                    <tr>
                                        <th>ID Perfil</th>
                                        <th>Perfil</th>
                                        <th>ID Recurso</th>
                                        <th>Recurso</th>
                                        <th>ID Acción</th>
                                        <th>Acción</th>
                                        <th>Permiso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                         </div>
                        </div>
		       	</div>
		       	<div id="T" style="display: none; font-size: 18px">
		       	  <p style="font-size: 18px;">
		       	    <h4>
		       		 <?php echo "Estimado ".$_SESSION['usuario']; ?>
		       		</h4>
                    Tus datos son:
                    </br>
                    ID Aplicación cliente: <?php echo $_SESSION['id_Cliente']; ?> 
		       		</br>
		       		Llave 1: <?php echo $_SESSION['LLAVE1']; ?> 
                    </br>
                    Llave 2: <?php echo $_SESSION['LLAVE2']; ?> 
                    </br>
		          </p>
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
<form id="FormUsuPerfiles">
    <div id="UsuPerfiles">
        
    </div>
</form>
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
<div id="confirmRecE">
    ¿Seguro que desea eliminar el registro?
</div>
<div id="confirmRecG">
    ¿Seguro que desea guardar el registro?
</div>
<div id="confirmAccE">
    ¿Seguro que desea eliminar el registro?
</div>
<div id="confirmAccG">
    ¿Seguro que desea guardar el registro?
</div>
<div id="confirmPermB">
    ¿Seguro que desea eliminar el registro?
</div>
<div id="confirmPermG">
    ¿Seguro que desea guardar el registro?
</div>
</body>
</html>
