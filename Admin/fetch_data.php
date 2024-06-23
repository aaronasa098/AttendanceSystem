<?php
// Example PHP script to fetch data
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$stmt = $pdo->prepare('SELECT * FROM your_table');
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>