<?php

include('..\DA\Perfil.DA.class.php');
/********************************************************  
* Clase PerfilBO 
* Autor: Luxo Lizama 
********************************************************/  

class PerfilBO {

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
* Funcion bExistePerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bExistePerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExistePerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bBuscarPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bInsertarPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bModificarPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bEliminarPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bBajaPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bAltaPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		$obj = new PerfilDA();
		return $obj->bValidarPerfil($Perfil, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>