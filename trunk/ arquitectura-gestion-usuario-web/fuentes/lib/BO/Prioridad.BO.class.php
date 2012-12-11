<?php

include('..\DA\Prioridad.DA.class.php');
/********************************************************  
* Clase PrioridadBO
* Autor: Luxo Lizama 
********************************************************/  

class PrioridadBO {

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
* Funcion bExistePrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bExistePrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExistePrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bBuscarPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bInsertarPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bModificarPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bEliminarPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bBajaPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bAltaPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		$obj = new PrioridadDA();
		return $obj->bValidarPrioridad($Prioridad, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>