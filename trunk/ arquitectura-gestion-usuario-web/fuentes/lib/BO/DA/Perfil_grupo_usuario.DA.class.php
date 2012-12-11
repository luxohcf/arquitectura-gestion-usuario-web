<?php

include('..\Ent\Perfil_grupo_usuario.class.php');
/********************************************************  
* Clase Perfil_grupo_usuarioDA Autor: Luxo Lizama 
********************************************************/  

class Perfil_grupo_usuarioDA {

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
* Funcion bExistePerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bExistePerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="SELECT 1 FROM PERFIL_GRUPO_USUARIO WHERE ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"];
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
		$aErrores["bExistePerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBuscarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBuscarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = false;
		$query ="SELECT ";
		$query.=     "ID_REGISTROPGU ,";
		$query.=     "ID_USUARIO ,";
		$query.=     "ID_GRUPO ,";
		$query.=     "ID_PERFIL ";
		$query.=" FROM PERFIL_GRUPO_USUARIO ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			else
			{
			$query .= " WHERE ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"];
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
			$Perfil_grupo_usuario = array();
			while($row = $res->fetch_assoc())
			{
				$Perfil_grupo_usuario[$x]['ID_REGISTROPGU'] = $row['ID_REGISTROPGU'];
				$Perfil_grupo_usuario[$x]['ID_USUARIO'] = $row['ID_USUARIO'];
				$Perfil_grupo_usuario[$x]['ID_GRUPO'] = $row['ID_GRUPO'];
				$Perfil_grupo_usuario[$x]['ID_PERFIL'] = $row['ID_PERFIL'];
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
		$aErrores["bBuscarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bInsertarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bInsertarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$query ="INSERT INTO PERFIL_GRUPO_USUARIO (";
		$query.="ID_REGISTROPGU ,";
		$query.="ID_USUARIO ,";
		$query.="ID_GRUPO ,";
		$query.="ID_PERFIL ";
		$query.=")";
		$query.=" VALUES (";
		$query.="'".$Perfil_grupo_usuario["ID_REGISTROPGU"]."',";
		$query.="'".$Perfil_grupo_usuario["ID_USUARIO"]."',";
		$query.= $Perfil_grupo_usuario["ID_GRUPO"].",";
		$query.= $Perfil_grupo_usuario["ID_PERFIL"]."";
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
		  $Perfil_grupo_usuario = array();
		  $Perfil_grupo_usuario['ID_insercion'] = $mySqli->insert_id;
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
		$aErrores["bInsertarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bModificarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bModificarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL_GRUPO_USUARIO ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."',";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."',";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"].",";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if(!$flag)
			{
			$query .= " SET ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"]."";
			$flag = TRUE;
		}
		$flag = FALSE;
		$query =" WHERE ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"];
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
		  $Perfil_grupo_usuario = array();
		  $Perfil_grupo_usuario['N_Modificados'] = $mySqli->affected_rows;
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
		$aErrores["bModificarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bEliminarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bEliminarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="DELETE FROM PERFIL_GRUPO_USUARIO ";
		$query =" WHERE ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"];
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
		  $Perfil_grupo_usuario = array();
		  $Perfil_grupo_usuario['N_Eliminados'] = $mySqli->affected_rows;
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
		$aErrores["bEliminarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bBajaPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bBajaPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL_GRUPO_USUARIO SET FLAG_ACTIVO = 0 ";
		$query =" WHERE ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"];
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
		  $Perfil_grupo_usuario = array();
		  $Perfil_grupo_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bBajaPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bAltaPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bAltaPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
		$flag = FALSE;
		$query ="UPDATE PERFIL_GRUPO_USUARIO SET FLAG_ACTIVO = 1 ";
		$query =" WHERE ";
		if($Perfil_grupo_usuario["ID_REGISTROPGU"] != NULL) // INT NOT NULL AUTO_INCREMENT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_REGISTROPGU = '".$Perfil_grupo_usuario["ID_REGISTROPGU"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_USUARIO"] != NULL) // VARCHAR(20)
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_USUARIO = '".$Perfil_grupo_usuario["ID_USUARIO"]."'";
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_GRUPO"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_GRUPO = ".$Perfil_grupo_usuario["ID_GRUPO"];
			$flag = TRUE;
		}
		if($Perfil_grupo_usuario["ID_PERFIL"] != NULL) // INT
		{
			if($flag)
			{
			$query .= " AND ";
			}
			$query.="ID_PERFIL = ".$Perfil_grupo_usuario["ID_PERFIL"];
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
		  $Perfil_grupo_usuario = array();
		  $Perfil_grupo_usuario['N_Bajas'] = $mySqli->affected_rows;
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
		$aErrores["bAltaPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}


/***********************************************  
* Funcion bValidarPerfil_grupo_usuario                 *  
* Parametros entrada:                          *  
*      $Perfil_grupo_usuario = Entidad                *  
* Parametros salida:                           *  
*       $aErrores = Array salida con errores   *  
*       TRUE  = ejecución correcta             *  
*       FALSE = ejecución incorrecta           *  
***********************************************/  
public function bValidarPerfil_grupo_usuario(&$Perfil_grupo_usuario, &$aErrores)
{
	try
	{
		/* Query aqui */
/* Logica aqui */
		return TRUE;
	}
	catch(Exception $e)
	{
		$aErrores["bValidarPerfil_grupo_usuario"]["Exception"]=$e;
		return FALSE;
	}
}

}
?>