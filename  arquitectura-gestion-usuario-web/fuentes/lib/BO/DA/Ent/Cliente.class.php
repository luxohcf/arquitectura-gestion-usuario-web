<?php

/********************************************************  
* Clase Cliente Autor: Luxo Lizama 
********************************************************/  

class Cliente{

/***********************************************  
* Atributos                                    *  
***********************************************/  

private $ID_CLIENTE; // INT NOT NULL AUTO_INCREMENT
private $ID_USUARIO; // VARCHAR(20) NOT NULL
private $LLAVE1; // VARCHAR(100) NOT NULL
private $LLAVE2; // VARCHAR(100)

/***********************************************  
* Constructores                                *  
***********************************************/  

function __construct($id_cliente=null
					 ,$id_usuario=null
					 ,$llave1=null
					 ,$llave2=null
					)
{
	$this->ID_CLIENTE = $id_cliente;
	$this->ID_USUARIO = $id_usuario;
	$this->LLAVE1 = $llave1;
	$this->LLAVE2 = $llave2;
}

/***********************************************  
* Getter y Setters                             *  
***********************************************/  

public function getID_CLIENTE()
{
 return $this->ID_CLIENTE;
}

public function setID_CLIENTE($id_cliente)
{
 $this->ID_CLIENTE = $id_cliente;
}

public function getID_USUARIO()
{
 return $this->ID_USUARIO;
}

public function setID_USUARIO($id_usuario)
{
 $this->ID_USUARIO = $id_usuario;
}

public function getLLAVE1()
{
 return $this->LLAVE1;
}

public function setLLAVE1($llave1)
{
 $this->LLAVE1 = $llave1;
}

public function getLLAVE2()
{
 return $this->LLAVE2;
}

public function setLLAVE2($llave2)
{
 $this->LLAVE2 = $llave2;
}

}
?>