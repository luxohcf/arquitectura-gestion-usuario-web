<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$idPer = (isset($_POST['FormRegPerIDPer']))?$_POST['FormRegPerIDPer']:NULL;
$nmPer = (isset($_POST['FormRegPerNomPer']))?$_POST['FormRegPerNomPer']:NULL;
$acPer = (isset($_POST['FormRegPerActivo']))?1:0;
$dsPer = (isset($_POST['FormRegPerDesc']))?$_POST['FormRegPerDesc']:NULL;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM perfil WHERE ID_PERFIL = '$idPer' AND ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows == 0) // Insert
{
    $mySqli->autocommit(FALSE);
    
    $queryInsInfPer = "INSERT INTO info_perfil 
              (ID_PERFIL,NOMBRE_PERFIL,DESCRIPCION_PERFIL, FECHA_REGISTRO)
              VALUES ('$idPer','$nmPer','$dsPer',CURDATE())";

    $res = $mySqli->query($queryInsInfPer);
    if($mySqli->affected_rows > 0)
    {
        $queryInsPer = "INSERT INTO perfil 
                  (ID_PERFIL,FECHA_ALTA,FLAG_ACTIVO,ID_CLIENTE) 
                  VALUES ('$idPer',CURDATE(),$acPer,'$idCli')";

        $res = $mySqli->query($queryInsPer);
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

    $queryUpdInfPer = "UPDATE info_perfil SET
                       NOMBRE_PERFIL  = '$nmPer',
                       DESCRIPCION_PERFIL  = '$dsPer'
                       WHERE ID_PERFIL = '$idPer'";

    $res = $mySqli->query($queryUpdInfPer);
    
    if($mySqli->errno == 0)
    {
        if($mySqli->affected_rows > 0)
        {
            $flagCommit = TRUE;
        }
        
        $queryUpdUsu = "UPDATE perfil SET
                        FLAG_ACTIVO  = $acPer
                        WHERE ID_PERFIL = '$idPer'";

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
    $data["html"] = "$msg - $querySelect - $queryInsInfPer - $queryInsPer - $queryUpdInfPer - $queryUpdUsu ";
}
else 
{
    $data["html"] = "$msg";
}
echo json_encode($data);
?>