<?php
require 'db.php';

try {
    $pdo = getDB();
    echo json_encode([
        'status' => 'success',
        'message' => 'Connected to RDS MySQL successfully!'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Connection failed: ' . $e->getMessage()
    ]);
}
