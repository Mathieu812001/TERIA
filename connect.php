<?php
// Connexion à la base de données Access
$dsn = 'ma_base_donnees';  // Nom de la source de données configurée précédemment
$user = '';  // L'utilisateur, si nécessaire
$password = '';  // Le mot de passe, si nécessaire

// Connexion via ODBC
$conn = odbc_connect($dsn, $user, $password);
if (!$conn) {
    die("Erreur de connexion à la base de données : " . odbc_errormsg());
} else {
    echo "Connexion réussie !";
}
?>
