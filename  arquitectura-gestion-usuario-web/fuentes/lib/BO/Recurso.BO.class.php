<?php

include('..\DA\Recurso.DA.class.php');
/********************************************************  
* Clase RecursoBO
* Autor: Luxo Lizama 
********************************************************/  

class RecursoBO {

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
* Funcion bExisteRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bExisteRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bBuscarRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bInsertarRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bModificarRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bEliminarRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bBajaRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bAltaRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		$obj = new RecursoDA();
		return $obj->bValidarRecurso($Recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>