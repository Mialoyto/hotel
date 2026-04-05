-- Active: 1772242849386@@127.0.0.1@3306@db_hotel
DROP DATABASE IF EXISTS `db_hotel`;
CREATE DATABASE `db_hotel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_hotel`;

/* TABLA PERSONAS */
DROP TABLE IF EXISTS personas;
CREATE TABLE personas ( 
    id_persona              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres                 VARCHAR(255) NOT NULL,
    apellido_paterno        VARCHAR(255) NOT NULL,
    apellido_materno        VARCHAR(255) NOT NULL,
    dni                     CHAR(8) NOT NULL,
    telefono                VARCHAR(20) DEFAULT NULL,
    email                   VARCHAR(255) DEFAULT NULL,

    created_at              TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at              TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    estado                  TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT uk_dni UNIQUE(dni)
)ENGINE = INNODB;

/* TABLA DE TIPO DE PLAN */
DROP TABLE IF EXISTS planes;
CREATE TABLE planes (
    id_plan             INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_plan         VARCHAR(255) NOT NULL,
    descripcion_plan    TEXT NOT NULL,

    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    estado              TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT uk_nombre_plan UNIQUE(nombre_plan) 

)ENGINE = INNODB;

/* TABLA HOTELES */
DROP TABLE IF EXISTS hoteles;
CREATE TABLE hoteles (
    id_hotel            INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_plan             INT NOT NULL DEFAULT 1,
    nombre_comercial    VARCHAR(255) NOT NULL,
    razon_social        VARCHAR(255) NOT NULL,
    ruc                 CHAR(11) NOT NULL,
    direccion           VARCHAR(255) NOT NULL,
    telefono            VARCHAR(20) NOT NULL,
    email               VARCHAR(255) NOT NULL,

    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    estado              TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT fk_id_plan FOREIGN KEY (id_plan) REFERENCES planes(id_plan) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT uk_ruc UNIQUE(ruc),
    CONSTRAINT uk_email UNIQUE(email)

)ENGINE = INNODB;

/* TABLA ROLES */
DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
    id_rol             INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_hotel            INT NOT NULL,
    nombre_rol          VARCHAR(255) NOT NULL,
    descripcion_rol     TEXT NOT NULL,

    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    estado              TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT fk_id_hotel_rol FOREIGN KEY (id_hotel) REFERENCES hoteles(id_hotel) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT uk_hotel_nombre_rol UNIQUE(id_hotel, nombre_rol)

)ENGINE = INNODB;

/* TABLA USUARIOS */
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id_usuario              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_persona              INT NOT NULL,
    id_hotel                INT NOT NULL,
    nombre_usuario          VARCHAR(255) NOT NULL,
    contrasenia              VARCHAR(255) NOT NULL,

    created_at              TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at              TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    estado                  TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT fk_id_persona FOREIGN KEY (id_persona) REFERENCES personas(id_persona) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_id_hotel FOREIGN KEY (id_hotel) REFERENCES hoteles(id_hotel) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT uk_nombre_usuario UNIQUE(nombre_usuario)

)ENGINE = INNODB;


/* TABLA USUARIOS-ROLES */
DROP TABLE IF EXISTS usuarios_roles;
CREATE TABLE usuarios_roles (
    id_usuario_rol      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario          INT NOT NULL,
    id_rol              INT NOT NULL,

    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    estado              TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_id_rol FOREIGN KEY (id_rol) REFERENCES roles(id_rol) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT uk_usuario_rol UNIQUE(id_usuario, id_rol)

)ENGINE = INNODB;








