<?php
error_reporting(E_ALL | E_STRICT);
require("../config/parametros.php");

@session_start();
echo "<hr><h3>\$_SESSION</h3><hr>";
var_dump($_SESSION);
echo "<hr><h3>\$_POST</h3><hr>";
var_dump($_POST);
echo "<hr><h3>\$_SERVER</h3><hr>";
var_dump($_SERVER);
echo "<hr>";
//var_dump($sXmlConfig);
//var_dump($xml);
//var_dump($url);
//var_dump($V_HOST);
//var_dump($V_USER);
//var_dump($V_PASS);
//var_dump($V_BBDD);

//echo 'Clave aleatoria: '.generar_clave(50).'';

$clave = "123456";
$hash = md5($clave);
echo "<hr><h3>Claves</h3><hr>";
echo $hash; 
echo "<hr>";
echo $clave;
echo "<hr>";
echo md5($hash);

?>