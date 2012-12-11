<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$id = (isset($_POST['FormRegAccIDAcc']))?$_POST['FormRegAccIDAcc']:NULL;
$nm = (isset($_POST['FormRegAccNomAcc']))?$_POST['FormRegAccNomAcc']:NULL;
$ac = (isset($_POST['FormRegAccActivo']))?1:0;
$ds = (isset($_POST['FormRegAccDesc']))?$_POST['FormRegAccDesc']:NULL;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM ACCION WHERE ID_ACCION = '$id' AND ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows == 0) // Insert
{
    $mySqli->autocommit(FALSE);
    
    $queryInsInf = "INSERT INTO INFO_ACCION 
              (ID_ACCION,NOMBRE_ACCION,DESCRIPCION_ACCION, FECHA_REGISTRO)
              VALUES ('$id','$nm','$ds',CURDATE())";

    $res = $mySqli->query($queryInsInf);
    if($mySqli->affected_rows > 0)
    {
        $queryIns = "INSERT INTO ACCION 
                  (ID_ACCION,FECHA_ALTA,FLAG_ACTIVO,ID_CLIENTE) 
                  VALUES ('$id',CURDATE(),$ac,'$idCli')";

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

    $queryUpdInf = "UPDATE INFO_ACCION SET
                       NOMBRE_ACCION  = '$nm',
                       DESCRIPCION_ACCION  = '$ds'
                       WHERE ID_ACCION = '$id'";

    $res = $mySqli->query($queryUpdInf);
    
    if($mySqli->errno == 0)
    {
        if($mySqli->affected_rows > 0)
        {
            $flagCommit = TRUE;
        }
        
        $queryUpd = "UPDATE ACCION SET
                        FLAG_ACTIVO  = $ac
                        WHERE ID_ACCION = '$id'";

        $res = $mySqli->query($queryUpd);
        
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
    $data["html"] = "$msg - $querySelect - $queryInsInf - $queryIns - $queryUpdInf - $queryUpd ";
}
else 
{
    $data["html"] = "$msg";
}
echo json_encode($data);
?>