<?php

include('DA\Usuario.DA.class.php');
/********************************************************  
* Clase UsuarioBO
* Autor: Luxo Lizama 
********************************************************/  

class UsuarioBO {

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
* Funcion bExisteUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bExisteUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bBuscarUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bInsertarUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bModificarUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bEliminarUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bBajaUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bAltaUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		$obj = new UsuarioDA();
		return $obj->bValidarUsuario($Usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>