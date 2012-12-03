<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 
                    G.ID_GRUPO,
                    I.NOMBRE_GRUPO
                FROM info_grupo_usuario I
                INNER JOIN grupo_usuario G
                ON I.ID_GRUPO = G.ID_GRUPO
                WHERE G.ID_CLIENTE = '$id' AND G.FLAG_ACTIVO = 1 ";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);
echo $querySelect;
?>
<option value="0">Seleccione un grupo</option>
<?php

if($mySqli->affected_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
      echo "<option value='".$row['ID_GRUPO']."'>".$row['NOMBRE_GRUPO']."</option>";
    }
}
?>


