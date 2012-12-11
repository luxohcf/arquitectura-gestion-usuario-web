<?php
require("../config/parametros.php");

$aaData = array();
$Info_usuario = array();
$Usuario = array();

@session_start();
$id= $_SESSION['id_Cliente'];

$query = "SELECT DISTINCT 
            X.ID_PERFIL,
            IP.NOMBRE_PERFIL,
            X.ID_RECURSO,
            IR.NOMBRE_RECURSO,
            X.ID_ACCION,
            IA.NOMBRE_ACCION,
            X.PERMISO
        FROM perfil_recurso X 
        INNER JOIN info_perfil  IP ON IP.ID_PERFIL  = X.ID_PERFIL
        INNER JOIN info_recurso IR ON IR.ID_RECURSO = X.ID_RECURSO
        INNER JOIN info_accion  IA ON IA.ID_ACCION  = X.ID_ACCION
        INNER JOIN perfil  P ON IP.ID_PERFIL  = P.ID_PERFIL
        INNER JOIN recurso R ON IR.ID_RECURSO = R.ID_RECURSO
        INNER JOIN accion  A ON IA.ID_ACCION  = A.ID_ACCION
        WHERE P.ID_CLIENTE = '$id' AND
              R.ID_CLIENTE = '$id' AND
              A.ID_CLIENTE = '$id'";

    $mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
    
    if($mySqli->connect_errno)
    {
        $aErrores["Error conexion MySql"] = $mySqli->connect_error;
    }
    $res = $mySqli->query($query);

    if($mySqli->affected_rows > 0)
    {
        while($row = $res->fetch_assoc())
        {
            $aaData[] = array(                  
                    $row['ID_PERFIL'],
                    $row['NOMBRE_PERFIL'],
                    $row['ID_RECURSO'],
                    $row['NOMBRE_RECURSO'],
                    $row['ID_ACCION'],
                    $row['NOMBRE_ACCION'],
                    ($row['PERMISO'] == 1)?"Activo":"Inactivo"
                );
        }
    }

$aa = array(
     'sEcho' => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        'aaData' => $aaData);

echo json_encode($aa);
?>