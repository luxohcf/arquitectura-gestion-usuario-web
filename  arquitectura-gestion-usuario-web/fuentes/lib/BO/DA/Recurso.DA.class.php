<?php

include('..\Ent\Recurso.class.php');
/********************************************************  
* Clase RecursoDA Autor: Luxo Lizama 
********************************************************/  

class RecursoDA {

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
* Funcion bExisteRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM RECURSO WHERE ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"];
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
		$aErrores["bExisteRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_RECURSO ,";
		$query.=     "FECHA_ALTA ,";
		$query.=     "FECHA_BAJA ,";
		$query.=     "FLAG_ACTIVO ,";
		$query.=     "ID_CLIENTE ";
		$query.=" FROM RECURSO ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"];
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
			$Recurso = array();
			while($row = $res->fetch_assoc())
			{
				$Recurso[$x]['ID_RECURSO'] = $row['ID_RECURSO'];
				$Recurso[$x]['FECHA_ALTA'] = $row['FECHA_ALTA'];
				$Recurso[$x]['FECHA_BAJA'] = $row['FECHA_BAJA'];
				$Recurso[$x]['FLAG_ACTIVO'] = $row['FLAG_ACTIVO'];
				$Recurso[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
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
		$aErrores["bBuscarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO RECURSO (";
		$query.="ID_RECURSO ,";
		$query.="FECHA_ALTA ,";
		$query.="FECHA_BAJA ,";
		$query.="FLAG_ACTIVO ,";
		$query.="ID_CLIENTE ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Recurso["ID_RECURSO"].",";
		$query.="'".$Recurso["FECHA_ALTA"]."',";
		$query.="'".$Recurso["FECHA_BAJA"]."',";
		$query.= $Recurso["FLAG_ACTIVO"].",";
		$query.= $Recurso["ID_CLIENTE"]."";
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
		  $Recurso = array();
		  $Recurso['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE RECURSO ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"].",";
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."',";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."',";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"].",";
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"];
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
		  $Recurso = array();
		  $Recurso['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM RECURSO ";
		$query =" WHERE ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"];
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
		  $Recurso = array();
		  $Recurso['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE RECURSO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"];
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
		  $Recurso = array();
		  $Recurso['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE RECURSO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Recurso["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Recurso["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Recurso["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Recurso["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Recurso["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Recurso["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Recurso["ID_CLIENTE"];
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
		  $Recurso = array();
		  $Recurso['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaRecurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarRecurso                 *  
* Parametros entrada:                          *  
*      $Recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarRecurso(&$Recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarRecurso"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>