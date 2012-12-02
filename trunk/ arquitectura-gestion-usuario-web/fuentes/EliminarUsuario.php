<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$idUsu = (isset($_POST['FormRegUsuIDUsu']))?$_POST['FormRegUsuIDUsu']:NULL;
$idUsu = str_replace(" ", "", $idUsu);

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM usuario WHERE ID_USUARIO = '$idUsu' AND ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows > 0) // delete
{
    $mySqli->autocommit(FALSE);
    $flagCommit = FALSE;

    $queryDelCLi = "DELETE FROM CLIENTE
                       WHERE ID_USUARIO = '$idUsu'";

    $res = $mySqli->query($queryDelCLi);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }

    $queryDelUsu = "DELETE FROM USUARIO
                       WHERE ID_USUARIO = '$idUsu'";

    $res = $mySqli->query($queryDelUsu);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }

    $queryDelInfUsu = "DELETE FROM INFO_USUARIO
                    WHERE ID_USUARIO = '$idUsu'";

    $res = $mySqli->query($queryDelInfUsu);
    if($mySqli->affected_rows > 0)
    {
        $flagCommit = TRUE;
    }
    
    if($flagCommit)
    {
        $msg = "Se han eliminado el usuario correctamente";
        $mySqli->commit();
        $mySqli->close();
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al eliminar el usuario";
    }
}
else
{
    $msg = "El usuario no existe";
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryDelUsu - $queryDelInfUsu - $queryDelCLi ";
}
else 
{
    $data["html"] = "$msg";
}

echo json_encode($data);
?>