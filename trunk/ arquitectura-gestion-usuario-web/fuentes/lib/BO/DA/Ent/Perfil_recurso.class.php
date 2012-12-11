<?php

/********************************************************  
* Clase Perfil_recurso Autor: Luxo Lizama 
********************************************************/  

class Perfil_recurso{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_PERFIL; // INT NOT NULL
private $ID_RECURSO; // INT NOT NULL
private $ID_ACCION; // INT NOT NULL
private $ID_PRIORIDAD; // INT NOT NULL
private $PERMISO; // BOOL NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_perfil=null
					 ,$id_recurso=null
					 ,$id_accion=null
					 ,$id_prioridad=null
					 ,$permiso=null
					)
{
	$this->ID_PERFIL = $id_perfil;
	$this->ID_RECURSO = $id_recurso;
	$this->ID_ACCION = $id_accion;
	$this->ID_PRIORIDAD = $id_prioridad;
	$this->PERMISO = $permiso;
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

public function getID_RECURSO()
{
 return $this->ID_RECURSO;
}

public function setID_RECURSO($id_recurso)
{
 $this->ID_RECURSO = $id_recurso;
}

public function getID_ACCION()
{
 return $this->ID_ACCION;
}

public function setID_ACCION($id_accion)
{
 $this->ID_ACCION = $id_accion;
}

public function getID_PRIORIDAD()
{
 return $this->ID_PRIORIDAD;
}

public function setID_PRIORIDAD($id_prioridad)
{
 $this->ID_PRIORIDAD = $id_prioridad;
}

public function getPERMISO()
{
 return $this->PERMISO;
}

public function setPERMISO($permiso)
{
 $this->PERMISO = $permiso;
}

}
?>