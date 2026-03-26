-- Active: 1772242849386@@127.0.0.1@3306@db_hotel
USE `db_hotel`;

/* Consultas para la base de datos db_hotel */
SELECT * FROM usuarios;
SELECT * FROM personas;

SELECT * FROM usuarios_roles;

SELECT * FROM usuarios_roles;

UPDATE usuarios SET contrasenia = '$2y$10$BzOyF2sqcySr9mxR2oPl.OpwL5fRPd6.9aq1IcGFz5tvjTEFdZn7S',
    nombre_usuario = 'admin' WHERE id_usuario = 1;
UPDATE usuarios SET contrasenia = '$2y$10$BzOyF2sqcySr9mxR2oPl.OpwL5fRPd6.9aq1IcGFz5tvjTEFdZn7S'
    WHERE id_usuario = 2;
UPDATE usuarios SET contrasenia = '$2y$10$BzOyF2sqcySr9mxR2oPl.OpwL5fRPd6.9aq1IcGFz5tvjTEFdZn7S'
    WHERE id_usuario = 3;

/********** PROCEDIMIENTOS ALMACENADOS **********/

CALL sp_usuario_login('admin');