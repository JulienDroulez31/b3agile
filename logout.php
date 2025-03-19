<?php
require_once 'config.php';

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil
header('Location: index.html');
exit();
?>
