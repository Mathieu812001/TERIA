<?php
// Informations de connexion à la base de données
$servername = "localhost"; // ou l'adresse de ton serveur
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "nom_de_la_base_de_donnees"; // Nom de ta base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];

// Requête SQL pour insérer les données dans la table "utilisateurs"
$sql = "INSERT INTO utilisateurs (prenom, nom, email) VALUES ('$prenom', '$nom', '$email')";

// Exécution de la requête SQL
if ($conn->query($sql) === TRUE) {
    echo "Données insérées avec succès !";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>
