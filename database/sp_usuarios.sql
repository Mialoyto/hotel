USE `db_hotel`;

-- PROCEDIMIENTO ALMACENADO PARA LOGIN DE USUARIOS
DROP PROCEDURE IF EXISTS `sp_usuario_login`;
CREATE PROCEDURE `sp_usuario_login`(
    IN _nombre_usuario VARCHAR(255)
)
BEGIN
    SELECT
        RUSU.id_usuario,
        RUSU.id_rol,
        USU.id_hotel,
        HOT.nombre_comercial AS nombre_hotel,
        PER.nombres,
        PER.apellido_paterno,
        PER.apellido_materno,
        ROL.nombre_rol,
        USU.nombre_usuario,
        USU.contrasenia as 'password',
        USU.estado
    FROM usuarios USU
    INNER JOIN personas PER ON USU.id_persona = PER.id_persona
    INNER JOIN hoteles HOT ON USU.id_hotel = HOT.id_hotel
    INNER JOIN usuarios_roles RUSU ON USU.id_usuario = RUSU.id_usuario
    INNER JOIN roles ROL ON RUSU.id_rol = ROL.id_rol
    WHERE USU.nombre_usuario = _nombre_usuario
    AND USU.estado = 1
    AND PER.estado = 1
    AND HOT.estado = 1;
END;

/*
PROCEDIMIENTO ALMACENADO PARA OBTENER USUARIOS CON SUS ROLES
Este procedimiento devuelve una lista de usuarios junto con sus 
roles asociados, el nombre del hotel al que pertenecen y su estado.
Solo el administrador tiene este privilegio.
*/
DROP PROCEDURE IF EXISTS `sp_get_usuarios_roles`;
CREATE PROCEDURE `sp_get_usuarios_roles`(
    IN _id_hotel INT
)
BEGIN
    SELECT
        USU.id_usuario,
        HOT.id_hotel,
        USU.nombre_usuario,
        PER.nombres,
        PER.apellido_paterno,
        PER.apellido_materno,
        ROL.nombre_rol AS roles,
        HOT.nombre_comercial AS nombre_hotel,
        USU.estado
    FROM usuarios USU
    INNER JOIN personas PER ON USU.id_persona = PER.id_persona
    INNER JOIN hoteles HOT ON USU.id_hotel = HOT.id_hotel
    INNER JOIN usuarios_roles RUSU ON USU.id_usuario = RUSU.id_usuario
    INNER JOIN roles ROL ON RUSU.id_rol = ROL.id_rol
    WHERE HOT.id_hotel = _id_hotel
    AND HOT.estado = 1;
END;



