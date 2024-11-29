<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "ma_base_de_donnees";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];

// Insérer les données dans la table
$sql = "INSERT INTO utilisateurs (nom, email) VALUES ('$nom', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Données ajoutées avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
