<?php
$servername = "localhost";
$username = "root";
$password = ""; // Par défaut, XAMPP utilise un mot de passe vide pour root
$dbname = "teria_db"; // Remplacez par le nom de votre base de données

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
echo "Connexion réussie à la base de données !";
?>
