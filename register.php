<?php
$servername = "localhost";
$username = "root"; // Utilisateur par défaut de WAMP
$password = ""; // Pas de mot de passe par défaut
$dbname = "teria_users"; // Nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Sécuriser le mot de passe
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO users (email, password, firstname, lastname) VALUES ('$email', '$password', '$firstname', '$lastname')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
