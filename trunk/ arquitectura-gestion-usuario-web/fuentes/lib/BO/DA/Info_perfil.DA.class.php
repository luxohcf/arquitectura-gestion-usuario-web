<?php

include('..\Ent\Info_perfil.class.php');
/********************************************************  
* Clase Info_perfilDA Autor: Luxo Lizama 
********************************************************/  

class Info_perfilDA {

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
* Funcion bExisteInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM INFO_PERFIL WHERE ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
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
		$aErrores["bExisteInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_PERFIL ,";
		$query.=     "NOMBRE_PERFIL ,";
		$query.=     "DESCRIPCION_PERFIL ,";
		$query.=     "FECHA_REGISTRO ";
		$query.=" FROM INFO_PERFIL ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
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
			$Info_perfil = array();
			while($row = $res->fetch_assoc())
			{
				$Info_perfil[$x]['ID_PERFIL'] = $row['ID_PERFIL'];
				$Info_perfil[$x]['NOMBRE_PERFIL'] = $row['NOMBRE_PERFIL'];
				$Info_perfil[$x]['DESCRIPCION_PERFIL'] = $row['DESCRIPCION_PERFIL'];
				$Info_perfil[$x]['FECHA_REGISTRO'] = $row['FECHA_REGISTRO'];
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
		$aErrores["bBuscarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO INFO_PERFIL (";
		$query.="ID_PERFIL ,";
		$query.="NOMBRE_PERFIL ,";
		$query.="DESCRIPCION_PERFIL ,";
		$query.="FECHA_REGISTRO ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Info_perfil["ID_PERFIL"].",";
		$query.="'".$Info_perfil["NOMBRE_PERFIL"]."',";
		$query.="'".$Info_perfil["DESCRIPCION_PERFIL"]."',";
		$query.="'".$Info_perfil["FECHA_REGISTRO"]."'";
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
		  $Info_perfil = array();
		  $Info_perfil['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_PERFIL ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"].",";
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."',";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."',";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
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
		  $Info_perfil = array();
		  $Info_perfil['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM INFO_PERFIL ";
		$query =" WHERE ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
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
		  $Info_perfil = array();
		  $Info_perfil['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_PERFIL SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
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
		  $Info_perfil = array();
		  $Info_perfil['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_PERFIL SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Info_perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Info_perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Info_perfil["NOMBRE_PERFIL"] != NULL) // VARCHAR(50)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_PERFIL = '".$Info_perfil["NOMBRE_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["DESCRIPCION_PERFIL"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_PERFIL = '".$Info_perfil["DESCRIPCION_PERFIL"]."'";
			$flag = TRUE;
		}
		if($Info_perfil["FECHA_REGISTRO"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_perfil["FECHA_REGISTRO"]."'";
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
		  $Info_perfil = array();
		  $Info_perfil['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_perfil                 *  
* Parametros entrada:                          *  
*      $Info_perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_perfil(&$Info_perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_perfil"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>