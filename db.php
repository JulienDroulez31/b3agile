<?php
$servername = "localhost";
$username = "trombinoscope"; // Utilisateur de phpMyAdmin
$password = "root"; // Mot de passe de phpMyAdmin
$dbname = "trombinoscope"; // Nom de la base de données

try {
    // Création de la connexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur de PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
?>
