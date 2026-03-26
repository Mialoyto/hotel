USE `db_hotel`;

-- SP PARA INSERTAR UNA PERSONA
DROP PROCEDURE IF EXISTS `sp_insertar_persona`;
CREATE PROCEDURE `sp_insertar_persona`(
    IN _nombres             VARCHAR(255),
    IN _apellido_paterno    VARCHAR(255),
    IN _apellido_materno    VARCHAR(255),
    IN _dni                 CHAR(8),
    IN _telefono            VARCHAR(20),
    IN _email               VARCHAR(255)
)
BEGIN
    INSERT INTO personas (nombres, apellido_paterno, apellido_materno, dni, telefono, email)
    VALUES (_nombres, _apellido_paterno, _apellido_materno, _dni, _telefono, _email);
END;