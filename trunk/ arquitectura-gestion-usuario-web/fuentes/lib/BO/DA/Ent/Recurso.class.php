<?php

/********************************************************  
* Clase Recurso Autor: Luxo Lizama 
********************************************************/  

class Recurso{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_RECURSO; // INT NOT NULL
private $FECHA_ALTA; // DATETIME NOT NULL
private $FECHA_BAJA; // DATETIME
private $FLAG_ACTIVO; // BOOL NOT NULL
private $ID_CLIENTE; // INT NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_recurso=null
					 ,$fecha_alta=null
					 ,$fecha_baja=null
					 ,$flag_activo=null
					 ,$id_cliente=null
					)
{
	$this->ID_RECURSO = $id_recurso;
	$this->FECHA_ALTA = $fecha_alta;
	$this->FECHA_BAJA = $fecha_baja;
	$this->FLAG_ACTIVO = $flag_activo;
	$this->ID_CLIENTE = $id_cliente;
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

public function getFECHA_ALTA()
{
 return $this->FECHA_ALTA;
}

public function setFECHA_ALTA($fecha_alta)
{
 $this->FECHA_ALTA = $fecha_alta;
}

public function getFECHA_BAJA()
{
 return $this->FECHA_BAJA;
}

public function setFECHA_BAJA($fecha_baja)
{
 $this->FECHA_BAJA = $fecha_baja;
}

public function getFLAG_ACTIVO()
{
 return $this->FLAG_ACTIVO;
}

public function setFLAG_ACTIVO($flag_activo)
{
 $this->FLAG_ACTIVO = $flag_activo;
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