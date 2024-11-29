<?php
$servername = "localhost";
$username = "root"; // utilisateur par défaut
$password = ""; // mot de passe par défaut (vide dans XAMPP)
$dbname = "teria_db"; // remplacez par le nom de votre base de données

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
echo "Connexion réussie à la base de données";
?>
