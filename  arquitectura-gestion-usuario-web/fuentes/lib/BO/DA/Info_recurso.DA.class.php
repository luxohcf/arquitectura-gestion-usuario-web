<?php

require('lib\Ent\Info_recurso.class.php');
/********************************************************  
* Clase Info_recursoDA Autor: Luxo Lizama 
********************************************************/  

class Info_recursoDA {

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
* Funcion bExisteInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM INFO_RECURSO WHERE ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
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
		$aErrores["bExisteInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_RECURSO ,";
		$query.=     "NOMBRE_RECURSO ,";
		$query.=     "DESCRIPCION_RECURSO ,";
		$query.=     "FECHA_REGISTRO ";
		$query.=" FROM INFO_RECURSO ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
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
			$Info_recurso = array();
			while($row = $res->fetch_assoc())
			{
				$Info_recurso[$x]['ID_RECURSO'] = $row['ID_RECURSO'];
				$Info_recurso[$x]['NOMBRE_RECURSO'] = $row['NOMBRE_RECURSO'];
				$Info_recurso[$x]['DESCRIPCION_RECURSO'] = $row['DESCRIPCION_RECURSO'];
				$Info_recurso[$x]['FECHA_REGISTRO'] = $row['FECHA_REGISTRO'];
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
		$aErrores["bBuscarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO INFO_RECURSO (";
		$query.="ID_RECURSO ,";
		$query.="NOMBRE_RECURSO ,";
		$query.="DESCRIPCION_RECURSO ,";
		$query.="FECHA_REGISTRO ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Info_recurso["ID_RECURSO"].",";
		$query.="'".$Info_recurso["NOMBRE_RECURSO"]."',";
		$query.="'".$Info_recurso["DESCRIPCION_RECURSO"]."',";
		$query.="'".$Info_recurso["FECHA_REGISTRO"]."'";
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
		  $Info_recurso = array();
		  $Info_recurso['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_RECURSO ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"].",";
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."',";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."',";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
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
		  $Info_recurso = array();
		  $Info_recurso['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM INFO_RECURSO ";
		$query =" WHERE ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
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
		  $Info_recurso = array();
		  $Info_recurso['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_RECURSO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
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
		  $Info_recurso = array();
		  $Info_recurso['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_RECURSO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Info_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Info_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Info_recurso["NOMBRE_RECURSO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_RECURSO = '".$Info_recurso["NOMBRE_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["DESCRIPCION_RECURSO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_RECURSO = '".$Info_recurso["DESCRIPCION_RECURSO"]."'";
			$flag = TRUE;
		}
		if($Info_recurso["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_recurso["FECHA_REGISTRO"]."'";
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
		  $Info_recurso = array();
		  $Info_recurso['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_recurso                 *  
* Parametros entrada:                          *  
*      $Info_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_recurso(&$Info_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_recurso"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>