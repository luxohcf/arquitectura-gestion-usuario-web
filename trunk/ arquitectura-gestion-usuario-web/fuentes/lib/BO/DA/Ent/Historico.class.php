<?php

/********************************************************  
* Clase Historico Autor: Luxo Lizama 
********************************************************/  

class Historico{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_REGISTROH; // INT NOT NULL AUTO_INCREMENT
private $FECHA_REGISTRO; // DATETIME NOT NULL
private $ID_USUARIO; // VARCHAR(20)
private $ID_ACCION; // INT
private $DESCRIPCION_REGISTRO; // VARCHAR(2000)

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_registroh=null
					 ,$fecha_registro=null
					 ,$id_usuario=null
					 ,$id_accion=null
					 ,$descripcion_registro=null
					)
{
	$this->ID_REGISTROH = $id_registroh;
	$this->FECHA_REGISTRO = $fecha_registro;
	$this->ID_USUARIO = $id_usuario;
	$this->ID_ACCION = $id_accion;
	$this->DESCRIPCION_REGISTRO = $descripcion_registro;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_REGISTROH()
{
 return $this->ID_REGISTROH;
}

public function setID_REGISTROH($id_registroh)
{
 $this->ID_REGISTROH = $id_registroh;
}

public function getFECHA_REGISTRO()
{
 return $this->FECHA_REGISTRO;
}

public function setFECHA_REGISTRO($fecha_registro)
{
 $this->FECHA_REGISTRO = $fecha_registro;
}

public function getID_USUARIO()
{
 return $this->ID_USUARIO;
}

public function setID_USUARIO($id_usuario)
{
 $this->ID_USUARIO = $id_usuario;
}

public function getID_ACCION()
{
 return $this->ID_ACCION;
}

public function setID_ACCION($id_accion)
{
 $this->ID_ACCION = $id_accion;
}

public function getDESCRIPCION_REGISTRO()
{
 return $this->DESCRIPCION_REGISTRO;
}

public function setDESCRIPCION_REGISTRO($descripcion_registro)
{
 $this->DESCRIPCION_REGISTRO = $descripcion_registro;
}

}
?>