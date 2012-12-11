<?php

include('..\Ent\Info_grupo_usuario.class.php');
/********************************************************  
* Clase Info_grupo_usuarioDA Autor: Luxo Lizama 
********************************************************/  

class Info_grupo_usuarioDA {

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
* Funcion bExisteInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM INFO_GRUPO_USUARIO WHERE ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
		$aErrores["bExisteInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_GRUPO ,";
		$query.=     "NOMBRE_GRUPO ,";
		$query.=     "DESCRIPCION_GRUPO ,";
		$query.=     "FECHA_REGISTRO ";
		$query.=" FROM INFO_GRUPO_USUARIO ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
			$Info_grupo_usuario = array();
			while($row = $res->fetch_assoc())
			{
				$Info_grupo_usuario[$x]['ID_GRUPO'] = $row['ID_GRUPO'];
				$Info_grupo_usuario[$x]['NOMBRE_GRUPO'] = $row['NOMBRE_GRUPO'];
				$Info_grupo_usuario[$x]['DESCRIPCION_GRUPO'] = $row['DESCRIPCION_GRUPO'];
				$Info_grupo_usuario[$x]['FECHA_REGISTRO'] = $row['FECHA_REGISTRO'];
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
		$aErrores["bBuscarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO INFO_GRUPO_USUARIO (";
		$query.="ID_GRUPO ,";
		$query.="NOMBRE_GRUPO ,";
		$query.="DESCRIPCION_GRUPO ,";
		$query.="FECHA_REGISTRO ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Info_grupo_usuario["ID_GRUPO"].",";
		$query.="'".$Info_grupo_usuario["NOMBRE_GRUPO"]."',";
		$query.="'".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."',";
		$query.="'".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
		  $Info_grupo_usuario = array();
		  $Info_grupo_usuario['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_GRUPO_USUARIO ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"].",";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."',";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."',";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
		  $Info_grupo_usuario = array();
		  $Info_grupo_usuario['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM INFO_GRUPO_USUARIO ";
		$query =" WHERE ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
		  $Info_grupo_usuario = array();
		  $Info_grupo_usuario['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_GRUPO_USUARIO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
		  $Info_grupo_usuario = array();
		  $Info_grupo_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE INFO_GRUPO_USUARIO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Info_grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Info_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Info_grupo_usuario["NOMBRE_GRUPO"] != NULL) // VARCHAR(50) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="NOMBRE_GRUPO = '".$Info_grupo_usuario["NOMBRE_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["DESCRIPCION_GRUPO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_GRUPO = '".$Info_grupo_usuario["DESCRIPCION_GRUPO"]."'";
			$flag = TRUE;
		}
		if($Info_grupo_usuario["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Info_grupo_usuario["FECHA_REGISTRO"]."'";
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
		  $Info_grupo_usuario = array();
		  $Info_grupo_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarInfo_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Info_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarInfo_grupo_usuario(&$Info_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarInfo_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>