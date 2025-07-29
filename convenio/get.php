<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../db.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["erro" => "ID não informado"]);
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM convenios WHERE id = ?");
$stmt->execute([$id]);

$convenio = $stmt->fetch(PDO::FETCH_ASSOC);

if ($convenio) {
    echo json_encode($convenio);
} else {
    http_response_code(404);
    echo json_encode(["erro" => "Convênio não encontrado"]);
}
?>
