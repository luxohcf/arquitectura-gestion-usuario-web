<?php

include('..\DA\Info_grupo_usuario.DA.class.php');
/********************************************************  
* Clase Info_grupo_usuarioBO
* Autor: Luxo Lizama 
********************************************************/  

class Info_grupo_usuarioBO {

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
* Funcion bExisteInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bExisteInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bBuscarInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bInsertarInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bModificarInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bEliminarInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bBajaInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bAltaInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Info_grupo_usuarioDA();
		return $obj->bValidarInfo_grupo_usuario($Info_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>