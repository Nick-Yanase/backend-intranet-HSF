<?php
header("Content-Type: application/json");
require '../db.php';

$data = json_decode(file_get_contents("php://input"), true);
$nome = $data['nome'] ?? '';
$descricao = $data['descricao'] ?? '';
$ativo = $data['ativo'] ?? 1;

$stmt = $pdo->prepare("INSERT INTO convenio (nome, descricao, ativo) VALUES (?, ?, ?)");
$stmt->execute([$nome, $descricao, $ativo]);

echo json_encode(["sucesso" => true, "id" => $pdo->lastInsertId()]);
?>
