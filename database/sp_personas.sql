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
    -- VARIABLE PARA VERIFICAR SI EL DNI YA EXISTE
    DECLARE EXISTE_DNI INT;
    -- VERIFICAR SI EL DNI YA EXISTE EN LA BASE DE DATOS
    SELECT COUNT(*) INTO EXISTE_DNI FROM personas WHERE dni = _dni AND estado = 1;

    IF EXISTE_DNI > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El DNI ya está registrado';
    END IF;

    INSERT INTO personas (nombres, apellido_paterno, apellido_materno, dni, telefono, email)
    VALUES (_nombres, _apellido_paterno, _apellido_materno, _dni, _telefono, _email);
END;
