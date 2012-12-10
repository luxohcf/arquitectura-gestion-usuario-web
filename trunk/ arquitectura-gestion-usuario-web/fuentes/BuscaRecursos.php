<?php
require("../config/parametros.php");

$aaData = array();
$Info_usuario = array();
$Usuario = array();

@session_start();
$id= $_SESSION['id_Cliente'];
$Info_usuario['ID_RECURSO'] = (isset($_POST['FormRegRecIDRec']))?$_POST['FormRegRecIDRec']:NULL;
$Info_usuario['NOMBRE_RECURSO'] = (isset($_POST['FormRegRecNomRec']))?$_POST['FormRegRecNomRec']:NULL;

$query = "SELECT 
            IR.ID_RECURSO, 
            IR.NOMBRE_RECURSO, 
            DATE_FORMAT(IR.FECHA_REGISTRO,'%d/%m/%Y') AS FECHA_REGISTRO,
             R.FLAG_ACTIVO,
            IR.DESCRIPCION_RECURSO
        FROM INFO_RECURSO IR 
        INNER JOIN RECURSO R ON IR.ID_RECURSO = R.ID_RECURSO
        WHERE R.ID_CLIENTE = '$id' ";

    if($Info_usuario["ID_RECURSO"] != NULL)
    {
        $query.="AND IR.ID_RECURSO = '".$Info_usuario["ID_RECURSO"]."'";
    }
    if($Info_usuario["NOMBRE_RECURSO"] != NULL)
    {
        $query.="AND IR.NOMBRE_RECURSO LIKE '%".$Info_usuario["NOMBRE_RECURSO"]."%'";
    }

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
                    $row['ID_RECURSO'],
                    $row['NOMBRE_RECURSO'],
                    $row['FECHA_REGISTRO'],
                    ($row['FLAG_ACTIVO'] == 1)?"Activo":"Inactivo",
                    $row['DESCRIPCION_RECURSO']
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