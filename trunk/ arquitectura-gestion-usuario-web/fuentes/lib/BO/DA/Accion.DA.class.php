<?php

include('..\Ent\Accion.class.php');
/********************************************************  
* Clase AccionDA Autor: Luxo Lizama 
********************************************************/  

class AccionDA {

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $Host; // Hostname 
private $User; // Usuario 
private $Pass; // Password 
private $BBDD; // Base de datos 

/***********************************************  
* Constructor                                  *  
***********************************************/  

function __construct()
{
    require("/../../../../config/parametros.php");
    $this->Host = $V_HOST;
    $this->User = $V_USER;
    $this->Pass = $V_PASS;
    $this->BBDD = $V_BBDD;
}
/***********************************************  
* Funciones de acceso a la capa de datos       *  
***********************************************/  

/***********************************************  
* Funcion bExisteAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM ACCION WHERE ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"];
			$flag = TRUE;
		}
		$query .= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($res->num_rows == 0)
		{
		  $mySqli->close();
		  return FALSE;
		}
		  $mySqli->close();
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bExisteAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_ACCION ,";
		$query.=     "FECHA_ALTA ,";
		$query.=     "FECHA_BAJA ,";
		$query.=     "FLAG_ACTIVO ,";
		$query.=     "ID_CLIENTE ";
		$query.=" FROM ACCION ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"];
			$flag = TRUE;
		}
		$query .= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
			$x = 0;
			$Accion = array();
			while($row = $res->fetch_assoc())
			{
				$Accion[$x]['ID_ACCION'] = $row['ID_ACCION'];
				$Accion[$x]['FECHA_ALTA'] = $row['FECHA_ALTA'];
				$Accion[$x]['FECHA_BAJA'] = $row['FECHA_BAJA'];
				$Accion[$x]['FLAG_ACTIVO'] = $row['FLAG_ACTIVO'];
				$Accion[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
				$x++;
			}
		  $mySqli->close();
		}
		else
		{
		  $aErrores["No hay datos"] = $query;
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bBuscarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO ACCION (";
		$query.="ID_ACCION ,";
		$query.="FECHA_ALTA ,";
		$query.="FECHA_BAJA ,";
		$query.="FLAG_ACTIVO ,";
		$query.="ID_CLIENTE ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Accion["ID_ACCION"].",";
		$query.="'".$Accion["FECHA_ALTA"]."',";
		$query.="'".$Accion["FECHA_BAJA"]."',";
		$query.= $Accion["FLAG_ACTIVO"].",";
		$query.= $Accion["ID_CLIENTE"]."";
		$query.=")";
		$query.= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
		  $Accion = array();
		  $Accion['ID_insercion'] = $mySqli->insert_id;
		  $mySqli->close();
		}
		else
		{
		  $aErrores["No se ha insertado el registro"] = $query;
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE ACCION ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"].",";
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."',";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."',";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"].",";
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"];
			$flag = TRUE;
		}
		$query .= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
		  $Accion = array();
		  $Accion['N_Modificados'] = $mySqli->affected_rows;
		  $mySqli->close();
		}
		else
		{
		  $aErrores["No se ha modificado el registro"] = $query;
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bModificarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM ACCION ";
		$query =" WHERE ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"];
			$flag = TRUE;
		}
		$query .= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
		  $Accion = array();
		  $Accion['N_Eliminados'] = $mySqli->affected_rows;
		  $mySqli->close();
		}
		else
		{
		  $aErrores["No se ha eliminado el registro"] = $query;
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bEliminarAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE ACCION SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"];
			$flag = TRUE;
		}
		$query .= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
		  $Accion = array();
		  $Accion['N_Bajas'] = $mySqli->affected_rows;
		  $mySqli->close();
		}
		else
		{
		  $aErrores["No se ha dado de baja el registro"] = $query;
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bBajaAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE ACCION SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Accion["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Accion["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Accion["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Accion["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Accion["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Accion["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Accion["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Accion["ID_CLIENTE"];
			$flag = TRUE;
		}
		$query .= ";";
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
		  $Accion = array();
		  $Accion['N_Bajas'] = $mySqli->affected_rows;
		  $mySqli->close();
		}
		else
		{
		  $aErrores["No se ha dado de baja el registro"] = $query;
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bAltaAccion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarAccion                 *  
* Parametros entrada:                          *  
*      $Accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarAccion(&$Accion, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarAccion"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>