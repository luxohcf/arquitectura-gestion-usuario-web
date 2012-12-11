<?php

include('..\Ent\Historico.class.php');
/********************************************************  
* Clase HistoricoDA Luxo Lizama 
********************************************************/  

class HistoricoDA {

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
* Funcion bExisteHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM HISTORICO WHERE ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."'";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"];
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
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
		$aErrores["bExisteHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_REGISTROH ,";
		$query.=     "FECHA_REGISTRO ,";
		$query.=     "ID_USUARIO ,";
		$query.=     "ID_ACCION ,";
		$query.=     "DESCRIPCION_REGISTRO ";
		$query.=" FROM HISTORICO ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."'";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"];
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
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
			$Historico = array();
			while($row = $res->fetch_assoc())
			{
				$Historico[$x]['ID_REGISTROH'] = $row['ID_REGISTROH'];
				$Historico[$x]['FECHA_REGISTRO'] = $row['FECHA_REGISTRO'];
				$Historico[$x]['ID_USUARIO'] = $row['ID_USUARIO'];
				$Historico[$x]['ID_ACCION'] = $row['ID_ACCION'];
				$Historico[$x]['DESCRIPCION_REGISTRO'] = $row['DESCRIPCION_REGISTRO'];
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
		$aErrores["bBuscarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO HISTORICO (";
		$query.="ID_REGISTROH ,";
		$query.="FECHA_REGISTRO ,";
		$query.="ID_USUARIO ,";
		$query.="ID_ACCION ,";
		$query.="DESCRIPCION_REGISTRO ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Historico["ID_REGISTROH"]."',";
		$query.="'".$Historico["FECHA_REGISTRO"]."',";
		$query.="'".$Historico["ID_USUARIO"]."',";
		$query.= $Historico["ID_ACCION"].",";
		$query.="'".$Historico["DESCRIPCION_REGISTRO"]."'";
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
		  $Historico = array();
		  $Historico['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE HISTORICO ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."',";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."',";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"].",";
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."'";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"];
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
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
		  $Historico = array();
		  $Historico['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM HISTORICO ";
		$query =" WHERE ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."'";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"];
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
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
		  $Historico = array();
		  $Historico['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE HISTORICO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."'";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"];
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
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
		  $Historico = array();
		  $Historico['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE HISTORICO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Historico["ID_REGISTROH"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROH = '".$Historico["ID_REGISTROH"]."'";
			$flag = TRUE;
		}
		if($Historico["FECHA_REGISTRO"] != NULL) // DATETIME NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="FECHA_REGISTRO = '".$Historico["FECHA_REGISTRO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Historico["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Historico["ID_ACCION"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_ACCION = ".$Historico["ID_ACCION"];
			$flag = TRUE;
		}
		if($Historico["DESCRIPCION_REGISTRO"] != NULL) // VARCHAR(2000)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="DESCRIPCION_REGISTRO = '".$Historico["DESCRIPCION_REGISTRO"]."'";
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
		  $Historico = array();
		  $Historico['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaHistorico"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarHistorico                 *  
* Parametros entrada:                          *  
*      $Historico = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarHistorico(&$Historico, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarHistorico"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>