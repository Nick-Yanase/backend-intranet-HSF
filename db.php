<?php
// Conexão com o MySQL já instalado na sua máquina
$host = '127.0.0.1';   // ou localhost
$port = '3306';        // padrão do MySQL instalado
$db   = 'hsf';
$user = 'root';        // ou seu usuário
$pass = '@hosphosp2023';            // coloque sua senha, se tiver

try {
  $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(["erro" => "Erro de conexão: " . $e->getMessage()]);
  exit;
}
?>
