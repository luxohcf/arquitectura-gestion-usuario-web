<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$id = (isset($_POST['FormRegUsuIDUsu']))?$_POST['FormRegUsuIDUsu']:NULL;
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$html = "<script type='text/javascript' src='js/Mant/Perfiles.js'></script>
         <link href='css/Mant/Perfiles.css' rel='stylesheet'>
         <table id='tablaAsigPerfiles'>
         <tr>
            <td style='width:45%'>Asignados</td>
            <td style='width:10%'></td>
            <td style='width:45%'>Disponibles</td>
         </tr>
         <tr>
            <td>
            <select name='PerAsignados' id='PerAsignados' multiple size='10'>";

	$query = "SELECT P.ID_PERFIL, P.NOMBRE_PERFIL
	          FROM info_perfil P INNER JOIN
	          perfil_grupo_usuario PGU ON P.ID_PERFIL = PGU.ID_PERFIL
	          WHERE PGU.ID_USUARIO = '$id'";

    if($mySqli->connect_errno)
    {
        $aErrores["Error conexion MySql"] = $mySqli->connect_error;
    }
    $res = $mySqli->query($query);
	
    /* Iterar los que ya tengo */
    if($mySqli->affected_rows > 0)
    {
        while($row = $res->fetch_assoc())
        {
 
           $html .= "<option value='".$row['ID_PERFIL']."'>".$row['NOMBRE_PERFIL']."</option>";
        }
    }
 
$html .= "</select>
          </td>
          <td>
                <a href='JavaScript:void(0);' id='btn-remove'>&laquo;</a>
            	<a href='JavaScript:void(0);' id='btn-add'>&raquo;</a>
          </td>
          <td>
          <select name='PerListado' id='PerListado' multiple size='10'>";
			
			/* Iterar el resto */
	$query = "SELECT IP.ID_PERFIL, IP.NOMBRE_PERFIL
	          FROM info_perfil IP INNER JOIN
	          perfil P ON P.ID_PERFIL = IP.ID_PERFIL
	          WHERE
	             NOT EXISTS (SELECT 1 FROM perfil_grupo_usuario PGU 
	                         WHERE PGU.ID_PERFIL = IP.ID_PERFIL
	                         AND PGU.ID_USUARIO = '$id') AND
	          P.ID_CLIENTE = $idCli ";

    if($mySqli->connect_errno)
    {
        $aErrores["Error conexion MySql"] = $mySqli->connect_error;
    }
    $res = $mySqli->query($query);
	
    /* Iterar los que ya tengo */
    if($mySqli->affected_rows > 0)
    {
        while($row = $res->fetch_assoc())
        {
 
           $html .= "<option value='".$row['ID_PERFIL']."'>".$row['NOMBRE_PERFIL']."</option>";
        }
    }

$html .= "</td></tr></table></select>";

$data["html"] = "$html";
echo json_encode($data);

?>

