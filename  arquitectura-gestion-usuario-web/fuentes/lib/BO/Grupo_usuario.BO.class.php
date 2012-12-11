<?php

include('..\DA\Grupo_usuario.DA.class.php');
/********************************************************  
* Clase Grupo_usuarioBO 
* Autor: Luxo Lizama 
********************************************************/  

class Grupo_usuarioBO {

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
* Funcion bExisteGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bExisteGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bBuscarGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bInsertarGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bModificarGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bEliminarGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bBajaGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bAltaGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		$obj = new Grupo_usuarioDA();
		return $obj->bValidarGrupo_usuario($Grupo_usuario, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>