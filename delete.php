<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if ($id) {
    $stmt = getDB()->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['status' => 'deleted']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID is required']);
}
