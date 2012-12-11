<?php

/********************************************************  
* Clase Prioridad Autor: Luxo Lizama 
********************************************************/  

class Prioridad{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_PRIORIDAD; // INT NOT NULL AUTO_INCREMENT
private $NOMBRE_PRIORIDAD; // VARCHAR(50) NOT NULL
private $ID_CLIENTE; // INT NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_prioridad=null
					 ,$nombre_prioridad=null
					 ,$id_cliente=null
					)
{
	$this->ID_PRIORIDAD = $id_prioridad;
	$this->NOMBRE_PRIORIDAD = $nombre_prioridad;
	$this->ID_CLIENTE = $id_cliente;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_PRIORIDAD()
{
 return $this->ID_PRIORIDAD;
}

public function setID_PRIORIDAD($id_prioridad)
{
 $this->ID_PRIORIDAD = $id_prioridad;
}

public function getNOMBRE_PRIORIDAD()
{
 return $this->NOMBRE_PRIORIDAD;
}

public function setNOMBRE_PRIORIDAD($nombre_prioridad)
{
 $this->NOMBRE_PRIORIDAD = $nombre_prioridad;
}

public function getID_CLIENTE()
{
 return $this->ID_CLIENTE;
}

public function setID_CLIENTE($id_cliente)
{
 $this->ID_CLIENTE = $id_cliente;
}

}
?>