<?php
header("Content-Type: application/json");
require '../db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
if (!$id) {
  echo json_encode(["erro" => "ID não informado"]);
  exit;
}

$nome = $data['nome'] ?? '';
$descricao = $data['descricao'] ?? '';
$ativo = $data['ativo'] ?? 1;

$stmt = $pdo->prepare("UPDATE convenio SET nome=?, descricao=?, ativo=? WHERE id=?");
$stmt->execute([$nome, $descricao, $ativo, $id]);

echo json_encode(["sucesso" => true]);
?>
