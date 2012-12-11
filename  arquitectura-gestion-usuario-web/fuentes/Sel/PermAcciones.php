<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 
                    G.ID_ACCION,
                    I.NOMBRE_ACCION
                FROM info_accion I
                INNER JOIN accion G
                ON I.ID_ACCION = G.ID_ACCION
                WHERE G.ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

?>
<option value="0">Seleccione una acción</option>
<?php

if($mySqli->affected_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
      echo "<option value='".$row['ID_ACCION']."'>".$row['NOMBRE_ACCION']."</option>";
    }
}
?>


