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

$stmt = $pdo->prepare("DELETE FROM convenio WHERE id = ?");
$stmt->execute([$id]);
echo json_encode(["excluido com sucesso" => true]);
?>
