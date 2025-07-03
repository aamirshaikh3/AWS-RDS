<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? null;
$name = $data['name'] ?? '';
$description = $data['description'] ?? '';

if ($id && $name) {
    $stmt = getDB()->prepare("UPDATE products SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing ID or name.']);
}
