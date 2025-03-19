<?php
require_once 'config.php';

// Récupérer les données envoyées
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

// Vérifier si l'utilisateur existe déjà
$stmt = $db->prepare('SELECT id FROM users WHERE username = ?');
$stmt->execute([$username]);
$existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

$response = ['success' => false];

if (!$existingUser) {
    // Hasher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insérer le nouvel utilisateur
    $stmt = $db->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->execute([$username, $hashedPassword]);
    
    $response['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
