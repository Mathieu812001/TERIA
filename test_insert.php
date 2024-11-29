<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teria_db";

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête d'insertion
$sql = "INSERT INTO users (email, password) VALUES ('test@example.com', '123456')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel enregistrement ajouté avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
