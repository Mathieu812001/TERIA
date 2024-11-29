<?php
// afficher_utilisateurs.php

session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    echo "Vous devez être connecté pour voir cette page.";
    exit;
}

// Connexion à la base de données Access
$dbPath = 'path/to/your/database.accdb'; // Remplacez par le chemin vers votre base de données
$conn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$dbPath;");

// Récupérer tous les utilisateurs
$stmt = $conn->prepare("SELECT * FROM utilisateurs");
$stmt->execute();
$utilisateurs = $stmt->fetchAll();

if (count($utilisateurs) > 0) {
    foreach ($utilisateurs as $utilisateur) {
        echo "Nom: {$utilisateur['nom']}, Prénom: {$utilisateur['prenom']}, Email: {$utilisateur['email']}<br>";
    }
} else {
    echo "Aucun utilisateur trouvé.";
}
?>
