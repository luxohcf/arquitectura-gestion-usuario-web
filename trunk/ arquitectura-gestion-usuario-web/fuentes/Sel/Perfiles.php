<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$id = (isset($_POST['FormRegUsuIDUsu']))?$_POST['FormRegUsuIDUsu']:NULL;
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

//http://www.designchemical.com/blog/index.php/jquery/create-add-remove-select-lists-using-jquery/

$html = "<script type='text/javascript'>
            $(document).ready(function() {
             
                $('#btn-add').click(function(){
                    $('#PerAsignados option:selected').each( function() {
                            $('#PerListado').append(\"<option value='\"+$(this).val()+\"'>\"+$(this).text()+\"</option>\");
                        $(this).remove();
                    });
                });
                $('#btn-remove').click(function(){
                    $('#PerListado option:selected').each( function() {
                        $('#PerAsignados').append(\"<option value='\"+$(this).val()+\"'>\"+$(this).text()+\"</option>\");
                        $(this).remove();
                    });
                });
             
            });
         </script>
         <link href='css/Mant/Perfiles.css' rel='stylesheet'>
         <fieldset>
            <legend id='legenPerfiles'>Perfiles</legend>
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
			<div id='SepPerfilesBotones'>
            	<a href='JavaScript:void(0);' id='btn-add'>&raquo;</a>
            	
            	<a href='JavaScript:void(0);' id='btn-remove'>&laquo;</a>
            </div>
         
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

$html .= "</select>
         </fieldset>";

$data["html"] = "$html";
echo json_encode($data);

?>

