/* Script con carga de datos de prueba */

/* Borramos las asociaciones */
DELETE FROM `perfil_recurso`;
DELETE FROM `perfil_grupo_usuario`;
DELETE FROM `perfil`;
DELETE FROM `info_perfil`;
DELETE FROM `recurso`;
DELETE FROM `info_recurso`;
DELETE FROM `accion`;
DELETE FROM `info_accion`;
DELETE FROM `prioridad`;
DELETE FROM `cliente`;
DELETE FROM `usuario`;
DELETE FROM `info_usuario`;

/* Cargamos los usuarios */

INSERT INTO `info_usuario`(`ID_USUARIO`, `NOMBRE_USUARIO`, `DESCRIPCION_USUARIO`, `EMAIL`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`) 
VALUES ('UsuarioCliente1','UsuarioCliente1','Usuario cliente 1','Clie1@AGUW.cl',SYSDATE(),'1990/01/01');
INSERT INTO `info_usuario`(`ID_USUARIO`, `NOMBRE_USUARIO`, `DESCRIPCION_USUARIO`, `EMAIL`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`) 
VALUES ('UsuarioPrueba1','UsuarioPrueba1','Usuario de prueba 1','User1@AGUW.cl',SYSDATE(),'1990/01/01');
INSERT INTO `info_usuario`(`ID_USUARIO`, `NOMBRE_USUARIO`, `DESCRIPCION_USUARIO`, `EMAIL`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`) 
VALUES ('UsuarioPrueba2','UsuarioPrueba2','Usuario de prueba 2','User2@AGUW.cl',SYSDATE(),'1990/01/01');
INSERT INTO `info_usuario`(`ID_USUARIO`, `NOMBRE_USUARIO`, `DESCRIPCION_USUARIO`, `EMAIL`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`) 
VALUES ('UsuarioPrueba3','UsuarioPrueba3','Usuario de prueba 3','User3@AGUW.cl',SYSDATE(),'1990/01/01');

INSERT INTO `usuario`(`ID_USUARIO`, `PASSWORD`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES ('UsuarioCliente1','123456',SYSDATE(),null,1,1);
INSERT INTO `usuario`(`ID_USUARIO`, `PASSWORD`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES ('UsuarioPrueba1','123456',SYSDATE(),null,1,1);
INSERT INTO `usuario`(`ID_USUARIO`, `PASSWORD`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES ('UsuarioPrueba2','123456',SYSDATE(),null,1,1);
INSERT INTO `usuario`(`ID_USUARIO`, `PASSWORD`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES ('UsuarioPrueba3','123456',SYSDATE(),null,1,1);

/* Cargamos el cliente */

INSERT INTO `cliente`(`ID_CLIENTE`, `ID_USUARIO`, `LLAVE1`, `LLAVE2`) 
VALUES (1,'UsuarioCliente1','4cb811134b9d39fc3104bd06ce75abad41ab1b1d6bf108f388','3366297a637d4a3a358dfc6faad2fcf56f5e6653c2100f36ef');

/* Cargamos el perfil */

INSERT INTO `info_perfil`(`ID_PERFIL`, `NOMBRE_PERFIL`, `DESCRIPCION_PERFIL`, `FECHA_REGISTRO`) 
VALUES (1,'PerfilPrueba1','Perfil prueba 1',SYSDATE());

INSERT INTO `perfil`(`ID_PERFIL`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES (1,SYSDATE(),null,1,1);

INSERT INTO `info_perfil`(`ID_PERFIL`, `NOMBRE_PERFIL`, `DESCRIPCION_PERFIL`, `FECHA_REGISTRO`) 
VALUES (2,'PerfilPrueba2','Perfil prueba 2',SYSDATE());

INSERT INTO `perfil`(`ID_PERFIL`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES (2,SYSDATE(),null,1,1);

/* Cargamos el recurso */

INSERT INTO `info_recurso`(`ID_RECURSO`, `NOMBRE_RECURSO`, `DESCRIPCION_RECURSO`, `FECHA_REGISTRO`) 
VALUES (1,'RecursoPrueba1','Recurso prueba 1',SYSDATE());

INSERT INTO `recurso`(`ID_RECURSO`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES (1,SYSDATE(),null,1,1);

/* Cargamos la accion */

INSERT INTO `info_accion`(`ID_ACCION`, `NOMBRE_ACCION`, `DESCRIPCION_ACCION`, `FECHA_REGISTRO`) 
VALUES (1,'Leer','Lectura',SYSDATE());

INSERT INTO `accion`(`ID_ACCION`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES (1,SYSDATE(),null,1,1);

INSERT INTO `info_accion`(`ID_ACCION`, `NOMBRE_ACCION`, `DESCRIPCION_ACCION`, `FECHA_REGISTRO`) 
VALUES (2,'Borrar','Borrar',SYSDATE());

INSERT INTO `accion`(`ID_ACCION`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES (2,SYSDATE(),null,1,1);

INSERT INTO `info_accion`(`ID_ACCION`, `NOMBRE_ACCION`, `DESCRIPCION_ACCION`, `FECHA_REGISTRO`) 
VALUES (3,'Modificar','Modificar',SYSDATE());

INSERT INTO `accion`(`ID_ACCION`, `FECHA_ALTA`, `FECHA_BAJA`, `FLAG_ACTIVO`, `ID_CLIENTE`) 
VALUES (3,SYSDATE(),null,1,1);

/* Cargamos la prioridad */

INSERT INTO `prioridad`(`ID_PRIORIDAD`, `NOMBRE_PRIORIDAD`, `ID_CLIENTE`) 
VALUES (1,'Prioridad 1',1);

/* Asociamos la accion al perfil y su permiso */

INSERT INTO `perfil_recurso`(`ID_PERFIL`, `ID_RECURSO`, `ID_ACCION`, `ID_PRIORIDAD`, `PERMISO`) 
VALUES (1,1,1,1,1);

INSERT INTO `perfil_recurso`(`ID_PERFIL`, `ID_RECURSO`, `ID_ACCION`, `ID_PRIORIDAD`, `PERMISO`) 
VALUES (1,1,2,1,0);

INSERT INTO `perfil_recurso`(`ID_PERFIL`, `ID_RECURSO`, `ID_ACCION`, `ID_PRIORIDAD`, `PERMISO`) 
VALUES (1,1,3,1,0);

INSERT INTO `perfil_recurso`(`ID_PERFIL`, `ID_RECURSO`, `ID_ACCION`, `ID_PRIORIDAD`, `PERMISO`) 
VALUES (2,1,3,1,1);

/* Asociamos el perfil al usuario */

INSERT INTO `perfil_grupo_usuario`(`ID_REGISTROPGU`, `ID_USUARIO`, `ID_GRUPO`, `ID_PERFIL`) 
VALUES (1,'UsuarioPrueba1',null,1);

INSERT INTO `perfil_grupo_usuario`(`ID_REGISTROPGU`, `ID_USUARIO`, `ID_GRUPO`, `ID_PERFIL`) 
VALUES (2,'UsuarioPrueba1',null,2);


COMMIT;




