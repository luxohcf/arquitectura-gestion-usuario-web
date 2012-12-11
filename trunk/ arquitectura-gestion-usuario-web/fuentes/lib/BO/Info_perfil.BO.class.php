<?php

include('..\DA\Info_perfil.DA.class.php');
/********************************************************  
* Clase Info_perfilBO
* Autor: Luxo Lizama 
********************************************************/  

class Info_perfilBO {

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
* Funcion bExisteInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bExisteInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bBuscarInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bInsertarInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bModificarInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bEliminarInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bBajaInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bAltaInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		$obj = new Info_perfilDA();
		return $obj->bValidarInfo_perfil($Info_perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>