<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="us">
<head>
    <meta charset="utf-8">
    <title>Aplicación Cliente de prueba</title>
</head>
<body>
<h3>Aplicación Cliente de prueba</h3>
<?php
// Incluir la libreria
require '/fuentes/lib/ValidadorPermisos.php';

// Creo el objeto validador

$v = new  Validador();

// Identificador de la aplicacion cliente
$idCliente = "1";
$Llave1    = "4cb811134b9d39fc3104bd06ce75abad41ab1b1d6bf108f388";
$Llave2    = "3366297a637d4a3a358dfc6faad2fcf56f5e6653c2100f36ef";

// LLamar a la funcion para el usuario 1
$idUser1   = "UsuarioPrueba1";
$recurso1  = "1"; //RecursoPrueba1

// validamos si el usuario 1 puede leer el recurso 1

$accion1 = "1"; //Leer

if($v->obtenerPermiso($idUser1,$idCliente,$Llave1,$Llave2,$recurso1,$accion1) == TRUE)
{
  echo "<hr>";
  echo "$idUser1 tiene permisos para Leer sobre RecursoPrueba1";
  echo "<hr>";
}
else 
{
  echo "<hr>";
  echo "$idUser1 no tiene permisos para Leer sobre RecursoPrueba1";
  echo "<hr>";	
}

// validamos si el usuario 1 puede modificar el recurso 1
$accion1 = "3"; //Modificar

if($v->obtenerPermiso($idUser1,$idCliente,$Llave1,$Llave2,$recurso1,$accion1) == TRUE)
{
  echo "<hr>";
  echo "$idUser1 tiene permisos para Modificar sobre RecursoPrueba1";
  echo "<hr>";
}
else 
{
  echo "<hr>";
  echo "$idUser1 no tiene permisos para Modificar sobre RecursoPrueba1";
  echo "<hr>";  
}

// validamos si el usuario 1 puede borrar el recurso 1
$accion1 = "2"; //Borrar

if($v->obtenerPermiso($idUser1,$idCliente,$Llave1,$Llave2,$recurso1,$accion1) == TRUE)
{
  echo "<hr>";
  echo "$idUser1 tiene permisos para Borrar sobre RecursoPrueba1";
  echo "<hr>";
}
else 
{
  echo "<hr>";
  echo "$idUser1 no tiene permisos para Borrar sobre RecursoPrueba1";
  echo "<hr>";  
}

?>
</body>
</html>

