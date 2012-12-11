<?php
require("../config/parametros.php");

$data = array();
$msg = "";

@session_start();
$idCli = $_SESSION['id_Cliente'];
$arrayIdPerfiles = $_POST['ids'];
$IdUsuario = $_POST['idUser'];

if($arrayIdPerfiles != NULL)
{
    $mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
    
    $querySelect = "SELECT 1 FROM usuario WHERE ID_USUARIO = '$IdUsuario' AND ID_CLIENTE = '$idCli'";
    
    if($mySqli->connect_errno)
    {
        $data["Error conexion MySql"] = $mySqli->connect_error;
    }
    $res = $mySqli->query($querySelect);
    
    if($mySqli->affected_rows > 0) // delete
    {
        $flagCommit = FALSE;
        $mySqli->autocommit(FALSE);
        
        $queryDel = "DELETE FROM perfil_grupo_usuario WHERE ID_USUARIO = '$IdUsuario'";
        $res = $mySqli->query($queryDel);
        if($mySqli->affected_rows > 0)
        {
            $flagCommit = TRUE;
        }
        
        foreach ($arrayIdPerfiles as $id) {
            
            $queryIns = "INSERT INTO perfil_grupo_usuario (ID_USUARIO,ID_PERFIL)
                         VALUES ('$IdUsuario',$id)";
            $res = $mySqli->query($queryIns);
            if($mySqli->affected_rows > 0)
            {
                $flagCommit = TRUE;
            }
        }

        if($flagCommit)
        {
            $msg = "Se han asociado los perfiles correctamente";
            $mySqli->commit();
            $mySqli->close();
        }
        else {
           $mySqli->rollback(); 
           $mySqli->close();
           $msg = "Error al asociar los perfiles";
        }
    }
    else
    {
        $msg = "El usuario no existe";    
    }   
}
else {
	$msg = "No se ha seleccionado ningún perfil";    
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryDel - $queryIns ";
}
else 
{
    $data["html"] = "$msg";
}
echo json_encode($data);
?>