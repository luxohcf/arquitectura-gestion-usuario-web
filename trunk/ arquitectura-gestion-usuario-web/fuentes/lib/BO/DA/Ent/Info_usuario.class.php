<?php

/********************************************************  
* Clase Info_usuario Autor: Luxo Lizama 
********************************************************/  

class Info_usuario{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_USUARIO; // VARCHAR(20) NOT NULL
private $NOMBRE_USUARIO; // VARCHAR(150) NOT NULL
private $DESCRIPCION_USUARIO; // VARCHAR(2000)
private $EMAIL; // VARCHAR(100) NOT NULL
private $FECHA_REGISTRO; // DATETIME NOT NULL
private $FECHA_NACIMIENTO; // DATE NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_usuario=null
					 ,$nombre_usuario=null
					 ,$descripcion_usuario=null
					 ,$email=null
					 ,$fecha_registro=null
					 ,$fecha_nacimiento=null
					)
{
	$this->ID_USUARIO = $id_usuario;
	$this->NOMBRE_USUARIO = $nombre_usuario;
	$this->DESCRIPCION_USUARIO = $descripcion_usuario;
	$this->EMAIL = $email;
	$this->FECHA_REGISTRO = $fecha_registro;
	$this->FECHA_NACIMIENTO = $fecha_nacimiento;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_USUARIO()
{
 return $this->ID_USUARIO;
}

public function setID_USUARIO($id_usuario)
{
 $this->ID_USUARIO = $id_usuario;
}

public function getNOMBRE_USUARIO()
{
 return $this->NOMBRE_USUARIO;
}

public function setNOMBRE_USUARIO($nombre_usuario)
{
 $this->NOMBRE_USUARIO = $nombre_usuario;
}

public function getDESCRIPCION_USUARIO()
{
 return $this->DESCRIPCION_USUARIO;
}

public function setDESCRIPCION_USUARIO($descripcion_usuario)
{
 $this->DESCRIPCION_USUARIO = $descripcion_usuario;
}

public function getEMAIL()
{
 return $this->EMAIL;
}

public function setEMAIL($email)
{
 $this->EMAIL = $email;
}

public function getFECHA_REGISTRO()
{
 return $this->FECHA_REGISTRO;
}

public function setFECHA_REGISTRO($fecha_registro)
{
 $this->FECHA_REGISTRO = $fecha_registro;
}

public function getFECHA_NACIMIENTO()
{
 return $this->FECHA_NACIMIENTO;
}

public function setFECHA_NACIMIENTO($fecha_nacimiento)
{
 $this->FECHA_NACIMIENTO = $fecha_nacimiento;
}

}
?>