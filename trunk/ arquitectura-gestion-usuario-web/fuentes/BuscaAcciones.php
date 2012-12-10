<?php
require("../config/parametros.php");

$aaData = array();
$Info_usuario = array();
$Usuario = array();

@session_start();
$id= $_SESSION['id_Cliente'];
$Info_usuario['ID_ACCION'] = (isset($_POST['FormRegAccIDAcc']))?$_POST['FormRegAccIDAcc']:NULL;
$Info_usuario['NOMBRE_ACCION'] = (isset($_POST['FormRegAccNomAcc']))?$_POST['FormRegAccNomAcc']:NULL;

$query = "SELECT 
            IA.ID_ACCION, 
            IA.NOMBRE_ACCION, 
            DATE_FORMAT(IA.FECHA_REGISTRO,'%d/%m/%Y') AS FECHA_REGISTRO,
             A.FLAG_ACTIVO,
            IA.DESCRIPCION_ACCION
        FROM INFO_ACCION IA 
        INNER JOIN ACCION A ON IA.ID_ACCION = A.ID_ACCION
        WHERE A.ID_CLIENTE = '$id' ";

    if($Info_usuario["ID_ACCION"] != NULL)
    {
        $query.="AND IA.ID_ACCION = '".$Info_usuario["ID_ACCION"]."'";
    }
    if($Info_usuario["NOMBRE_ACCION"] != NULL)
    {
        $query.="AND IA.NOMBRE_ACCION LIKE '%".$Info_usuario["NOMBRE_ACCION"]."%'";
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
                    $row['ID_ACCION'],
                    $row['NOMBRE_ACCION'],
                    $row['FECHA_REGISTRO'],
                    ($row['FLAG_ACTIVO'] == 1)?"Activo":"Inactivo",
                    $row['DESCRIPCION_ACCION']
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