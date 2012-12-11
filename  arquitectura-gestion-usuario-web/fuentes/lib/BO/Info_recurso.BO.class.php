<?php

include('..\DA\Info_recurso.DA.class.php');
/********************************************************  
* Clase Info_recursoBO
* Autor: Luxo Lizama 
********************************************************/  

class Info_recursoBO {

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
* Funcion bExisteInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bExisteInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bBuscarInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bInsertarInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bModificarInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bEliminarInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bBajaInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bAltaInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		$obj = new Info_recursoDA();
		return $obj->bValidarInfo_recurso($Info_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>