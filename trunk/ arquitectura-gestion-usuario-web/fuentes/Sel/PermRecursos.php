<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 
                    G.ID_RECURSO,
                    I.NOMBRE_RECURSO
                FROM info_recurso I
                INNER JOIN recurso G
                ON I.ID_RECURSO = G.ID_RECURSO
                WHERE G.ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

?>
<option value="0">Seleccione un recurso</option>
<?php

if($mySqli->affected_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
      echo "<option value='".$row['ID_RECURSO']."'>".$row['NOMBRE_RECURSO']."</option>";
    }
}
?>


