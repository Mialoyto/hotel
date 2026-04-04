<?php

/*
EJEMPLO DE JWT EN PHP

Este archivo es solo una nota de referencia.
Si quieres usar JWT real en tu proyecto, instala primero la librería:

composer require firebase/php-jwt

FLUJO BÁSICO:
1. El usuario hace login.
2. El servidor genera un token.
3. El cliente guarda el token.
4. En cada petición protegida se envía en Authorization: Bearer <token>
5. El middleware valida el token.
6. Si es válido, deja pasar; si no, responde 401.

EJEMPLO CONCEPTUAL:

$payload = [
	'id' => 1,
	'nombre' => 'Admin',
	'rol' => 'admin',
	'exp' => time() + 3600
];

// $token = JWT::encode($payload, $secretKey, 'HS256');
// $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

EJEMPLO DE HEADER:

Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...

EJEMPLO DE MIDDLEWARE:

if no hay token:
	responder 401

si el token es válido:
	continuar al controlador

si el token expiró:
	responder 401
*/

