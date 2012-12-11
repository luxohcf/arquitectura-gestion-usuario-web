<?php

/********************************************************  
* Clase Info_recurso Autor: Luxo Lizama 
********************************************************/  

class Info_recurso{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_RECURSO; // INT NOT NULL
private $NOMBRE_RECURSO; // VARCHAR(50) NOT NULL
private $DESCRIPCION_RECURSO; // VARCHAR(2000)
private $FECHA_REGISTRO; // DATETIME NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_recurso=null
					 ,$nombre_recurso=null
					 ,$descripcion_recurso=null
					 ,$fecha_registro=null
					)
{
	$this->ID_RECURSO = $id_recurso;
	$this->NOMBRE_RECURSO = $nombre_recurso;
	$this->DESCRIPCION_RECURSO = $descripcion_recurso;
	$this->FECHA_REGISTRO = $fecha_registro;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_RECURSO()
{
 return $this->ID_RECURSO;
}

public function setID_RECURSO($id_recurso)
{
 $this->ID_RECURSO = $id_recurso;
}

public function getNOMBRE_RECURSO()
{
 return $this->NOMBRE_RECURSO;
}

public function setNOMBRE_RECURSO($nombre_recurso)
{
 $this->NOMBRE_RECURSO = $nombre_recurso;
}

public function getDESCRIPCION_RECURSO()
{
 return $this->DESCRIPCION_RECURSO;
}

public function setDESCRIPCION_RECURSO($descripcion_recurso)
{
 $this->DESCRIPCION_RECURSO = $descripcion_recurso;
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