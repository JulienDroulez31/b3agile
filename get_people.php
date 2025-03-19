<?php
require_once 'config.php';

// Récupérer toutes les personnes du trombinoscope
$stmt = $db->query('SELECT id, name, role, photo FROM people ORDER BY name');
$people = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($people);
?>
