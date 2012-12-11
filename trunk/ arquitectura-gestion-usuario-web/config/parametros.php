<?php

error_reporting(FALSE);

require_once("comunes.php");
/* Archivo de configuracion */
//$url = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
$url = "http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
$sXmlConfig = "$url/Layout/config/Config.xml";;
$xml = simplexml_load_file($sXmlConfig);


/* Variables de base de datos */
$V_HOST = $xml->Host;
$V_USER = $xml->User;
$V_PASS = $xml->Password;
$V_BBDD = $xml->BBDD;

/* Variables para mostrar trazas */
$depurar = FALSE; 
if($xml->depurarSQL == "1")
{
    $depurar = TRUE;
}
$depurarMax = FALSE; 
if($xml->depurarDUMP == "1")
{
    $depurarMax = TRUE;
    error_reporting(E_ALL | E_STRICT);
}

?>