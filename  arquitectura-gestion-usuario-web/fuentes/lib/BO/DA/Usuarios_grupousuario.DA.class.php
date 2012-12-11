<?php

include('..\Ent\Usuarios_grupousuario.class.php');
/********************************************************  
* Clase Usuarios_grupousuarioDA Autor: Luxo Lizama 
********************************************************/  

class Usuarios_grupousuarioDA {

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
* Funcion bExisteUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExisteUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM USUARIOS_GRUPOUSUARIO WHERE ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"];
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
		$aErrores["bExisteUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_USUARIO ,";
		$query.=     "ID_GRUPO ";
		$query.=" FROM USUARIOS_GRUPOUSUARIO ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"];
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
			$Usuarios_grupousuario = array();
			while($row = $res->fetch_assoc())
			{
				$Usuarios_grupousuario[$x]['ID_USUARIO'] = $row['ID_USUARIO'];
				$Usuarios_grupousuario[$x]['ID_GRUPO'] = $row['ID_GRUPO'];
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
		$aErrores["bBuscarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO USUARIOS_GRUPOUSUARIO (";
		$query.="ID_USUARIO ,";
		$query.="ID_GRUPO ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Usuarios_grupousuario["ID_USUARIO"]."',";
		$query.= $Usuarios_grupousuario["ID_GRUPO"]."";
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
		  $Usuarios_grupousuario = array();
		  $Usuarios_grupousuario['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE USUARIOS_GRUPOUSUARIO ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"];
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
		  $Usuarios_grupousuario = array();
		  $Usuarios_grupousuario['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM USUARIOS_GRUPOUSUARIO ";
		$query =" WHERE ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"];
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
		  $Usuarios_grupousuario = array();
		  $Usuarios_grupousuario['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE USUARIOS_GRUPOUSUARIO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"];
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
		  $Usuarios_grupousuario = array();
		  $Usuarios_grupousuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE USUARIOS_GRUPOUSUARIO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Usuarios_grupousuario["ID_USUARIO"] != NULL) // VARCHAR(20) NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Usuarios_grupousuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Usuarios_grupousuario["ID_GRUPO"] != NULL) // INT NOT NULL
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Usuarios_grupousuario["ID_GRUPO"];
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
		  $Usuarios_grupousuario = array();
		  $Usuarios_grupousuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarUsuarios_grupousuario                 *  
* Parametros entrada:                          *  
*      $Usuarios_grupousuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarUsuarios_grupousuario(&$Usuarios_grupousuario, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarUsuarios_grupousuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>