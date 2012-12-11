<?php

/********************************************************  
* Clase Info_perfil Autor: Luxo Lizama 
********************************************************/  

class Info_perfil{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_PERFIL; // INT NOT NULL
private $NOMBRE_PERFIL; // VARCHAR(50)
private $DESCRIPCION_PERFIL; // VARCHAR(2000)
private $FECHA_REGISTRO; // DATETIME

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_perfil=null
					 ,$nombre_perfil=null
					 ,$descripcion_perfil=null
					 ,$fecha_registro=null
					)
{
	$this->ID_PERFIL = $id_perfil;
	$this->NOMBRE_PERFIL = $nombre_perfil;
	$this->DESCRIPCION_PERFIL = $descripcion_perfil;
	$this->FECHA_REGISTRO = $fecha_registro;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_PERFIL()
{
 return $this->ID_PERFIL;
}

public function setID_PERFIL($id_perfil)
{
 $this->ID_PERFIL = $id_perfil;
}

public function getNOMBRE_PERFIL()
{
 return $this->NOMBRE_PERFIL;
}

public function setNOMBRE_PERFIL($nombre_perfil)
{
 $this->NOMBRE_PERFIL = $nombre_perfil;
}

public function getDESCRIPCION_PERFIL()
{
 return $this->DESCRIPCION_PERFIL;
}

public function setDESCRIPCION_PERFIL($descripcion_perfil)
{
 $this->DESCRIPCION_PERFIL = $descripcion_perfil;
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