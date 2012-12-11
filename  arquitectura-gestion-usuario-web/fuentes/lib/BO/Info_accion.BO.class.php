<?php

include('..\DA\Info_accion.DA.class.php');
/********************************************************  
* Clase Info_accionBO
* Autor: Luxo Lizama 
********************************************************/  

class Info_accionBO {

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
* Funcion bExisteInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bExisteInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bBuscarInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bInsertarInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bModificarInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bEliminarInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bBajaInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bAltaInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		$obj = new Info_accionDA();
		return $obj->bValidarInfo_accion($Info_accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>