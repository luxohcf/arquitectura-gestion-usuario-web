<?php

/* Crear las clases de validación */

class Validador
{
    private $host;
    private $user;
    private $pass;
    private $bbdd;

    function __construct()
    {
        require("/../../config/parametros.php");
        $this->host = $V_HOST;
        $this->user = $V_USER;
        $this->pass = $V_PASS;
        $this->bbdd = $V_BBDD;
    }
    
    public function obtenerPermiso($idUsuario, $idCliente, $llave1, $llave2, $recurso, $accion)
    {
        
        $mySqli = new mysqli($this->host, $this->user, $this->pass, $this->bbdd);
        
        if($mySqli->connect_errno)
        {
            return FALSE;
        }
        /* Si no existe el cliente retornamos false */
        $query = "SELECT 1 FROM cliente WHERE ID_CLIENTE = $idCliente";
        $res = $mySqli->query($query);
    
        if($mySqli->affected_rows == 0)
        {
            return FALSE;
        }
        
        /* Si no coinciden las llave del cliente retornamos false */
        
        $query = "SELECT 1 FROM cliente WHERE 
                  ID_CLIENTE = $idCliente AND
                  LLAVE1 = '$llave1' AND
                  LLAVE2 = '$llave2'";
        $res = $mySqli->query($query);
    
        if($mySqli->affected_rows == 0)
        {
            return FALSE;
        }
    
        /* Ejecutamos la query que retorna el permiso */
        
        $query = "SELECT MAX(PerRec.PERMISO) AS PERMISO
                    FROM 
                         USUARIO Usu INNER JOIN
                         PERFIL_GRUPO_USUARIO PerfGruUsu ON Usu.ID_USUARIO = PerfGruUsu.ID_USUARIO INNER JOIN
                         PERFIL Perf ON PerfGruUsu.ID_PERFIL = Perf.ID_PERFIL INNER JOIN
                         PERFIL_RECURSO PerRec ON Perf.ID_PERFIL = PerRec.ID_PERFIL INNER JOIN
                         RECURSO Rec ON PerRec.ID_RECURSO = Rec.ID_RECURSO INNER JOIN
                         ACCION Acc ON PerRec.ID_ACCION = Acc.ID_ACCION
                    WHERE Usu.ID_CLIENTE = $idCliente AND
                          Usu.ID_USUARIO = '$idUsuario' AND
                          Rec.ID_RECURSO = $recurso AND
                          Acc.ID_ACCION = $accion AND
                          Usu.FLAG_ACTIVO = 1 AND
                          Perf.FLAG_ACTIVO = 1 AND
                          Rec.FLAG_ACTIVO = 1 AND
                          Acc.FLAG_ACTIVO = 1";

        $res = $mySqli->query($query);
    
        if($mySqli->affected_rows == 0)
        {
            return FALSE;
        }
        else 
        {
            while($row = $res->fetch_assoc())
            {
                $permiso = $row['PERMISO'];
            }
            
            return $permiso;
        }
        return TRUE;
    }
}
