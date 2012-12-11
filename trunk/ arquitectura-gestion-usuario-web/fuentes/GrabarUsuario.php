<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$idUsu = (isset($_POST['FormRegUsuIDUsu']))?$_POST['FormRegUsuIDUsu']:NULL;
$nmUsu = (isset($_POST['FormRegUsuNomUsu']))?$_POST['FormRegUsuNomUsu']:NULL;
$psUsu = (isset($_POST['FormRegUsuPass1']))?$_POST['FormRegUsuPass1']:NULL;
$grUsu = (isset($_POST['FormRegUsuGrupo']))?$_POST['FormRegUsuGrupo']:NULL;
$fnUsu = (isset($_POST['FormRegUsuFecNac']))?$_POST['FormRegUsuFecNac']:NULL;
$acUsu = (isset($_POST['FormRegUsuActivo']))?1:0;
$dsUsu = (isset($_POST['FormRegUsuDesc']))?$_POST['FormRegUsuDesc']:NULL;
$mlUsu = (isset($_POST['FormRegUsuEmail']))?$_POST['FormRegUsuEmail']:NULL;

$idUsu = str_replace(" ", "", $idUsu);
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM usuario WHERE ID_USUARIO = '$idUsu' AND ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows == 0) // Insert
{
    $mySqli->autocommit(FALSE);
    
    $queryInsInfUsu = "INSERT INTO info_usuario 
              (ID_USUARIO,NOMBRE_USUARIO,DESCRIPCION_USUARIO,
               EMAIL,FECHA_REGISTRO,FECHA_NACIMIENTO) 
              VALUES ('$idUsu','$nmUsu','$dsUsu',
               '$mlUsu',CURDATE(),STR_TO_DATE('$fnUsu','%d/%m/%Y'))";
    $res = $mySqli->query($queryInsInfUsu);
    if($mySqli->affected_rows > 0)
    {
        $queryInsUsu = "INSERT INTO usuario 
                  (ID_USUARIO,PASSWORD,
                   FECHA_ALTA,FLAG_ACTIVO,ID_CLIENTE) 
                  VALUES ('$idUsu','$psUsu',
                  CURDATE(),$acUsu,'$idCli')";

        $res = $mySqli->query($queryInsUsu);
        if($mySqli->affected_rows > 0)
        {
            $msg = "Se han guardado los cambios correctamente";
            $mySqli->commit();
            $mySqli->close();
        }
        else {
           $mySqli->rollback(); 
           $mySqli->close();
           $msg = "Error al insertar";
        }
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al insertar";
    }
}
else // Update 
{
    $mySqli->autocommit(FALSE);
    $flagCommit = FALSE;

    $queryUpdInfUsu = "UPDATE info_usuario SET
                       NOMBRE_USUARIO  = '$nmUsu',
                       DESCRIPCION_USUARIO  = '$dsUsu',
                       EMAIL  = '$mlUsu',
                       FECHA_NACIMIENTO  = STR_TO_DATE('$fnUsu','%d/%m/%Y')
                       WHERE ID_USUARIO = '$idUsu'";

    $res = $mySqli->query($queryUpdInfUsu);
    
    if($mySqli->errno == 0)
    {
        if($mySqli->affected_rows > 0)
        {
            $flagCommit = TRUE;
        }
        
        $queryUpdUsu = "UPDATE usuario SET
                        PASSWORD  = '$psUsu',
                        FLAG_ACTIVO  = $acUsu
                        WHERE ID_USUARIO = '$idUsu'";
    
        $res = $mySqli->query($queryUpdUsu);
        
        if($mySqli->errno == 0)
        {
            if($mySqli->affected_rows > 0)
            {
                $flagCommit = TRUE;
            }
            
            if($flagCommit)
            {
                $msg = "Se han guardado los cambios correctamente";
                $mySqli->commit();
                $mySqli->close();
            }
            else {
               $mySqli->rollback(); 
               $mySqli->close();
               $msg = "No se han realizado cambios";
            }
        }
        else {
           $mySqli->rollback(); 
           $mySqli->close();
           $msg = "Error al modificar";
        }
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al modificar";
    }

}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryInsInfUsu - $queryInsUsu - $queryUpdInfUsu - $queryUpdUsu ";
}
else 
{
	$data["html"] = "$msg";
}
echo json_encode($data);
?>