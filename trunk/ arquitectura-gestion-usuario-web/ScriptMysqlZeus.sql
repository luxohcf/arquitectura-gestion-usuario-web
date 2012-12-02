/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30-09-2012 16:45:13                          */
/*==============================================================*/


DROP TABLE IF EXISTS ACCION;

DROP TABLE IF EXISTS CLIENTE;

DROP TABLE IF EXISTS GRUPO_USUARIO;

DROP TABLE IF EXISTS HISTORICO;

DROP TABLE IF EXISTS INFO_ACCION;

DROP TABLE IF EXISTS INFO_GRUPO_USUARIO;

DROP TABLE IF EXISTS INFO_PERFIL;

DROP TABLE IF EXISTS INFO_RECURSO;

DROP TABLE IF EXISTS INFO_USUARIO;

DROP TABLE IF EXISTS PERFIL;

DROP TABLE IF EXISTS PERFIL_GRUPO_USUARIO;

DROP TABLE IF EXISTS PERFIL_RECURSO;

DROP TABLE IF EXISTS PRIORIDAD;

DROP TABLE IF EXISTS RECURSO;

DROP TABLE IF EXISTS USUARIO;

DROP TABLE IF EXISTS USUARIOS_GRUPOUSUARIO;

/*==============================================================*/
/* Table: ACCION                                                */
/*==============================================================*/
CREATE TABLE ACCION
(
   ID_ACCION            INT NOT NULL,
   FECHA_ALTA           DATETIME NOT NULL,
   FECHA_BAJA           DATETIME,
   FLAG_ACTIVO          BOOL NOT NULL,
   ID_CLIENTE           INT NOT NULL,
   PRIMARY KEY (ID_ACCION, FECHA_ALTA)
);

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
CREATE TABLE CLIENTE
(
   ID_CLIENTE           INT NOT NULL AUTO_INCREMENT,
   ID_USUARIO           VARCHAR(20) NOT NULL,
   LLAVE1               VARCHAR(100) NOT NULL,
   LLAVE2               VARCHAR(100),
   PRIMARY KEY (ID_CLIENTE, ID_USUARIO)
);

/*==============================================================*/
/* Table: GRUPO_USUARIO                                         */
/*==============================================================*/
CREATE TABLE GRUPO_USUARIO
(
   ID_GRUPO             INT NOT NULL,
   FECHA_ALTA           DATETIME NOT NULL,
   FECHA_BAJA           DATETIME,
   FLAG_ACTIVO          BOOL NOT NULL,
   ID_CLIENTE           INT NOT NULL,
   PRIMARY KEY (ID_GRUPO, FECHA_ALTA)
);

/*==============================================================*/
/* Table: HISTORICO                                             */
/*==============================================================*/
CREATE TABLE HISTORICO
(
   ID_REGISTROH         INT NOT NULL AUTO_INCREMENT,
   FECHA_REGISTRO       DATETIME NOT NULL,
   ID_USUARIO           VARCHAR(20),
   ID_ACCION            INT,
   DESCRIPCION_REGISTRO VARCHAR(2000),
   PRIMARY KEY (ID_REGISTROH, FECHA_REGISTRO)
);

/*==============================================================*/
/* Table: INFO_ACCION                                           */
/*==============================================================*/
CREATE TABLE INFO_ACCION
(
   ID_ACCION            INT NOT NULL,
   NOMBRE_ACCION        VARCHAR(50) NOT NULL,
   DESCRIPCION_ACCION   VARCHAR(2000),
   FECHA_REGISTRO       DATETIME NOT NULL,
   PRIMARY KEY (ID_ACCION)
);

/*==============================================================*/
/* Table: INFO_GRUPO_USUARIO                                    */
/*==============================================================*/
CREATE TABLE INFO_GRUPO_USUARIO
(
   ID_GRUPO             INT NOT NULL,
   NOMBRE_GRUPO         VARCHAR(50) NOT NULL,
   DESCRIPCION_GRUPO    VARCHAR(2000),
   FECHA_REGISTRO       DATETIME NOT NULL,
   PRIMARY KEY (ID_GRUPO)
);

