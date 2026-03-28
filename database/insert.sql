-- Active: 1772242849386@@127.0.0.1@3306@db_hotel
USE db_hotel;

/* DATOS DE LA TABLA PERSONAS */
INSERT INTO personas (nombres, apellido_paterno, apellido_materno, dni, telefono, email) VALUES
('Juan', 'Pérez', 'Gómez', '12345678', '987654321', 'juan.perez@gmail.com'),
('María', 'López', 'Rodríguez', '87654321', '987654322', 'maria.lopez@gmail.com'),
('Carlos', 'González', 'Martínez', '11223344', '987654323', 'carlos.gonzalez@gmail.com');

/* DATOS DE LA TABLA PLANES */
INSERT INTO planes (nombre_plan, descripcion_plan) VALUES
('Free', 'Plan gratuito con características limitadas.'),
('Basic', 'Plan básico con características esenciales.'),
('Premium', 'Plan premium con todas las características y beneficios.');

/* DATOS DE LA TABLA HOTELES */
INSERT INTO hoteles (id_plan, nombre_comercial, razon_social, ruc, direccion, telefono, email) VALUES
(1, 'Hotel Sol', 'Hotel Sol S.A.', '12345678901', 'Av. Principal 123', '987654321', 'hotel@gmail.com'),
(2, 'Hotel Luna', 'Hotel Luna S.A.', '12345678902', 'Av. Secundaria 456', '987654322', 'hotel.luna@gmail.com'),
(3, 'Hotel Estrella', 'Hotel Estrella S.A.', '12345678903', 'Av. Tercera 789', '987654323', 'hotel.estrella@gmail.com');

/* DATOS DE LA TABLA ROLES */
INSERT INTO roles (id_hotel, nombre_rol, descripcion_rol) VALUES
(1, 'Administrador', 'Rol de administrador del hotel.'),
(2, 'Recepcionista', 'Rol de recepcionista del hotel.'),
(3, 'Gerente', 'Rol de gerente del hotel.');

/* DATOS DE LA TABLA USUARIOS */
INSERT INTO usuarios (id_persona, id_hotel, nombre_usuario, contrasenia) VALUES
(1, 1, 'juan_admin', '12345678'),
(2, 2, 'maria_recepcionista', '12345678'),
(3, 3, 'carlos_gerente', '12345678');

INSERT INTO usuarios (id_persona, id_hotel, nombre_usuario, contrasenia) VALUES
(1, 1, 'juan_recepcionista', '12345678');

/* DATOS DE LA TABLA USUARIOS-ROLES */
INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES
(4, 2);


-- CREAR UNA PERSONA
CALL sp_insertar_persona('Ana', 'Martínez', 'Sánchez', '73217990', '', '');