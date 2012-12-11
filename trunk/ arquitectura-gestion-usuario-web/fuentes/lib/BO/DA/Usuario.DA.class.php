<?php

include('Ent\Usuario.class.php');
/********************************************************  
* Clase UsuarioDA Autor: Luxo Lizama 
********************************************************/  

class UsuarioDA {

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
* Funcion bExisteUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM USUARIO WHERE ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"];
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
		$aErrores["bExisteUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_USUARIO ,";
		$query.=     "PASSWORD ,";
		$query.=     "FECHA_ALTA ,";
		$query.=     "FECHA_BAJA ,";
		$query.=     "FLAG_ACTIVO ,";
		$query.=     "ID_CLIENTE ";
		$query.=" FROM USUARIO ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"];
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
			$Usuario = array();
			while($row = $res->fetch_assoc())
			{
				$Usuario[$x]['ID_USUARIO'] = $row['ID_USUARIO'];
				$Usuario[$x]['PASSWORD'] = $row['PASSWORD'];
				$Usuario[$x]['FECHA_ALTA'] = $row['FECHA_ALTA'];
				$Usuario[$x]['FECHA_BAJA'] = $row['FECHA_BAJA'];
				$Usuario[$x]['FLAG_ACTIVO'] = $row['FLAG_ACTIVO'];
				$Usuario[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
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
		$aErrores["bBuscarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO USUARIO (";
		$query.="ID_USUARIO ,";
		$query.="PASSWORD ,";
		$query.="FECHA_ALTA ,";
		$query.="FECHA_BAJA ,";
		$query.="FLAG_ACTIVO ,";
		$query.="ID_CLIENTE ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Usuario["ID_USUARIO"]."',";
		$query.="'".$Usuario["PASSWORD"]."',";
		$query.="'".$Usuario["FECHA_ALTA"]."',";
		$query.="'".$Usuario["FECHA_BAJA"]."',";
		$query.= $Usuario["FLAG_ACTIVO"].",";
		$query.= $Usuario["ID_CLIENTE"]."";
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
		  $Usuario = array();
		  $Usuario['ID_insercion'] = $mySqli->insert_id;
          $mySqli->commit();
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
		$aErrores["bInsertarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE USUARIO ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."',";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."',";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."',";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"].",";
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"];
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
		  $Usuario = array();
		  $Usuario['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM USUARIO ";
		$query =" WHERE ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"];
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
		  $Usuario = array();
		  $Usuario['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE USUARIO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"];
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
		  $Usuario = array();
		  $Usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE USUARIO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Usuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuario["PASSWORD"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PASSWORD = '".$Usuario["PASSWORD"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Usuario["ID_CLIENTE"];
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
		  $Usuario = array();
		  $Usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaUsuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarUsuario                 *  
* Parametros entrada:                          *  
*      $Usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarUsuario(&$Usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarUsuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>