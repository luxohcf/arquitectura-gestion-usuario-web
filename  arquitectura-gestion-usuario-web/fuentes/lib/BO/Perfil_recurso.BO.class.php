<?php

include('..\DA\Perfil_recurso.DA.class.php');
/********************************************************  
* Clase Perfil_recursoBO 
* Autor: Luxo Lizama 
********************************************************/  

class Perfil_recursoBO {

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
* Funcion bExistePerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bExistePerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExistePerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bBuscarPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bInsertarPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bModificarPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bEliminarPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bBajaPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bAltaPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		$obj = new Perfil_recursoDA();
		return $obj->bValidarPerfil_recurso($Perfil_recurso, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>