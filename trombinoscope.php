<?php
require_once 'config.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trombinoscope</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Trombinoscope</h1>
    </div>
    
    <div class="logout">
        Bienvenue <?php echo htmlspecialchars($_SESSION['username']); ?> | 
        <a href="logout.php">Déconnexion</a>
    </div>

    <div class="container" id="photo-container">
        <!-- Les cartes de personnes seront ajoutées dynamiquement ici -->
    </div>

    <script>
        // Charger les personnes du trombinoscope
        window.onload = function() {
            fetch('get_people.php')
            .then(response => response.json())
            .then(people => {
                const container = document.getElementById("photo-container");
                people.forEach(person => {
                    const card = document.createElement("div");
                    card.classList.add("card");
                    card.innerHTML = `
                        <img src="${person.photo}" alt="${person.name}">
                        <div class="name">${person.name}</div>
                        <div class="role">${person.role}</div>
                    `;
                    container.appendChild(card);
                });
            });
        };
    </script>
</body>
</html>
