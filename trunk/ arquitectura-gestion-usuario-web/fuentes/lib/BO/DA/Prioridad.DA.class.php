<?php

include('..\Ent\Prioridad.class.php');
/********************************************************  
* Clase PrioridadDA Autor: Luxo Lizama 
********************************************************/  

class PrioridadDA {

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
* Funcion bExistePrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM PRIORIDAD WHERE ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"];
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
		$aErrores["bExistePrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_PRIORIDAD ,";
		$query.=     "NOMBRE_PRIORIDAD ,";
		$query.=     "ID_CLIENTE ";
		$query.=" FROM PRIORIDAD ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"];
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
			$Prioridad = array();
			while($row = $res->fetch_assoc())
			{
				$Prioridad[$x]['ID_PRIORIDAD'] = $row['ID_PRIORIDAD'];
				$Prioridad[$x]['NOMBRE_PRIORIDAD'] = $row['NOMBRE_PRIORIDAD'];
				$Prioridad[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
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
		$aErrores["bBuscarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO PRIORIDAD (";
		$query.="ID_PRIORIDAD ,";
		$query.="NOMBRE_PRIORIDAD ,";
		$query.="ID_CLIENTE ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Prioridad["ID_PRIORIDAD"]."',";
		$query.="'".$Prioridad["NOMBRE_PRIORIDAD"]."',";
		$query.= $Prioridad["ID_CLIENTE"]."";
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
		  $Prioridad = array();
		  $Prioridad['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PRIORIDAD ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."',";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."',";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"];
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
		  $Prioridad = array();
		  $Prioridad['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM PRIORIDAD ";
		$query =" WHERE ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"];
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
		  $Prioridad = array();
		  $Prioridad['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PRIORIDAD SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"];
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
		  $Prioridad = array();
		  $Prioridad['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PRIORIDAD SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Prioridad["ID_PRIORIDAD"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = '".$Prioridad["ID_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["NOMBRE_PRIORIDAD"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PRIORIDAD = '".$Prioridad["NOMBRE_PRIORIDAD"]."'";
			$flag = TRUE;
		}
		if($Prioridad["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Prioridad["ID_CLIENTE"];
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
		  $Prioridad = array();
		  $Prioridad['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPrioridad                 *  
* Parametros entrada:                          *  
*      $Prioridad = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPrioridad(&$Prioridad, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPrioridad"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>