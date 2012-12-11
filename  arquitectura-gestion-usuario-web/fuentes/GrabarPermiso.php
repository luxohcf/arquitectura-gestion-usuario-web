<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$idPer = (isset($_POST['FormPermisosIDPerfil']))?$_POST['FormPermisosIDPerfil']:NULL;
$idRec = (isset($_POST['FormPermisosIDRecurso']))?$_POST['FormPermisosIDRecurso']:NULL;
$idAcc = (isset($_POST['FormPermisosIDAccion']))?$_POST['FormPermisosIDAccion']:NULL;
$acPer = (isset($_POST['FormPermisosPermiso']))?1:0;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM PERFIL_RECURSO WHERE ID_PERFIL  = '$idPer' AND 
                                                   ID_RECURSO = '$idRec' AND
                                                   ID_ACCION  = '$idAcc'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows == 0) // Insert
{
    $mySqli->autocommit(FALSE);
    
    $queryIns = "INSERT INTO perfil_recurso 
              (ID_PERFIL,ID_RECURSO,ID_ACCION, PERMISO)
              VALUES ('$idPer','$idRec','$idAcc',$acPer)";

    $res = $mySqli->query($queryIns);
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
else // Update 
{
    $mySqli->autocommit(FALSE);
    $flagCommit = FALSE;

    $queryUpd = "UPDATE perfil_recurso SET
                       PERMISO  = $acPer
                       WHERE ID_PERFIL  = '$idPer' AND 
                             ID_RECURSO = '$idRec' AND
                             ID_ACCION  = '$idAcc'";

    $res = $mySqli->query($queryUpd);

    if($mySqli->errno == 0)
    {
        if($mySqli->affected_rows > 0)
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

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryIns - $queryUpd ";
}
else 
{
    $data["html"] = "$msg";
}
echo json_encode($data);
?>