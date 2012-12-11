<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$idPer = (isset($_POST['FormPermisosIDPerfil']))?$_POST['FormPermisosIDPerfil']:NULL;
$idRec = (isset($_POST['FormPermisosIDRecurso']))?$_POST['FormPermisosIDRecurso']:NULL;
$idAcc = (isset($_POST['FormPermisosIDAccion']))?$_POST['FormPermisosIDAccion']:NULL;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM PERFIL_RECURSO WHERE ID_PERFIL  = '$idPer' AND 
                                                   ID_RECURSO = '$idRec' AND
                                                   ID_ACCION  = '$idAcc'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows > 0) // delete
{
    $mySqli->autocommit(FALSE);

    $queryDel = "DELETE FROM PERFIL_RECURSO WHERE ID_PERFIL  = '$idPer' AND 
                                                  ID_RECURSO = '$idRec' AND
                                                  ID_ACCION  = '$idAcc'";
    $res = $mySqli->query($queryDel);
    
    if($mySqli->affected_rows > 0)
    {
        $msg = "Se ha eliminado el permiso correctamente";
        $mySqli->commit();
        $mySqli->close();
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al eliminar el permiso";
    }
}
else
{
    $msg = "El permiso no existe";
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryDel";
}
else 
{
    $data["html"] = "$msg";
}

echo json_encode($data);
?>