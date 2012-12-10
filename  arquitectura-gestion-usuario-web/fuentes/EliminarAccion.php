<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$id = (isset($_POST['FormRegAccIDAcc']))?$_POST['FormRegAccIDAcc']:NULL;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM ACCION WHERE ID_ACCION = '$id' AND ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows > 0) // delete
{
    $mySqli->autocommit(FALSE);
    $flagCommit = FALSE;

    $queryDelPerRec = "DELETE FROM PERFIL_RECURSO
                       WHERE ID_ACCION = '$id'";

    $res = $mySqli->query($queryDelPerRec);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }

    $queryDel = "DELETE FROM ACCION
                       WHERE ID_ACCION = '$id'";

    $res = $mySqli->query($queryDel);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }

    $queryDelInf = "DELETE FROM INFO_ACCION
                    WHERE ID_ACCION = '$id'";

    $res = $mySqli->query($queryDelInf);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }
    
    if($flagCommit)
    {
        $msg = "Se ha eliminado la acción correctamente";
        $mySqli->commit();
        $mySqli->close();
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al eliminar la acción";
    }
}
else
{
    $msg = "La acción no existe";
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryDelPerRec - $queryDel - $queryDelInf ";
}
else 
{
    $data["html"] = "$msg";
}

echo json_encode($data);
?>