/*==============================================================*/
/* Table: INFO_PERFIL                                           */
/*==============================================================*/
CREATE TABLE INFO_PERFIL
(
   ID_PERFIL            INT NOT NULL,
   NOMBRE_PERFIL        VARCHAR(50),
   DESCRIPCION_PERFIL   VARCHAR(2000),
   FECHA_REGISTRO       DATETIME,
   PRIMARY KEY (ID_PERFIL)
);

/*==============================================================*/
/* Table: INFO_RECURSO                                          */
/*==============================================================*/
CREATE TABLE INFO_RECURSO
(
   ID_RECURSO           INT NOT NULL,
   NOMBRE_RECURSO       VARCHAR(50) NOT NULL,
   DESCRIPCION_RECURSO  VARCHAR(2000),
   FECHA_REGISTRO       DATETIME NOT NULL,
   PRIMARY KEY (ID_RECURSO)
);

/*==============================================================*/
/* Table: INFO_USUARIO                                          */
/*==============================================================*/
CREATE TABLE INFO_USUARIO
(
   ID_USUARIO           VARCHAR(20) NOT NULL,
   NOMBRE_USUARIO       VARCHAR(150) NOT NULL,
   DESCRIPCION_USUARIO  VARCHAR(2000),
   EMAIL                VARCHAR(100) NOT NULL,
   FECHA_REGISTRO       DATETIME NOT NULL,
   FECHA_NACIMIENTO     DATE NOT NULL,
   PRIMARY KEY (ID_USUARIO)
);

/*==============================================================*/
/* Table: PERFIL                                                */
/*==============================================================*/
CREATE TABLE PERFIL
(
   ID_PERFIL            INT NOT NULL,
   FECHA_ALTA           DATETIME NOT NULL,
   FECHA_BAJA           DATETIME,
   FLAG_ACTIVO          BOOL NOT NULL,
   ID_CLIENTE           INT NOT NULL,
   PRIMARY KEY (ID_PERFIL, FECHA_ALTA)
);

/*==============================================================*/
/* Table: PERFIL_GRUPO_USUARIO                                  */
/*==============================================================*/
CREATE TABLE PERFIL_GRUPO_USUARIO
(
   ID_REGISTROPGU       INT NOT NULL AUTO_INCREMENT,
   ID_USUARIO           VARCHAR(20),
   ID_GRUPO             INT,
   ID_PERFIL            INT,
   PRIMARY KEY (ID_REGISTROPGU)
);

/*==============================================================*/
/* Table: PERFIL_RECURSO                                        */
/*==============================================================*/
CREATE TABLE PERFIL_RECURSO
(
   ID_PERFIL            INT NOT NULL,
   ID_RECURSO           INT NOT NULL,
   ID_ACCION            INT NOT NULL,
   ID_PRIORIDAD         INT NOT NULL,
   PERMISO              BOOL NOT NULL,
   PRIMARY KEY (ID_PERFIL, ID_RECURSO, ID_ACCION, ID_PRIORIDAD)
);

/*==============================================================*/
/* Table: PRIORIDAD                                             */
/*==============================================================*/
CREATE TABLE PRIORIDAD
(
   ID_PRIORIDAD         INT NOT NULL AUTO_INCREMENT,
   NOMBRE_PRIORIDAD     VARCHAR(50) NOT NULL,
   ID_CLIENTE           INT NOT NULL,
   PRIMARY KEY (ID_PRIORIDAD)
);

