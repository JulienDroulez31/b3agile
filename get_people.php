<?php
header('Content-Type: application/json');
require 'db.php';

$stmt = $conn->prepare("SELECT * FROM people");
$stmt->execute();
$people = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($people);
?>
