<?php

include('..\Ent\Perfil_recurso.class.php');
/********************************************************  
* Clase Perfil_recursoDA Autor: Luxo Lizama 
********************************************************/  

class Perfil_recursoDA {

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
* Funcion bExistePerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM PERFIL_RECURSO WHERE ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"];
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"];
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
		$aErrores["bExistePerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_PERFIL ,";
		$query.=     "ID_RECURSO ,";
		$query.=     "ID_ACCION ,";
		$query.=     "ID_PRIORIDAD ,";
		$query.=     "PERMISO ";
		$query.=" FROM PERFIL_RECURSO ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"];
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"];
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
			$Perfil_recurso = array();
			while($row = $res->fetch_assoc())
			{
				$Perfil_recurso[$x]['ID_PERFIL'] = $row['ID_PERFIL'];
				$Perfil_recurso[$x]['ID_RECURSO'] = $row['ID_RECURSO'];
				$Perfil_recurso[$x]['ID_ACCION'] = $row['ID_ACCION'];
				$Perfil_recurso[$x]['ID_PRIORIDAD'] = $row['ID_PRIORIDAD'];
				$Perfil_recurso[$x]['PERMISO'] = $row['PERMISO'];
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
		$aErrores["bBuscarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO PERFIL_RECURSO (";
		$query.="ID_PERFIL ,";
		$query.="ID_RECURSO ,";
		$query.="ID_ACCION ,";
		$query.="ID_PRIORIDAD ,";
		$query.="PERMISO ";
		$query.=")";
		$query.=" VALUES (";
		$query.= $Perfil_recurso["ID_PERFIL"].",";
		$query.= $Perfil_recurso["ID_RECURSO"].",";
		$query.= $Perfil_recurso["ID_ACCION"].",";
		$query.= $Perfil_recurso["ID_PRIORIDAD"].",";
		$query.= $Perfil_recurso["PERMISO"]."";
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
		  $Perfil_recurso = array();
		  $Perfil_recurso['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL_RECURSO ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"].",";
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"].",";
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"].",";
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"].",";
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"];
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"];
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
		  $Perfil_recurso = array();
		  $Perfil_recurso['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM PERFIL_RECURSO ";
		$query =" WHERE ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"];
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"];
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
		  $Perfil_recurso = array();
		  $Perfil_recurso['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL_RECURSO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"];
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"];
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
		  $Perfil_recurso = array();
		  $Perfil_recurso['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL_RECURSO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Perfil_recurso["ID_PERFIL"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_recurso["ID_PERFIL"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_RECURSO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_RECURSO = ".$Perfil_recurso["ID_RECURSO"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_ACCION"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Perfil_recurso["ID_ACCION"];
			$flag = TRUE;
		}
		if($Perfil_recurso["ID_PRIORIDAD"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PRIORIDAD = ".$Perfil_recurso["ID_PRIORIDAD"];
			$flag = TRUE;
		}
		if($Perfil_recurso["PERMISO"] != NULL) // BOOL NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="PERMISO = ".$Perfil_recurso["PERMISO"];
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
		  $Perfil_recurso = array();
		  $Perfil_recurso['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPerfil_recurso                 *  
* Parametros entrada:                          *  
*      $Perfil_recurso = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPerfil_recurso(&$Perfil_recurso, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPerfil_recurso"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>