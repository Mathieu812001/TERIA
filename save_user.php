<?php
// DSN configuré dans le Gestionnaire ODBC
$dsn = "DSN=LoginDatabase"; // Remplacez 'LoginDatabase' par le nom de votre DSN

// Connexion à la base de données Access via ODBC
$conn = odbc_connect($dsn, '', '');

if (!$conn) {
    die("Erreur de connexion à la base de données Access : " . odbc_errormsg());
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe

// Requête pour insérer les données
$sql = "INSERT INTO Utilisateurs (Email, MotDePasse) VALUES ('$email', '$password')";
$result = odbc_exec($conn, $sql);

if ($result) {
    echo "Inscription réussie !";
} else {
    echo "Erreur lors de l'enregistrement : " . odbc_errormsg($conn);
}

// Fermer la connexion à la base de données
odbc_close($conn);
?>
