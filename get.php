<?php
require 'db.php';

$stmt = getDB()->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);
