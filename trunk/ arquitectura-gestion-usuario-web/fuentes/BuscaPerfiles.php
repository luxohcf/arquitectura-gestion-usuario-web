<?php
require("../config/parametros.php");

$aaData = array();
$Info_usuario = array();
$Usuario = array();

@session_start();
$id= $_SESSION['id_Cliente'];
$Info_usuario['ID_PERFIL'] = (isset($_POST['FormRegPerIDPer']))?$_POST['FormRegPerIDPer']:NULL;
$Info_usuario['NOMBRE_PERFIL'] = (isset($_POST['FormRegPerNomPer']))?$_POST['FormRegPerNomPer']:NULL;

$query = "SELECT 
            IP.ID_PERFIL, 
            IP.NOMBRE_PERFIL, 
            DATE_FORMAT(IP.FECHA_REGISTRO,'%d/%m/%Y') AS FECHA_REGISTRO,
             P.FLAG_ACTIVO,
            IP.DESCRIPCION_PERFIL
        FROM info_perfil IP 
        INNER JOIN perfil P ON IP.ID_PERFIL = P.ID_PERFIL
        WHERE P.ID_CLIENTE = '$id' ";

    if($Info_usuario["ID_PERFIL"] != NULL)
    {
        $query.="AND IP.ID_PERFIL = '".$Info_usuario["ID_PERFIL"]."'";
    }
    if($Info_usuario["NOMBRE_PERFIL"] != NULL)
    {
        $query.="AND IP.NOMBRE_PERFIL LIKE '%".$Info_usuario["NOMBRE_PERFIL"]."%'";
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
                    $row['ID_PERFIL'],
                    $row['NOMBRE_PERFIL'],
                    $row['FECHA_REGISTRO'],
                    ($row['FLAG_ACTIVO'] == 1)?"Activo":"Inactivo",
                    $row['DESCRIPCION_PERFIL']
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