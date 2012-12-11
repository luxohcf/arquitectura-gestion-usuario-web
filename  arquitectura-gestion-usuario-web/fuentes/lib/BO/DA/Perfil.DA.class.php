<?php

include('..\Ent\Perfil.class.php');
/********************************************************  
* Clase PerfilDA autogenerada Autor: Luxo Lizama 
********************************************************/  

class PerfilDA {

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
* Funcion bExistePerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM PERFIL WHERE ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"];
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
		$aErrores["bExistePerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_PERFIL ,";
		$query.=     "FECHA_ALTA ,";
		$query.=     "FECHA_BAJA ,";
		$query.=     "FLAG_ACTIVO ,";
		$query.=     "ID_CLIENTE ";
		$query.=" FROM PERFIL ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"];
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
			$Perfil = array();
			while($row = $res->fetch_assoc())
			{
				$Perfil[$x]['ID_PERFIL'] = $row['ID_PERFIL'];
				$Perfil[$x]['FECHA_ALTA'] = $row['FECHA_ALTA'];
				$Perfil[$x]['FECHA_BAJA'] = $row['FECHA_BAJA'];
				$Perfil[$x]['FLAG_ACTIVO'] = $row['FLAG_ACTIVO'];
				$Perfil[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
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
		$aErrores["bBuscarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO PERFIL (";
		$query.="ID_PERFIL ,";
		$query.="FECHA_ALTA ,";
		$query.="FECHA_BAJA ,";
		$query.="FLAG_ACTIVO ,";
		$query.="ID_CLIENTE ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Perfil["ID_PERFIL"].",";
		$query.="'".$Perfil["FECHA_ALTA"]."',";
		$query.="'".$Perfil["FECHA_BAJA"]."',";
		$query.= $Perfil["FLAG_ACTIVO"].",";
		$query.= $Perfil["ID_CLIENTE"]."";
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
		  $Perfil = array();
		  $Perfil['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"].",";
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."',";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."',";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"].",";
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"];
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
		  $Perfil = array();
		  $Perfil['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM PERFIL ";
		$query =" WHERE ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"];
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
		  $Perfil = array();
		  $Perfil['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"];
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
		  $Perfil = array();
		  $Perfil['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Perfil["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Perfil["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Perfil["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Perfil["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Perfil["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Perfil["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Perfil["ID_CLIENTE"];
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
		  $Perfil = array();
		  $Perfil['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaPerfil"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPerfil                 *  
* Parametros entrada:                          *  
*      $Perfil = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPerfil(&$Perfil, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPerfil"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>