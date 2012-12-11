<?php

include('..\DA\Accion.DA.class.php');
/********************************************************  
* Clase AccionBO 
* Autor: Luxo Lizama 
********************************************************/  

class AccionBO {

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
* Funcion bExisteAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bExisteAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bBuscarAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bInsertarAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bModificarAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bEliminarAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bBajaAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bAltaAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarAccion(&$Accion, &$aErrores)
{
	try
	{
		$obj = new AccionDA();
		return $obj->bValidarAccion($Accion, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarAccion"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>