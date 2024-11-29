<?php
// Utilisez le DSN que vous avez configuré dans le Gestionnaire ODBC
$dsn = "DSN=LoginDatabase"; // Remplacez 'LoginDatabase' par le nom de votre DSN

// Connexion à la base de données Access via ODBC
$conn = odbc_connect($dsn, '', '');

if (!$conn) {
    die("Erreur de connexion à la base de données Access : " . odbc_errormsg());
}

// Si la connexion est réussie
echo "Connexion réussie à la base de données Access !";

// Fermer la connexion à la base de données
odbc_close($conn);
?>
