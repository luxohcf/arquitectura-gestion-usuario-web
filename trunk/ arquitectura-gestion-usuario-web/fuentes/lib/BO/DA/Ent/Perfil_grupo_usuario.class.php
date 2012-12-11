<?php

/********************************************************  
* Clase Perfil_grupo_usuario Autor: Luxo Lizama 
********************************************************/  

class Perfil_grupo_usuario{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_REGISTROPGU; // INT NOT NULL AUTO_INCREMENT
private $ID_USUARIO; // VARCHAR(20)
private $ID_GRUPO; // INT
private $ID_PERFIL; // INT

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_registropgu=null
					 ,$id_usuario=null
					 ,$id_grupo=null
					 ,$id_perfil=null
					)
{
	$this->ID_REGISTROPGU = $id_registropgu;
	$this->ID_USUARIO = $id_usuario;
	$this->ID_GRUPO = $id_grupo;
	$this->ID_PERFIL = $id_perfil;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_REGISTROPGU()
{
 return $this->ID_REGISTROPGU;
}

public function setID_REGISTROPGU($id_registropgu)
{
 $this->ID_REGISTROPGU = $id_registropgu;
}

public function getID_USUARIO()
{
 return $this->ID_USUARIO;
}

public function setID_USUARIO($id_usuario)
{
 $this->ID_USUARIO = $id_usuario;
}

public function getID_GRUPO()
{
 return $this->ID_GRUPO;
}

public function setID_GRUPO($id_grupo)
{
 $this->ID_GRUPO = $id_grupo;
}

public function getID_PERFIL()
{
 return $this->ID_PERFIL;
}

public function setID_PERFIL($id_perfil)
{
 $this->ID_PERFIL = $id_perfil;
}

}
?>