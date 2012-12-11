<?php

/********************************************************  
* Clase Info_usuarioDA Autor: Luxo Lizama 
********************************************************/  

class Info_usuarioDA {

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
* Funcion bExisteInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM INFO_USUARIO WHERE ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
			$flag = TRUE;
		}
		$query .= ";";
        $aErrores["SQL"] = $query; 
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
		$aErrores["bExisteInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_USUARIO ,";
		$query.=     "NOMBRE_USUARIO ,";
		$query.=     "DESCRIPCION_USUARIO ,";
		$query.=     "EMAIL ,";
		$query.=     "FECHA_REGISTRO ,";
		$query.=     "FECHA_NACIMIENTO ";
		$query.=" FROM INFO_USUARIO ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
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
			$Info_usuario = array();
			while($row = $res->fetch_assoc())
			{
				$Info_usuario[$x]['ID_USUARIO'] = $row['ID_USUARIO'];
				$Info_usuario[$x]['NOMBRE_USUARIO'] = $row['NOMBRE_USUARIO'];
				$Info_usuario[$x]['DESCRIPCION_USUARIO'] = $row['DESCRIPCION_USUARIO'];
				$Info_usuario[$x]['EMAIL'] = $row['EMAIL'];
				$Info_usuario[$x]['FECHA_REGISTRO'] = $row['FECHA_REGISTRO'];
				$Info_usuario[$x]['FECHA_NACIMIENTO'] = $row['FECHA_NACIMIENTO'];
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
		$aErrores["bBuscarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO INFO_USUARIO (";
		$query.="ID_USUARIO ,";
		$query.="NOMBRE_USUARIO ,";
		$query.="DESCRIPCION_USUARIO ,";
		$query.="EMAIL ,";
		$query.="FECHA_REGISTRO ,";
		$query.="FECHA_NACIMIENTO ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Info_usuario["ID_USUARIO"]."',";
		$query.="'".$Info_usuario["NOMBRE_USUARIO"]."',";
		$query.="'".$Info_usuario["DESCRIPCION_USUARIO"]."',";
		$query.="'".$Info_usuario["EMAIL"]."',";
		$query.="'".$Info_usuario["FECHA_REGISTRO"]."',";
		$query.="STR_TO_DATE('".$Info_usuario["FECHA_NACIMIENTO"]."', 'dd/mm/yyyy')";
		$query.=")";
		$query.= ";";
        $aErrores["SQL"] = $query;
		$mySqli = new mysqli($this->Host, $this->User, $this->Pass, $this->BBDD);
		if($mySqli->connect_errno)
		{
		    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
		}
		$res = $mySqli->query($query);
		if($mySqli->affected_rows > 0)
		{
		  $Info_usuario = array();
		  $Info_usuario['ID_insercion'] = $mySqli->insert_id;
          $mySqli->commit();
		  $mySqli->close();
		}
        else if($mySqli->errno() == 1062)
        {
           $aErrores["Registro duplicado"] = $query;
           $mySqli->rollback();
           $mySqli->close();
        }
		else
		{
		  $aErrores["No se ha insertado el registro"] = $query;
          $mySqli->rollback();
		  $mySqli->close();
		  return FALSE;
		}
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bInsertarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_USUARIO ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."',";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."',";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
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
		  $Info_usuario = array();
		  $Info_usuario['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM INFO_USUARIO ";
		$query =" WHERE ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
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
		  $Info_usuario = array();
		  $Info_usuario['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_USUARIO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
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
		  $Info_usuario = array();
		  $Info_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_USUARIO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Info_usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Info_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["NOMBRE_USUARIO"] != NULL) // VARCHAR(150) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_USUARIO = '".$Info_usuario["NOMBRE_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["DESCRIPCION_USUARIO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_USUARIO = '".$Info_usuario["DESCRIPCION_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["EMAIL"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="EMAIL = '".$Info_usuario["EMAIL"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Info_usuario["FECHA_NACIMIENTO"] != NULL) // DATE NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_NACIMIENTO = '".$Info_usuario["FECHA_NACIMIENTO"]."'";
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
		  $Info_usuario = array();
		  $Info_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_usuario(&$Info_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>