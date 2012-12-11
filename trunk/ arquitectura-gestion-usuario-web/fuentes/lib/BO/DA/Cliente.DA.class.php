<?php

include('Ent\Cliente.class.php');
/********************************************************  
* Clase ClienteDA Autor: Luxo Lizama 
********************************************************/  

class ClienteDA {

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
* Funcion bExisteCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM CLIENTE WHERE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."'";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
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
		$aErrores["bExisteCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_CLIENTE ,";
		$query.=     "ID_USUARIO ,";
		$query.=     "LLAVE1 ,";
		$query.=     "LLAVE2 ";
		$query.=" FROM CLIENTE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."'";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
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
		if($mySqli->affected_rows > 0)
		{
			$x = 0;
			$Cliente = array();
			while($row = $res->fetch_assoc())
			{
				$Cliente[$x]['ID_CLIENTE'] = $row['ID_CLIENTE'];
				$Cliente[$x]['ID_USUARIO'] = $row['ID_USUARIO'];
				$Cliente[$x]['LLAVE1'] = $row['LLAVE1'];
				$Cliente[$x]['LLAVE2'] = $row['LLAVE2'];
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
		$aErrores["bBuscarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO CLIENTE (";
		$query.="ID_USUARIO ,";
		$query.="LLAVE1 ,";
		$query.="LLAVE2 ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Cliente["ID_USUARIO"]."',";
		$query.="'".$Cliente["LLAVE1"]."',";
		$query.="'".$Cliente["LLAVE2"]."'";
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
		  $Cliente = array();
		  $Cliente['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE CLIENTE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."',";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."',";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."'";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
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
		  $Cliente = array();
		  $Cliente['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM CLIENTE ";
		$query =" WHERE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."'";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
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
		  $Cliente = array();
		  $Cliente['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE CLIENTE SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."'";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
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
		  $Cliente = array();
		  $Cliente['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE CLIENTE SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Cliente["ID_CLIENTE"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_CLIENTE = '".$Cliente["ID_CLIENTE"]."'";
			$flag = TRUE;
		}
		if($Cliente["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Cliente["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE1"] != NULL) // VARCHAR(100) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE1 = '".$Cliente["LLAVE1"]."'";
			$flag = TRUE;
		}
		if($Cliente["LLAVE2"] != NULL) // VARCHAR(100)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="LLAVE2 = '".$Cliente["LLAVE2"]."'";
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
		  $Cliente = array();
		  $Cliente['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaCliente"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarCliente                 *  
* Parametros entrada:                          *  
*      $Cliente = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarCliente(&$Cliente, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarCliente"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>