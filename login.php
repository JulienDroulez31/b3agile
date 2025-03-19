<?php
require_once 'config.php';

// Récupérer les données envoyées
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

// Vérifier les identifiants
$stmt = $db->prepare('SELECT id, password FROM users WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$response = ['success' => false];

if ($user && password_verify($password, $user['password'])) {
    // Connexion réussie
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $username;
    $response['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
