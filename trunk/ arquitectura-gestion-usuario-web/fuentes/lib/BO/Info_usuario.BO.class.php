<?php
require('DA\Info_usuario.DA.class.php');
/********************************************************  
* Clase Info_usuarioBO
* Autor: Luxo Lizama 
********************************************************/  

class Info_usuarioBO {

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
* Funcion bExisteInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bExisteInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bBuscarInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bInsertarInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bModificarInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bEliminarInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bBajaInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bAltaInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_usuarioDA();
		return $obj->bValidarInfo_usuario($Info_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>