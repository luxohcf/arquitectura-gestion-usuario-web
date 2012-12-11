<?php

include('..\DA\Historico.DA.class.php');
/********************************************************  
* Clase HistoricoBO 
* Autor: Luxo Lizama 
********************************************************/  

class HistoricoBO {

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
* Funcion bExisteHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bExisteHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bExisteHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bBuscarHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bInsertarHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bModificarHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bModificarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bEliminarHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bBajaHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bBajaHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bAltaHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bAltaHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarHistorico(&$Historico, &$aErrores)
{
	try
	{
		$obj = new HistoricoDA();
		return $obj->bValidarHistorico($Historico, $aErrores);
	}
	catch(Exception $e)
	{
		$aErrores["bValidarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>