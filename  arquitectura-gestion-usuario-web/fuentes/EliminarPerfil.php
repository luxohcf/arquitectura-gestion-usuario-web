<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$idPer = (isset($_POST['FormRegPerIDPer']))?$_POST['FormRegPerIDPer']:NULL;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM PERFIL WHERE ID_PERFIL = '$idPer' AND ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows > 0) // delete
{
    $mySqli->autocommit(FALSE);
    $flagCommit = FALSE;

    $queryDelPerGrUsu = "DELETE FROM PERFIL_GRUPO_USUARIO
                       WHERE ID_PERFIL = '$idPer'";

    $res = $mySqli->query($queryDelPerGrUsu);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }
    
    $queryDelPerRec = "DELETE FROM PERFIL_RECURSO
                       WHERE ID_PERFIL = '$idPer'";

    $res = $mySqli->query($queryDelPerRec);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }

    $queryDelPer = "DELETE FROM PERFIL
                       WHERE ID_PERFIL = '$idPer'";

    $res = $mySqli->query($queryDelPer);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }

    $queryDelInfPer = "DELETE FROM INFO_PERFIL
                    WHERE ID_PERFIL = '$idPer'";

    $res = $mySqli->query($queryDelInfPer);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }
    
    if($flagCommit)
    {
        $msg = "Se han eliminado el perfil correctamente";
        $mySqli->commit();
        $mySqli->close();
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al eliminar el perfil";
    }
}
else
{
    $msg = "El perfil no existe";
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryDelPerGrUsu - $queryDelPerRec - $queryDelPer - $queryDelInfPer ";
}
else 
{
    $data["html"] = "$msg";
}

echo json_encode($data);
?>