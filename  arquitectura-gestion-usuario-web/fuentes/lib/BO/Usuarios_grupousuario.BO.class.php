<?php

include('..\DA\Usuarios_grupousuario.DA.class.php');
/********************************************************  
* Clase Usuarios_grupousuarioBO
* Autor: Luxo Lizama 
********************************************************/  

class Usuarios_grupousuarioBO {

/***********************************************  
* Constructor                                  *  
***********************************************/  

function __construct()
{
	/* Logica aqui */
}
/***********************************************  
* Funciones de acceso a la capa DA             *  
***********************************************/  

/***********************************************  
* Funcion bExisteUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bExisteUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bBuscarUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bInsertarUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bModificarUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bEliminarUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bBajaUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bAltaUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		$obj = new Usuarios_grupousuarioDA();
		return $obj->bValidarUsuarios_grupousuario($Usuarios_grupousuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>