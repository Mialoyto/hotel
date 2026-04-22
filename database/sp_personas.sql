USE `db_hotel`;

-- SP PARA INSERTAR UNA PERSONA
DROP PROCEDURE IF EXISTS `sp_insertar_persona`;

CREATE PROCEDURE `sp_insertar_persona`(
    IN _id_hotel              INT,
    IN _nombres             VARCHAR(255),
    IN _apellido_paterno    VARCHAR(255),
    IN _apellido_materno    VARCHAR(255),
    IN _dni                 CHAR(8),
    IN _fecha_nacimiento    DATE,
    IN _ubigeo              CHAR(6),
    IN _direccion           VARCHAR(255),
    IN _telefono            VARCHAR(20),
    IN _email               VARCHAR(255)
)
BEGIN
    -- VARIABLE PARA VERIFICAR SI EL DNI YA EXISTE
    DECLARE EXISTE_PERSONA INT DEFAULT 0;

    -- CONVERTIR CADENAS VACÍAS A NULL
        SET _direccion = NULLIF(_direccion, '');
        SET _telefono = NULLIF(_telefono, '');
        SET _email = NULLIF(_email, '');


    -- VERIFICAR SI EL DNI Y HOTEL YA EXISTE
    SELECT COUNT(*) INTO EXISTE_PERSONA FROM personas WHERE dni = _dni AND id_hotel = _id_hotel;

    IF EXISTE_PERSONA > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El DNI ya está registrado';
    END IF;

    -- INSERTAR LA NUEVA PERSONA
    INSERT INTO personas (id_hotel, nombres, apellido_paterno, apellido_materno, dni, fecha_nacimiento, ubigeo, direccion, telefono, email)
    VALUES (_id_hotel, _nombres, _apellido_paterno, _apellido_materno, _dni, _fecha_nacimiento, _ubigeo, _direccion, _telefono, _email);
END;

-- TRIGGER PARA VERIFICAR SI LA PERSONA TIENE 18 AÑOS 
DROP TRIGGER IF EXISTS `trg_personas_validar_edad`;
-- CREATE TRIGGER `trg_personas_validar_edad`
-- BEFORE INSERT ON personas
-- FOR EACH ROW
-- BEGIN
--     IF DATE_ADD(NEW.fecha_nacimiento, INTERVAL 18 YEAR) > CURDATE() THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Debe ser mayor de 18 años';
--     END IF;
-- END;