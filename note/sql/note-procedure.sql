/* 
    1.  PROCEDIMIENTO ALMACENADO PARA LOGIN DE USUARIOS
    El procedimiento almacenado se llamará `sp_usuario_login` y recibirá como parámetro
    el nombre de usuario. El procedimiento deberá verificar si el usuario existe en la tabla `usuarios`
    y devolverá el resultado de la consulta.

    2. PARAMETROS DEL PROCEDIMIENTO
    - IN _nombre_usuario VARCHAR(255): El nombre de usuario que se desea verificar.

    IN ->   define un parámetro de entrada para el procedimiento almacenado.
            Este tipo de parámetro se utiliza para pasar valores al procedimiento cuando se llama.  
            En este caso, _nombre_usuario es un parámetro de entrada que se espera que sea una cadena 
            de texto (VARCHAR) con un máximo de 255 caracteres.

    OUT ->  define un parámetro de salida para el procedimiento almacenado.
            Este tipo de parámetro se utiliza para devolver valores desde el procedimiento después de su ejecución. 
            El procedimiento puede asignar un valor a este parámetro, y ese valor estará disponible para el código 
            que llamó al procedimiento.
        
    INOUT -> define un parámetro de entrada/salida para el procedimiento almacenado.
             Este tipo de parámetro se utiliza tanto para pasar valores al procedimiento como para devolver valores 
             desde el procedimiento. El procedimiento puede modificar el valor del parámetro, y ese valor modificado 
             estará disponible para el código que llamó al procedimiento.


    NOMBRE DE LA VARIABLE:
            El nombre de la variable debe comenzar con un guion bajo (_) para indicar que es un parámetro del procedimiento 
            almacenado. Esto es una convención común en MySQL para diferenciar los parámetros de las variables locales dentro 
            del procedimiento.

    3. BEGIN
        El bloque BEGIN...END se utiliza para delimitar el cuerpo del procedimiento almacenado.
        Dentro de este bloque, se pueden escribir las instrucciones SQL que definen la lógica del procedimiento. 
        En este caso, el bloque BEGIN...END está vacío, lo que significa que el procedimiento no realiza ninguna acción 
        específica en este momento. Sin embargo, se espera que se agreguen las instrucciones necesarias para verificar 
        la existencia del usuario en la tabla `usuarios` y devolver el resultado de la consulta.

        Un procedimiento puede tener:
        - SELECT: para recuperar datos de la base de datos.
            ejemplo: SELECT * FROM usuarios WHERE nombre_usuario = _nombre_usuario;
        
        - INSERT: para agregar nuevos registros a la base de datos.
            INSERT INTO usuarios (nombre_usuario, contrasnia) VALUES (_nombre_usuario, 'contraseña_encriptada');

        - UPDATE: para modificar registros existentes en la base de datos.
            UPDATE usuarios SET contrasnia = 'nueva_contraseña_encriptada' WHERE nombre_usuario = _nombre_usuario;

        - DELETE: para eliminar registros de la base de datos.
            DELETE FROM usuarios WHERE nombre_usuario = _nombre_usuario;

        - DECLARE: para declarar variables locales dentro del procedimiento.
            DECLARE @existe_usuario INT;

        - IF...ELSE: para realizar decisiones condicionales dentro del procedimiento.
            IF @existe_usuario > 0 THEN
                -- Lógica para usuario existente
            ELSE
                -- Lógica para usuario no existente
            END IF;

        - LOOP: para repetir un bloque de código varias veces.
            DECLARE contador INT DEFAULT 0;
            WHILE contador < 10 DO
                -- Lógica a repetir
                SET contador = contador + 1;
            END WHILE;

        - CURSOR: para manejar conjuntos de resultados de consultas dentro del procedimiento.
            DECLARE cursor_usuarios CURSOR FOR SELECT nombre_usuario FROM usuarios;
            OPEN cursor_usuarios;
            -- Lógica para procesar los resultados del cursor
            CLOSE cursor_usuarios;

        - VARIABLES: para almacenar valores temporales durante la ejecución del procedimiento.
            DECLARE @resultado VARCHAR(255);
            SET @resultado = 'Valor temporal';

    4. JOIN
        El JOIN se utiliza para combinar filas de dos o más tablas basándose en una columna relacionada entre ellas. 
        En el contexto de este procedimiento almacenado, podríamos utilizar un JOIN para verificar la existencia del usuario 
        en la tabla `usuarios` y obtener información adicional relacionada, como el rol del usuario o su estado.

        Por ejemplo, podríamos realizar un JOIN entre la tabla `usuarios` y la tabla `roles` para obtener el nombre del rol 
        del usuario:
        
        SELECT u.nombre_usuario, r.nombre_rol
        FROM usuarios u
        JOIN usuarios_roles ur ON u.id_usuario = ur.id_usuario
        JOIN roles r ON ur.id_rol = r.id_rol
        WHERE u.nombre_usuario = _nombre_usuario;
 */