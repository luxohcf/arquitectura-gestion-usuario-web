<?php

/********************************************************  
* Clase Usuarios_grupousuario Autor: Luxo Lizama 
********************************************************/  

class Usuarios_grupousuario{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_USUARIO; // VARCHAR(20) NOT NULL
private $ID_GRUPO; // INT NOT NULL

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_usuario=null
					 ,$id_grupo=null
					)
{
	$this->ID_USUARIO = $id_usuario;
	$this->ID_GRUPO = $id_grupo;
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

public function getID_GRUPO()
{
 return $this->ID_GRUPO;
}

public function setID_GRUPO($id_grupo)
{
 $this->ID_GRUPO = $id_grupo;
}

}
?>