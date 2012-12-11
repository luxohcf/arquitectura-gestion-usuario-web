<?php

include('..\Ent\Grupo_usuario.class.php');
/********************************************************  
* Clase Grupo_usuarioDA Autor: Luxo Lizama 
********************************************************/  

class Grupo_usuarioDA {

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
* Funcion bExisteGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM GRUPO_USUARIO WHERE ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"];
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
		$aErrores["bExisteGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_GRUPO ,";
		$query.=     "FECHA_ALTA ,";
		$query.=     "FECHA_BAJA ,";
		$query.=     "FLAG_ACTIVO ,";
		$query.=     "ID_CLIENTE ";
		$query.=" FROM GRUPO_USUARIO ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"];
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
			$Grupo_usuario = array();
			while($row = $res->fetch_assoc())
			{
				$Grupo_usuario[$x]['ID_GRUPO'] = $row['ID_GRUPO'];
				$Grupo_usuario[$x]['FECHA_ALTA'] = $row['FECHA_ALTA'];
				$Grupo_usuario[$x]['FECHA_BAJA'] = $row['FECHA_BAJA'];
				$Grupo_usuario[$x]['FLAG_ACTIVO'] = $row['FLAG_ACTIVO'];
				$Grupo_usuario[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
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
		$aErrores["bBuscarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO GRUPO_USUARIO (";
		$query.="ID_GRUPO ,";
		$query.="FECHA_ALTA ,";
		$query.="FECHA_BAJA ,";
		$query.="FLAG_ACTIVO ,";
		$query.="ID_CLIENTE ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Grupo_usuario["ID_GRUPO"].",";
		$query.="'".$Grupo_usuario["FECHA_ALTA"]."',";
		$query.="'".$Grupo_usuario["FECHA_BAJA"]."',";
		$query.= $Grupo_usuario["FLAG_ACTIVO"].",";
		$query.= $Grupo_usuario["ID_CLIENTE"]."";
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
		  $Grupo_usuario = array();
		  $Grupo_usuario['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE GRUPO_USUARIO ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"].",";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."',";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."',";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"].",";
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"];
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
		  $Grupo_usuario = array();
		  $Grupo_usuario['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM GRUPO_USUARIO ";
		$query =" WHERE ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"];
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
		  $Grupo_usuario = array();
		  $Grupo_usuario['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE GRUPO_USUARIO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"];
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
		  $Grupo_usuario = array();
		  $Grupo_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE GRUPO_USUARIO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Grupo_usuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_ALTA"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_ALTA = '".$Grupo_usuario["FECHA_ALTA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FECHA_BAJA"] != NULL) // DATETIME
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_BAJA = '".$Grupo_usuario["FECHA_BAJA"]."'";
			$flag = TRUE;
		}
		if($Grupo_usuario["FLAG_ACTIVO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FLAG_ACTIVO = ".$Grupo_usuario["FLAG_ACTIVO"];
			$flag = TRUE;
		}
		if($Grupo_usuario["ID_CLIENTE"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = ".$Grupo_usuario["ID_CLIENTE"];
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
		  $Grupo_usuario = array();
		  $Grupo_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarGrupo_usuario                 *  
* Parametros entrada:                          *  
*      $Grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarGrupo_usuario(&$Grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarGrupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>