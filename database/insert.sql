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

INSERT INTO usuarios (id_persona, id_hotel, nombre_usuario, contrasenia) VALUES
(1, 1, 'maria_gerente', '12345678'),
(1, 1, 'carlos_admin', '12345678'),
(1, 1, 'ana_recepcionista', '12345678'),
(1, 1, 'luis_gerente', '12345678'),
(1, 1, 'luis_admin', '12345678'),
(1, 1, 'luis_recepcionista', '12345678'),
(1, 1, 'luis_gerente1', '12345678'),
(1, 1, 'luis_admin1', '12345678'),
(1, 1, 'luis_recepcionista1', '12345678'),
(1, 1, 'luis_gerente2', '12345678'),
(1, 1, 'luis_admin2', '12345678'),
(1, 1, 'luis_recepcionista2', '12345678'),
(1, 1, 'luis_gerente3', '12345678'),
(1, 1, 'luis_admin3', '12345678'),
(1, 1, 'luis_recepcionista3', '12345678'),
(1, 1, 'luis_gerente4', '12345678'),
(1, 1, 'luis_admin4', '12345678'),
(1, 1, 'luis_recepcionista4', '12345678'),
(1, 1, 'luis_gerente5', '12345678'),
(1, 1, 'luis_admin5', '12345678'),
(1, 1, 'luis_recepcionista5', '12345678'),
(1, 1, 'luis_gerente6', '12345678'),
(1, 1, 'luis_admin6', '12345678'),
(1, 1, 'luis_recepcionista6', '12345678'),
(1, 1, 'luis_gerente7', '12345678'),
(1, 1, 'luis_admin7', '12345678'),
(1, 1, 'luis_recepcionista7', '12345678'),
(1, 1, 'luis_gerente8', '12345678'),
(1, 1, 'luis_admin8', '12345678'),
(1, 1, 'luis_recepcionista8', '12345678'),
(1, 1, 'luis_gerente9', '12345678'),
(1, 1, 'luis_admin9', '12345678'),
(1, 1, 'luis_recepcionista9', '12345678'),
(1, 1, 'luis_gerente10', '12345678'),
(1, 1, 'luis_admin10', '12345678'),
(1, 1, 'luis_recepcionista10', '12345678'),
(1, 1, 'luis_gerente11', '12345678'),
(1, 1, 'luis_admin11', '12345678'),
(1, 1, 'luis_recepcionista11', '12345678'),
(1, 1, 'luis_gerente12', '12345678'),
(1, 1, 'luis_admin12', '12345678'),
(1, 1, 'luis_recepcionista12', '12345678'),
(1, 1, 'luis_gerente13', '12345678'),
(1, 1, 'luis_admin13', '12345678'),
(1, 1, 'luis_recepcionista13', '12345678'),
(1, 1, 'luis_gerente14', '12345678'),
(1, 1, 'luis_admin14', '12345678'),
(1, 1, 'luis_recepcionista14', '12345678'),
(1, 1, 'luis_gerente15', '12345678'),
(1, 1, 'luis_admin15', '12345678'),
(1, 1, 'luis_recepcionista15', '12345678');

/* DATOS DE LA TABLA USUARIOS-ROLES */
INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES
(4, 2);

INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES
(5, 3),
(6, 1),
(7, 2),
(8, 3),
(9, 1),
(10, 2),
(11, 3),
(12, 1),
(13, 2),
(14, 3),
(15, 1),
(16, 2),
(17, 3),
(18, 1),
(19, 2),
(20, 3),
(21, 1),
(22, 2),
(23, 3),
(24, 1),
(25, 2),
(26, 3),
(27, 1),
(28, 2),
(29, 3),
(30, 1),
(31, 2),
(32, 3),
(33, 1),
(34, 2),
(35, 3),
(36, 1),
(37, 2),
(38, 3),
(39, 1),
(40, 2),
(41, 3),
(42, 1),
(43, 2),
(44, 3),
(45, 1),
(46, 2),
(47, 3),
(48, 1),
(49, 2),
(50, 3),
(51, 1),
(52, 2),
(53, 3),
(54, 1),
(55, 2);


-- CREAR UNA PERSONA
CALL sp_insertar_persona('Ana', 'Martínez', 'Sánchez', '73217990', '', '');