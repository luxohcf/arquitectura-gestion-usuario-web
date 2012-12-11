<?php

include('..\DA\Perfil_grupo_usuario.DA.class.php');
/********************************************************  
* Clase Perfil_grupo_usuarioBO 
* Autor: Luxo Lizama 
********************************************************/  

class Perfil_grupo_usuarioBO {

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
* Funcion bExistePerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bExistePerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExistePerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bBuscarPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bInsertarPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bModificarPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bEliminarPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bBajaPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bAltaPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Perfil_grupo_usuarioDA();
		return $obj->bValidarPerfil_grupo_usuario($Perfil_grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>