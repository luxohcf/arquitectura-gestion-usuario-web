<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 
                    G.ID_PERFIL,
                    I.NOMBRE_PERFIL
                FROM info_perfil I
                INNER JOIN perfil G
                ON I.ID_PERFIL = G.ID_PERFIL
                WHERE G.ID_CLIENTE = '$idCli'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

?>
<option value="0">Seleccione un perfil</option>
<?php

if($mySqli->affected_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
      echo "<option value='".$row['ID_PERFIL']."'>".$row['NOMBRE_PERFIL']."</option>";
    }
}
?>


