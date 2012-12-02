<?php
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']); 
require("../config/parametros.php");
require("../fuentes/lib/BO/Info_usuario.BO.class.php");
require("../fuentes/lib/BO/Usuario.BO.class.php");
require("../fuentes/lib/BO/Cliente.BO.class.php");

$id     = str_replace(" ", "", $_POST['name']);
$nombre = $_POST['name'];
$pass   = $_POST['pass'];
$fecNac = $_POST['fecNac'];
$mail   = $_POST['mail'];
$desc   = $_POST['desc'];
$fecha  = strftime( "%Y%m%d%H%M%S", time());

$Info_usuario = array();
$Info_usuario['ID_USUARIO'] = (isset($id))?$id:null;

$data = array();
$aErrores = array();

$obj = new Info_usuarioBO();

/* Si el usuario no existe */
if($obj->bExisteInfo_usuario($Info_usuario, $aErrores) == FALSE)
{
    $Info_usuario['NOMBRE_USUARIO'] = (isset($nombre))?$nombre:"";
    $Info_usuario['DESCRIPCION_USUARIO'] = (isset($desc))?$desc:"";
    $Info_usuario['EMAIL'] = (isset($mail))?$mail:"";
    $Info_usuario['FECHA_REGISTRO'] = (isset($fecha))?$fecha:"null";
    $Info_usuario['FECHA_NACIMIENTO'] = (isset($fecNac))?$fecNac:"null";

    if($obj->bInsertarInfo_usuario($Info_usuario, $aErrores) == TRUE)
    {
        $aErrores["SQL-Info"] = $aErrores["SQL"];
        $Cliente["ID_USUARIO"] = $id;
        $Cliente["LLAVE1"] = ""; // Generar una llave
        $Cliente["LLAVE2"] = ""; // Generar otra llave

        /* Generar el registro de cliente */
        $obj1 = new ClienteBO();

        if($obj1->bInsertarCliente($Cliente, $aErrores) == TRUE)
        {
            $aErrores["SQL-Cliente"] = $aErrores["SQL"];
            $Usuario['ID_CLIENTE'] = $Cliente["ID_insercion"];
            $Usuario['ID_USUARIO'] = $id;
            $Usuario['FECHA_ALTA'] = (isset($fecha))?$fecha:"null";
            $Usuario['PASSWORD'] = (isset($pass))?$pass:"null";
            $Usuario["FLAG_ACTIVO"] = 1;

            /* Generar el registro con la clave y la activacion */
            $obj2 = new UsuarioBO();

            if($obj2->bInsertarUsuario($Usuario, $aErrores) == TRUE)
            {
                $aErrores["SQL-Usuario"] = $aErrores["SQL"];

                if($depurar == TRUE)
                {
                    $data["html"] = "Se ha registrado correctamente - ".$aErrores["SQL-Usuario"]."-".$aErrores["SQL-Cliente"]."-".$aErrores["SQL-Info"];
                }
                else
                {
                    $data["html"] = "Se ha registrado correctamente";  
                } 
            }
            else // Determinar el error 
            {
                /* Eliminar el registro en CLiente - pendiente */
                try
                {
                    $con = isset($aErrores["Error conexion MySql"])?$aErrores["Error conexion MySql"]:"";
                    
                    if(strlen($con) > 0)
                        $data["html"] = "Error:$con";
                    
                    $query = isset($aErrores["No se ha insertado el registro"])?$aErrores["No se ha insertado el registro"]:"" ;
                    
                    if(strlen($query) > 0)
                        $data["html"] = "Error al ejecutar: $query";
                }
                catch(Exception $e)
                {
                    $data["html"] = "Error:".$e->getMessage();
                }
            }
        }
        else // Determinar el error 
        {
            /* Eliminar el registro en Info_usuario - pendiente */
            try
            {
                $con = isset($aErrores["Error conexion MySql"])?$aErrores["Error conexion MySql"]:"";
                
                if(strlen($con) > 0)
                    $data["html"] = "Error:$con";
                
                $query = isset($aErrores["No se ha insertado el registro"])?$aErrores["No se ha insertado el registro"]:"" ;
                
                if(strlen($query) > 0)
                    $data["html"] = "Error al ejecutar: $query";
            }
            catch(Exception $e)
            {
                $data["html"] = "Error:".$e->getMessage();
            }
        }

    }
    else // Determinar el error 
    {
        try
        {
            $con = isset($aErrores["Error conexion MySql"])?$aErrores["Error conexion MySql"]:"";
            
            if(strlen($con) > 0)
                $data["html"] = "Error:$con";
            
            $query = isset($aErrores["No se ha insertado el registro"])?$aErrores["No se ha insertado el registro"]:"" ;
            
            if(strlen($query) > 0)
                $data["html"] = "Error al ejecutar: $query";
            
            $dupl = isset($aErrores["Registro duplicado"])?$aErrores["Registro duplicado"]:"";
            
            if(strlen($dupl) > 0)
                $data["html"] = "El registro ya existe";
        }
        catch(Exception $e)
        {
            $data["html"] = "Error:".$e->getMessage();
        }
    }
}
else
{
    if($depurar == TRUE)
    {
        $data["html"] = "El registro ya existe - ".$aErrores["SQL"];
    }
    else 
    {
        $data["html"] = "El registro ya existe";  
    }
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