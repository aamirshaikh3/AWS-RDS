<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name']) && isset($data['description'])) {
    $pdo = getDB();

    $stmt = $pdo->prepare('INSERT INTO products (name, description) VALUES (?, ?)');
    $stmt->execute([$data['name'], $data['description']]);

    echo json_encode(['status' => 'success', 'message' => 'Product added']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing name or description']);
}
