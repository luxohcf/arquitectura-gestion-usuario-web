<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="us">
<head>
    <meta charset="utf-8">
    <title>Aplicación Cliente de prueba 2</title>
</head>
<body>
<h3>Aplicación Cliente de prueba 2</h3>
<?php
// Incluir la libreria
require '/fuentes/lib/ValidadorPermisos.php';

// Creo el objeto validador

$v = new  Validador();

// Identificador de la aplicacion cliente
$idCliente = "1";
$Llave1    = "c929f2210333206f417e3862f431776ddd0894e849355e5d45";
$Llave2    = "312351bff07989769097660a563950658051a3c40561002834";

// LLamar a la funcion para el usuario 1
$idUser1   = "User1";
$recurso1  = "1"; //RecursoPrueba1

// validamos si el usuario 1 puede leer el recurso 1

$accion = "1"; //Leer
echo "<h3>$idUser1</h3>";
echo "<hr>";
if($v->obtenerPermiso($idUser1,$idCliente,$Llave1,$Llave2,$recurso1,$accion) == FALSE)
{
  echo " no";
}
echo " tiene permisos para Leer sobre Recurso prueba<hr>";

// validamos si el usuario 1 puede modificar el recurso 1
$accion = "2"; //Modificacion

if($v->obtenerPermiso($idUser1,$idCliente,$Llave1,$Llave2,$recurso1,$accion) == FALSE)
{
  echo " no";
}
echo " tiene permisos para Modificacion sobre Recurso prueba<hr>";

// validamos si el usuario 1 puede borrar el recurso 1
$accion = "3"; //Borrar

if($v->obtenerPermiso($idUser1,$idCliente,$Llave1,$Llave2,$recurso1,$accion) == FALSE)
{
  echo " no";
}
echo " tiene permisos para Eliminar sobre Recurso prueba<hr>";

?>
</body>
</html>

