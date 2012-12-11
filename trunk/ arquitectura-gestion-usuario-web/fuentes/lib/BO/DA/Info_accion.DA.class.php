<?php

include('..\Ent\Info_accion.class.php');
/********************************************************  
* Clase Info_accionDA Luxo Lizama 
********************************************************/  

class Info_accionDA {

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
* Funcion bExisteInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM INFO_ACCION WHERE ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
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
		$aErrores["bExisteInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_ACCION ,";
		$query.=     "NOMBRE_ACCION ,";
		$query.=     "DESCRIPCION_ACCION ,";
		$query.=     "FECHA_REGISTRO ";
		$query.=" FROM INFO_ACCION ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
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
			$Info_accion = array();
			while($row = $res->fetch_assoc())
			{
				$Info_accion[$x]['ID_ACCION'] = $row['ID_ACCION'];
				$Info_accion[$x]['NOMBRE_ACCION'] = $row['NOMBRE_ACCION'];
				$Info_accion[$x]['DESCRIPCION_ACCION'] = $row['DESCRIPCION_ACCION'];
				$Info_accion[$x]['FECHA_REGISTRO'] = $row['FECHA_REGISTRO'];
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
		$aErrores["bBuscarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO INFO_ACCION (";
		$query.="ID_ACCION ,";
		$query.="NOMBRE_ACCION ,";
		$query.="DESCRIPCION_ACCION ,";
		$query.="FECHA_REGISTRO ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Info_accion["ID_ACCION"].",";
		$query.="'".$Info_accion["NOMBRE_ACCION"]."',";
		$query.="'".$Info_accion["DESCRIPCION_ACCION"]."',";
		$query.="'".$Info_accion["FECHA_REGISTRO"]."'";
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
		  $Info_accion = array();
		  $Info_accion['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_ACCION ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"].",";
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."',";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."',";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
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
		  $Info_accion = array();
		  $Info_accion['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM INFO_ACCION ";
		$query =" WHERE ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
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
		  $Info_accion = array();
		  $Info_accion['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_ACCION SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
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
		  $Info_accion = array();
		  $Info_accion['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_ACCION SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Info_accion["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Info_accion["ID_ACCION"];
			$flag = TRUE;
		}
		if($Info_accion["NOMBRE_ACCION"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_ACCION = '".$Info_accion["NOMBRE_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["DESCRIPCION_ACCION"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_ACCION = '".$Info_accion["DESCRIPCION_ACCION"]."'";
			$flag = TRUE;
		}
		if($Info_accion["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_accion["FECHA_REGISTRO"]."'";
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
		  $Info_accion = array();
		  $Info_accion['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_accion                 *  
* Parametros entrada:                          *  
*      $Info_accion = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_accion(&$Info_accion, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_accion"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>