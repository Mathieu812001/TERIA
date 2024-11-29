<?php
// DSN (Nom de la source de données ODBC) que vous avez configuré
$dsn = "ODBC;DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=C:\\path\\to\\LoginDatabase.accdb;";

$conn = odbc_connect($dsn, '', '');

if (!$conn) {
    die("Erreur de connexion à la base de données Access");
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashage du mot de passe

// Insertion des données dans la base de données Access
$sql = "INSERT INTO Utilisateurs (Email, MotDePasse) VALUES ('$email', '$password')";
$result = odbc_exec($conn, $sql);

if ($result) {
    echo "Inscription réussie";
} else {
    echo "Erreur lors de l'enregistrement";
}

odbc_close($conn);
?>
