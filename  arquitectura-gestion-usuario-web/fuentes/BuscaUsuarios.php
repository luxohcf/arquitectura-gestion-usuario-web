<?php
require("../config/parametros.php");

$depurar = 0; // Cambiar a 1 para ver el detalle
$aaData = array();
$Info_usuario = array();
$Usuario = array();

@session_start();
$id= $_SESSION['id_Cliente'];
$idUsu= $_SESSION['usuario'];
$Info_usuario['ID_USUARIO'] = (isset($_POST['FormRegUsuIDUsu']))?$_POST['FormRegUsuIDUsu']:NULL;
$Info_usuario['NOMBRE_USUARIO'] = (isset($_POST['FormRegUsuNomUsu']))?$_POST['FormRegUsuNomUsu']:NULL;
$Info_usuario['EMAIL'] = (isset($_POST['FormRegUsuEmail']))?$_POST['FormRegUsuEmail']:NULL;

$query = "SELECT 
            IU.ID_USUARIO, 
            IU.NOMBRE_USUARIO, 
            IU.EMAIL,
             G.ID_GRUPO,
            DATE_FORMAT(IU.FECHA_NACIMIENTO,'%d/%m/%Y') AS FECHA_NACIMIENTO,
             U.FLAG_ACTIVO,
             U.PASSWORD,
            IU.DESCRIPCION_USUARIO
        FROM info_usuario IU 
        INNER JOIN usuario U ON IU.ID_USUARIO = U.ID_USUARIO
        LEFT JOIN usuarios_grupousuario UG ON IU.ID_USUARIO = UG.ID_USUARIO
        LEFT JOIN grupo_usuario G ON UG.ID_GRUPO = G.ID_GRUPO
        WHERE U.ID_CLIENTE = '$id' AND U.ID_USUARIO != '$idUsu'";

    if($Info_usuario["ID_USUARIO"] != NULL)
    {
        $query.="AND U.ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
    }
    if($Info_usuario["NOMBRE_USUARIO"] != NULL)
    {
        $query.="AND IU.NOMBRE_USUARIO LIKE '%".$Info_usuario["NOMBRE_USUARIO"]."%'";
    }
    if($Info_usuario["EMAIL"] != NULL)
    {
        $query.="AND IU.EMAIL = '".$Info_usuario["EMAIL"]."'";
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
                    $row['ID_USUARIO'],
                    $row['NOMBRE_USUARIO'],
                    $row['EMAIL'],
                    $row['ID_GRUPO'],
                    $row['FECHA_NACIMIENTO'],
                    ($row['FLAG_ACTIVO'] == 1)?"Activo":"Inactivo",
                    $row['PASSWORD'],
                    $row['DESCRIPCION_USUARIO']
                );
        }
    }

$aa = array(
     'sEcho' => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        'aaData' => $aaData);

if($depurar) // Detalle http://localhost:8080/Layout/fuentes/BuscaUsuarios.php
{
    echo "<span>";
    echo var_dump($_POST);
    echo "</span>";
    echo "<span>";
    echo var_dump($Info_usuario);
    echo "</span>";
    echo "<span>";
    echo var_dump($aErrores);
    echo "</span>";
    echo "<span>";
    echo var_dump($aa);
    echo "</span>";
   die;
}


echo json_encode($aa);

?>