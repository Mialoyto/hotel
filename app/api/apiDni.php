<?php
// Cargamos el token desde la carpeta config del proyecto raíz.
$tokenConfigPath = __DIR__ . '/../../config/tokens.php';
if (!file_exists($tokenConfigPath)) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'No se encontró config/tokens.php'
    ]);
    return;
}

require_once $tokenConfigPath;

header('Content-Type: application/json');

$dni = $_GET['dni'] ?? null;

if (!$dni) {
    http_response_code(400);
    echo json_encode([
        "status" => false,
        "message" => "DNI requerido"
    ]);
    return;
}

if (empty($TOKEN_DNI ?? null)) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'TOKEN_DNI no está definido en config/tokens.php'
    ]);
    return;
}

$token = $TOKEN_DNI;

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.factiliza.com/v1/dni/info/$dni",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $token"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "Error en cURL",
        "error" => $err
    ]);
    return;
}

$data = json_decode($response, true);

if (isset($data['error'])) {
    http_response_code(400);
    echo json_encode([
        "status" => false,
        "message" => 'error en API externa',
    ]);
    return;
}

echO json_encode($data);