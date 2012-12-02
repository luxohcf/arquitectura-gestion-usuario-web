<?php 
require("../config/parametros.php");

$idUsu = str_replace(" ", "", $_POST['name']);
$nmUsu = $_POST['name'];
$psUsu = $_POST['pass'];
$fnUsu = $_POST['fecNac'];
$mlUsu = $_POST['mail'];
$dsUsu = $_POST['desc'];
$acUsu = 1;
$data  = array();

/* Si el usuario no existe */
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

$querySelect = "SELECT 1 FROM usuario WHERE ID_USUARIO = '$idUsu'";

if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($querySelect);

if($mySqli->affected_rows == 0) // Insert
{
    $mySqli->autocommit(FALSE);
    
    $queryInsInfUsu = "INSERT INTO info_usuario 
                      (ID_USUARIO,NOMBRE_USUARIO,DESCRIPCION_USUARIO,
                       EMAIL,FECHA_REGISTRO,FECHA_NACIMIENTO) 
                      VALUES ('$idUsu','$nmUsu','$dsUsu',
                       '$mlUsu',CURDATE(),STR_TO_DATE('$fnUsu','%d/%m/%Y'))";
    $res = $mySqli->query($queryInsInfUsu);
    if($mySqli->affected_rows > 0)
    {
        //Crear el cliente
        $llave1=generar_clave(50);
        $llave2=generar_clave(50);
        
        $queryInsCli = "INSERT INTO cliente (ID_USUARIO,LLAVE1,LLAVE2)
                        VALUES ('$idUsu','$llave1','$llave2')";
        $res = $mySqli->query($queryInsCli);
        if($mySqli->affected_rows > 0)
        {
            $idCli = $mySqli->insert_id;
            $queryInsUsu = "INSERT INTO usuario 
                          (ID_USUARIO,PASSWORD,
                           FECHA_ALTA,FLAG_ACTIVO,ID_CLIENTE) 
                          VALUES ('$idUsu','$psUsu',
                          CURDATE(),$acUsu,'$idCli')";

            $res = $mySqli->query($queryInsUsu);
            if($mySqli->affected_rows > 0)
            {
                $msg = "Se ha registrado correctamente";
                $mySqli->commit();
                $mySqli->close();
            }
            else {
               $mySqli->rollback(); 
               $mySqli->close();
               $msg = "Error al ejecutar [$queryInsUsu]";
            }
        }
        else {
           $mySqli->rollback(); 
           $mySqli->close();
           $msg = "Error al ejecutar [$queryInsCli]";
        }
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al ejecutar [$queryInsInfUsu]";
    }
}
else 
{
   $msg = "El registro ya existe";  
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryInsInfUsu - $queryInsUsu - $queryInsCli ";
}
else 
{
    $data["html"] = "$msg";
}

if($depurarMax == TRUE)
{
    var_dump($_POST);
    var_dump($obj);
    var_dump($_SERVER);
    var_dump($sXmlConfig);
    var_dump($xml);
    var_dump($url);
    var_dump($V_HOST);
    var_dump($V_USER);
    var_dump($V_PASS);
    var_dump($V_BBDD);
    var_dump($data);
    var_dump($Info_usuario);
    var_dump($aErrores);
}

echo json_encode($data);

?>