/*==============================================================*/
/* Table: RECURSO                                               */
/*==============================================================*/
CREATE TABLE RECURSO
(
   ID_RECURSO           INT NOT NULL,
   FECHA_ALTA           DATETIME NOT NULL,
   FECHA_BAJA           DATETIME,
   FLAG_ACTIVO          BOOL NOT NULL,
   ID_CLIENTE           INT NOT NULL,
   PRIMARY KEY (ID_RECURSO, FECHA_ALTA)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
CREATE TABLE USUARIO
(
   ID_USUARIO           VARCHAR(20) NOT NULL,
   PASSWORD             VARCHAR(20) NOT NULL,
   FECHA_ALTA           DATETIME NOT NULL,
   FECHA_BAJA           DATETIME,
   FLAG_ACTIVO          BOOL NOT NULL,
   ID_CLIENTE           INT NOT NULL,
   PRIMARY KEY (ID_USUARIO, FECHA_ALTA)
);

/*==============================================================*/
/* Table: USUARIOS_GRUPOUSUARIO                                 */
/*==============================================================*/
CREATE TABLE USUARIOS_GRUPOUSUARIO
(
   ID_USUARIO           VARCHAR(20) NOT NULL,
   ID_GRUPO             INT NOT NULL,
   PRIMARY KEY (ID_USUARIO, ID_GRUPO)
);

ALTER TABLE ACCION ADD CONSTRAINT FK_INFOACCIONACCION FOREIGN KEY (ID_ACCION)
      REFERENCES INFO_ACCION (ID_ACCION) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE CLIENTE ADD CONSTRAINT FK_USUARIO_CLIENTE FOREIGN KEY (ID_USUARIO)
      REFERENCES INFO_USUARIO (ID_USUARIO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE GRUPO_USUARIO ADD CONSTRAINT FK_INFOGRUPOUSUARIO_GRUPOUSUARIO FOREIGN KEY (ID_GRUPO)
      REFERENCES INFO_GRUPO_USUARIO (ID_GRUPO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE HISTORICO ADD CONSTRAINT FK_ACCION_HISTORICO FOREIGN KEY (ID_ACCION)
      REFERENCES INFO_ACCION (ID_ACCION) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE HISTORICO ADD CONSTRAINT FK_USUARIO_HISTORICO FOREIGN KEY (ID_USUARIO)
      REFERENCES INFO_USUARIO (ID_USUARIO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL ADD CONSTRAINT FK_INFORPERFIL_PERFIL FOREIGN KEY (ID_PERFIL)
      REFERENCES INFO_PERFIL (ID_PERFIL) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_GRUPO_USUARIO ADD CONSTRAINT FK_GRUPOUSUARIO_PERFILGRUPOUSUARIO FOREIGN KEY (ID_GRUPO)
      REFERENCES INFO_GRUPO_USUARIO (ID_GRUPO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_GRUPO_USUARIO ADD CONSTRAINT FK_PERFIL_PERFILGRUPOUSUARIO FOREIGN KEY (ID_PERFIL)
      REFERENCES INFO_PERFIL (ID_PERFIL) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_GRUPO_USUARIO ADD CONSTRAINT FK_USUARIO_PERFILGRUPOUSUARIO FOREIGN KEY (ID_USUARIO)
      REFERENCES INFO_USUARIO (ID_USUARIO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_RECURSO ADD CONSTRAINT FK_ACCION_RECURSO FOREIGN KEY (ID_ACCION)
      REFERENCES INFO_ACCION (ID_ACCION) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_RECURSO ADD CONSTRAINT FK_PERFIL_PERFILRECURSO FOREIGN KEY (ID_PERFIL)
      REFERENCES INFO_PERFIL (ID_PERFIL) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_RECURSO ADD CONSTRAINT FK_PRIORIDAD_PERFILRECURSO FOREIGN KEY (ID_PRIORIDAD)
      REFERENCES PRIORIDAD (ID_PRIORIDAD) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERFIL_RECURSO ADD CONSTRAINT FK_RECURSO_PERFILRECURSO FOREIGN KEY (ID_RECURSO)
      REFERENCES INFO_RECURSO (ID_RECURSO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE RECURSO ADD CONSTRAINT FK_INFORECURSO_RECURSO FOREIGN KEY (ID_RECURSO)
      REFERENCES INFO_RECURSO (ID_RECURSO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE USUARIO ADD CONSTRAINT FK_INFOUSUARIO_USUARIO FOREIGN KEY (ID_USUARIO)
      REFERENCES INFO_USUARIO (ID_USUARIO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE USUARIOS_GRUPOUSUARIO ADD CONSTRAINT FK_GRUPOUSUARIO_USUARIOSGRUPOUSUARIO FOREIGN KEY (ID_GRUPO)
      REFERENCES INFO_GRUPO_USUARIO (ID_GRUPO) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE USUARIOS_GRUPOUSUARIO ADD CONSTRAINT FK_USUARIO_GRUPOUSUARIO FOREIGN KEY (ID_USUARIO)
      REFERENCES INFO_USUARIO (ID_USUARIO) ON DELETE RESTRICT ON UPDATE RESTRICT;

