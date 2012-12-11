<?php

/********************************************************  
* Clase Info_accion Autor: Luxo Lizama 
********************************************************/  

class Info_accion{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_ACCION; // INT NOT NULL
private $NOMBRE_ACCION; // VARCHAR(50) NOT NULL
private $DESCRIPCION_ACCION; // VARCHAR(2000)
private $FECHA_REGISTRO; // DATETIME NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_accion=null
					 ,$nombre_accion=null
					 ,$descripcion_accion=null
					 ,$fecha_registro=null
					)
{
	$this->ID_ACCION = $id_accion;
	$this->NOMBRE_ACCION = $nombre_accion;
	$this->DESCRIPCION_ACCION = $descripcion_accion;
	$this->FECHA_REGISTRO = $fecha_registro;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_ACCION()
{
 return $this->ID_ACCION;
}

public function setID_ACCION($id_accion)
{
 $this->ID_ACCION = $id_accion;
}

public function getNOMBRE_ACCION()
{
 return $this->NOMBRE_ACCION;
}

public function setNOMBRE_ACCION($nombre_accion)
{
 $this->NOMBRE_ACCION = $nombre_accion;
}

public function getDESCRIPCION_ACCION()
{
 return $this->DESCRIPCION_ACCION;
}

public function setDESCRIPCION_ACCION($descripcion_accion)
{
 $this->DESCRIPCION_ACCION = $descripcion_accion;
}

public function getFECHA_REGISTRO()
{
 return $this->FECHA_REGISTRO;
}

public function setFECHA_REGISTRO($fecha_registro)
{
 $this->FECHA_REGISTRO = $fecha_registro;
}

}
?>