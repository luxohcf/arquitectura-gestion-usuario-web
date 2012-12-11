<?php

include('DA\Cliente.DA.class.php');
/********************************************************  
* Clase ClienteBO  
* Autor: Luxo Lizama 
********************************************************/  

class ClienteBO {

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
* Funcion bExisteCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bExisteCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bBuscarCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bInsertarCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bModificarCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bEliminarCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bBajaCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bAltaCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarCliente(&$Cliente, &$aErrores)
{
	try
	{
		$obj = new ClienteDA();
		return $obj->bValidarCliente($Cliente, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarCliente"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>