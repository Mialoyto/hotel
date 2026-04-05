-- Active: 1772242849386@@127.0.0.1@3306@db_hotel
USE `db_hotel`;

/* Consultas para la base de datos db_hotel */
SELECT * FROM usuarios;
SELECT * FROM personas;
-- 
SELECT * FROM usuarios_roles;

SELECT * FROM usuarios_roles;

UPDATE usuarios SET contrasenia = '$2y$10$a3YGysng3jWR3/eU8UIGcuUwZSSD5Y3UkDOb0iAItm/rxJ7W3uPbq';


/********** PROCEDIMIENTOS ALMACENADOS **********/

CALL sp_usuario_login('juan_administrador1');

CALL sp_get_usuarios_roles(1);

CALL sp_insertar_persona('Miguel', 'Loyola', 'Torres', '26558002', '', '');