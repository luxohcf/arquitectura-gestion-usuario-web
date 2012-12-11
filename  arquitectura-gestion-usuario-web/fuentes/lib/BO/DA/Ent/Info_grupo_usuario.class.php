<?php

/********************************************************  
* Clase Info_grupo_usuario Autor: Luxo Lizama 
********************************************************/  

class Info_grupo_usuario{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_GRUPO; // INT NOT NULL
private $NOMBRE_GRUPO; // VARCHAR(50) NOT NULL
private $DESCRIPCION_GRUPO; // VARCHAR(2000)
private $FECHA_REGISTRO; // DATETIME NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_grupo=null
					 ,$nombre_grupo=null
					 ,$descripcion_grupo=null
					 ,$fecha_registro=null
					)
{
	$this->ID_GRUPO = $id_grupo;
	$this->NOMBRE_GRUPO = $nombre_grupo;
	$this->DESCRIPCION_GRUPO = $descripcion_grupo;
	$this->FECHA_REGISTRO = $fecha_registro;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_GRUPO()
{
 return $this->ID_GRUPO;
}

public function setID_GRUPO($id_grupo)
{
 $this->ID_GRUPO = $id_grupo;
}

public function getNOMBRE_GRUPO()
{
 return $this->NOMBRE_GRUPO;
}

public function setNOMBRE_GRUPO($nombre_grupo)
{
 $this->NOMBRE_GRUPO = $nombre_grupo;
}

public function getDESCRIPCION_GRUPO()
{
 return $this->DESCRIPCION_GRUPO;
}

public function setDESCRIPCION_GRUPO($descripcion_grupo)
{
 $this->DESCRIPCION_GRUPO = $descripcion_grupo;
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