-- Structure de la base de données

-- Créer la base de données
CREATE DATABASE IF NOT EXISTS trombinoscope;
USE trombinoscope;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des personnes du trombinoscope
CREATE TABLE IF NOT EXISTS people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insérer quelques exemples de personnes
INSERT INTO people (name, role, photo) VALUES
('Jean Dupont', 'Directeur', 'images/jean.jpg'),
('Marie Martin', 'Responsable RH', 'images/marie.jpg'),
('Pierre Dubois', 'Développeur', 'images/pierre.jpg'),
('Sophie Leroy', 'Designer', 'images/sophie.jpg'),
('Thomas Bernard', 'Commercial', 'images/thomas.jpg');
