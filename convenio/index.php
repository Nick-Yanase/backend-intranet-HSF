<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
require '../db.php';

$stmt = $pdo->query("SELECT * FROM convenio");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
