<?php
$servername = "localhost";
$username = "root"; // Changez ceci selon votre configuration
$password = ""; // Changez ceci selon votre configuration
$dbname = "votre_base_de_donnees"; // Remplacez par le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Traiter les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hash le mot de passe

    // Insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel utilisateur créé avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
